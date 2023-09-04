<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include 'includes/navbar.php'; ?>
      <?php include 'includes/menubar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Schedules
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Employees</li>
            <li class="active">Schedules</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <?php
            if(isset($_SESSION['error'])){
              echo "
                <div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>
                  ".$_SESSION['error']."
                </div>
              ";
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo "
                <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>
                  ".$_SESSION['success']."
                </div>
              ";
              unset($_SESSION['success']);
            }
          ?>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <a href="#addnew" data-toggle="modal" id="add" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                  <!-- <a href="schedule_print.php" class="btn btn-success btn-sm btn-flat"><span class="glyphicon glyphicon-print"></span> Print</a> -->
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <th>Employee ID</th>
                      <th>Name</th>
                      <th>Days Off</th>
                      <th>No of OffDays</th>
                      <th>No of OnDays</th>
                      <th>Total Days</th>
                      <th>Month</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <?php
                        $sql = "SELECT * FROM schedule";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                          echo "
                            <tr>
                              <td>".$row['emp_id']."</td>
                              <td>".$row['name']."</td>
                              <td>".$row['days_off']."</td>
                              <td>".$row['no_daysoff']."</td>
                              <td>".$row['no_dayson']."</td>
                              <td>".$row['total_days']."</td>
                              <td>".$row['month']."</td>
                              <td>
                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                              </td>
                            </tr>
                          ";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>   
      </div>
        
      <?php include 'includes/footer.php'; ?>
      <?php include 'includes/employee_schedule_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
      $(function(){
        $('.edit').click(function(e){
          e.preventDefault();
          $('#edit').modal('show');
          var id = $(this).data('id');
          $('#scheduleid').val(id);
        });
      });
    </script>
  </body>
</html>
