<?php include 'includes/session.php'; ?>
<?php
  include '../timezone.php';
  $range_to = date('m/d/Y');
  $range_from = date('m/d/Y', strtotime('-30 day', strtotime($range_to)));
?>
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
        Payroll
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payroll</li>
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
              <div class="pull-right">
                <form method="POST" action="pay.php" class="form-inline">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <select class="form-control input-sm" id="month" name="month" required>
                      <option value='' selected>SELECT MONTH</option>
                      <option value='JAN' >JANUARY</option>
                      <option value='FEB' >FEBUARY</option>
                      <option value='MAR' >MARCH</option>
                      <option value='APR' >APRIL</option>
                      <option value='MAY' >MAY</option>
                      <option value='JUN' >JUNE</option>
                      <option value='JUL' >JULY</option>
                      <option value='AUG' >AUGUST</option>
                      <option value='SEP' >SEPTEMBER</option>
                      <option value='OCT' >OCTOBER</option>
                      <option value='NOV' >NOVEMBER</option>
                      <option value='DEC' >DECEMBER</option>
                    </select>
                    <input type="submit" style="color: #fff; font-weight: 900; font-size: 12px; background-color: blue;" class="form-control pull-right col-sm-8" value="Calculate Payroll">
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Employee Name</th>
                  <th>Employee ID</th>
                  <th>Salary</th>
                  <th>Days Absent</th>
                  <th>Absent Deduction</th>
                  <th>Days Late</th>
                  <th>Late Deductions</th> 
                  <th>Net Pay</th>
                  <th>Month</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM payroll";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['name']."</td>
                          <td>".$row['emp_id']."</td>
                          <td>".$row['salary']."</td>
                          <td>".$row['days_absent']."</td>
                          <td>".$row['absent_deduction']."</td>
                          <td>".$row['days_late']."</td>
                          <td>".$row['late_deduction']."</td>
                          <td>".$row['balance']."</td>
                          <td>".$row['month']."</td>
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
</div>
<?php include 'includes/scripts.php'; ?> 
<script>
// $(function(){
//   $('#select_year').change(function(e){
//     let month = $('#select_year').val();
//     $.ajax({
//       type: 'POST',
//       url: 'pay.php',
//       data: {
//         month: month
//       },
//       dataType: 'text',
//       success: function(response){
        
//       }
//     });
//   });

// });


</script>
</body>
</html>
