<?php
  if (isset($_GET['status'])) {
    # code...
    $status = $_GET['status'];
    $name = $_GET['name'];
    $emp_id = $_GET['emp_id'];
  }else {
    header('Location: index.php');
  }

  include 'conn.php';
  $sql = "SELECT * FROM employees";
  $query = $conn->query($sql);
  // $nameArray = [];
  $nameArray = array();
  while ($row = $query->fetch_assoc()) {
    $getName = $row['name'];
    array_push($nameArray, $getName);
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Face detection</title>
  <script defer src="face/face-api.min.js"></script>
  <script defer src="face/script.js"></script>
  <link rel="stylesheet" href="face/style.css">
</head>
<body>
  <input type="hidden" id="name_array" value="<?php echo $nameArray;?>">
  <input type="hidden" id="emp_id" value="<?php echo $emp_id;?>">
  <input type="hidden" id="emp_name" value="<?php echo $name;?>">
  <input type="hidden" id="status" value="<?php echo $status;?>">
  <video id="video" width="600" height="450" autoplay>

  <?php include 'scripts.php' ?>
</body>
</html>