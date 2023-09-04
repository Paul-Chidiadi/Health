  <?php session_start(); ?>
  <?php include 'header.php'; ?>
  <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
          <p id="date"></p>
          <p id="time" class="bold"></p>
        </div>
      
        <div class="login-box-body">
          <h4 class="login-box-msg">Enter Your Employee ID</h4>
          <!-- GETTING DATA OF IF TASK WAS SUCCESSFUL OR NOT -->
          <?php 
            if (isset($_GET['success'])) {
          ?>
              <div id="after" class="alert-dismissible mt20 text-center" style="display: block; background-color: yellowgreen; color: white;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="result"><i class="icon fa fa-check"></i> <span>TASK SUCCESSFUL</span></span>
              </div>
          <?php
            }else if (isset($_GET['failed'])) {
          ?>
              <div id="after" class="alert-dismissible mt20 text-center" style="display: block; background-color: red; color: white;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="result"><i class="icon fa fa-warning"></i> <span>TASK FAILED, RETRY!</span></span>
              </div>
          <?php
            }
          ?>
            <!-- GETTING DATA OF IF TASK WAS SUCCESSFUL OR NOT -->

          <form id="attendance">
              <div class="form-group">
                <select class="form-control" name="status">
                  <option value="in">TIME IN</option>
                  <option value="check1">CHECK IN 1</option>
                  <option value="check2">CHECK IN 2</option>
                  <option value="out">TIME OUT</option>
                </select>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" id="employee" name="employee" required>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
                </div>
              </div>
          </form>
        </div>
        <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
        </div>
        <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
        </div>
          
    </div>
	
    <?php include 'scripts.php' ?>
    <script type="text/javascript">
      const after = document.getElementById('after');
      setInterval(() => {
        after.style.display = "none";
      }, 8000);

      $(function() {
        let interval = setInterval(function() {
          let momentNow = moment();
          $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
          $('#time').html(momentNow.format('hh:mm:ss A'));
        }, 100);

        $('#attendance').submit(function(e){
          e.preventDefault();
          var attendance = $(this).serialize();
          $.ajax({
            type: 'POST',
            url: 'attendance.php',
            data: attendance,
            dataType: 'text',
            success: function(response){
              if(response.indexOf('face') < 0){
                $('.alert').hide();
                $('.alert-danger').show();
                $('.message').html(response);
              }
              else{
                $('.alert').hide();
                $('.alert-success').show();
                $('.message').html(response);
                $('#employee').val('');
                window.location = response;
              }
            }
          });
        });
          
      });
    </script>
  </body>
</html>