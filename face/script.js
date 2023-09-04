const video = document.getElementById("video");
const nameArray = document.getElementById("name_array").value;

//DETAILS TO INSERT INTO DATABASE
const status = document.getElementById("status").value;
const emp_name = document.getElementById("emp_name").value;
const emp_id = document.getElementById("emp_id").value;

Promise.all([
  faceapi.nets.ssdMobilenetv1.loadFromUri("../models"),
  faceapi.nets.faceRecognitionNet.loadFromUri("../models"),
  faceapi.nets.faceLandmark68Net.loadFromUri("../models"),
]).then(startWebcam);

function startWebcam() {
  navigator.mediaDevices
    .getUserMedia({
      video: true,
      audio: false,
    })
    .then((stream) => {
      video.srcObject = stream;
    })
    .catch((error) => {
      console.error(error);
    });
}

function getLabeledFaceDescriptions() {
  // const labels = nameArray;
  const labels = ["Paul", "Ugonna"];
  return Promise.all(
    labels.map(async (label) => {
      const descriptions = [];
      for (let i = 1; i <= 2; i++) {
        const img = await faceapi.fetchImage(`../labels/${label}/${i}.png`);
        const detections = await faceapi
          .detectSingleFace(img)
          .withFaceLandmarks()
          .withFaceDescriptor();
        descriptions.push(detections.descriptor);
      }
      return new faceapi.LabeledFaceDescriptors(label, descriptions);
    })
  );
}

video.addEventListener("play", async () => {
  const labeledFaceDescriptors = await getLabeledFaceDescriptions();
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);

  const canvas = faceapi.createCanvasFromMedia(video);
  document.body.append(canvas);

  const displaySize = { width: video.width, height: video.height };
  faceapi.matchDimensions(canvas, displaySize);

  setInterval(async () => {
    const detections = await faceapi
      .detectAllFaces(video)
      .withFaceLandmarks()
      .withFaceDescriptors();

    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

    const results = resizedDetections.map((d) => {
      return faceMatcher.findBestMatch(d.descriptor);
    });
    results.forEach((result, i) => {
      const box = resizedDetections[i].detection.box;
      const drawBox = new faceapi.draw.DrawBox(box, {
        label: result,
      });
      drawBox.draw(canvas);
      //CHECK IF RESULT TALLIES WITH USERS DETAILS
      if (result._label === emp_name) {
        console.log(result._label);

        //INSERT INTO DATABASE STARTS
        $.ajax({
          url: "../attendance.php",
          method: "POST",
          dataType: "text",
          data: {
            insert: 1,
            status: status,
            emp_name: emp_name,
            emp_id: emp_id,
          },
          success: function (response) {
            if (response.indexOf("Success") > 0) {
              window.location = "../index.php?success";
            }
          },
        });
        //INSERT INTO DATABASE ENDS
      } else {
        window.location = "../index.php?failed";
      }
    });
  }, 100);
});
