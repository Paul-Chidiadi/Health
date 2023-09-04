<?php
    include 'includes/session.php';

    if (isset($_POST['month'])) {
        # code...
        $month = $_POST['month'];

        #EMPLOYEES
        $sqlEmp = "SELECT * FROM employees";
        $queryEmp = $conn->query($sqlEmp);
        while($rowEmp = $queryEmp->fetch_assoc()){
            $emp_id = $rowEmp['emp_id']; #id--1
            $emp_name = $rowEmp['name']; #name--2
            $emp_salary = $rowEmp['salary']; #salary--3

            #ATTENDANCE
            $sqlAtt = "SELECT * FROM attendance WHERE month = '$month' AND emp_id = '$emp_id'";
            $queryAtt = $conn->query($sqlAtt);
            #SCHEDULE
            $sqlSch = "SELECT * FROM schedule WHERE month = '$month' AND emp_id = '$emp_id'";
            $querySch = $conn->query($sqlSch);

            if(($queryAtt->num_rows >= 1) && ($querySch->num_rows >= 1)){
                $rowAtt = $queryAtt->fetch_assoc();
                $rowSch = $querySch->fetch_assoc();
                $numofdaysOn = $rowSch['no_dayson']; #number of days employee supposed to be at work
                $numofdaysatwork = $queryAtt->num_rows; #number of days employee worked

                #GET DAYS ABSENT
                $sqlAbs = "SELECT * FROM attendance WHERE month = '$month' AND emp_id = '$emp_id' AND check_one < '11:00:00'";
                $queryAbs = $conn->query($sqlAbs);
                $rowAbs = $queryAbs->num_rows; #Absent1
                $sqlAbs2 = "SELECT * FROM attendance WHERE month = '$month' AND emp_id = '$emp_id' AND check_two < '14:00:00'";
                $queryAbs2 = $conn->query($sqlAbs2);
                $rowAbs2 = $queryAbs2->num_rows; #Absent1
                #Subtract number of days employee worked from number of days employee supposed to be at work to get ABSENT DAYS
                $days_absent = $numofdaysOn - $numofdaysatwork; #Absent2
                $total_absent = $days_absent + $rowAbs + $rowAbs2; #total days absent--4
                $absent_ded = $total_absent * 500; #absent deduction--5
                
                #GET DAYS LATE
                $sqlLate = "SELECT * FROM attendance WHERE month = '$month' AND emp_id = '$emp_id' AND time_in > '08:20:00'";
                $queryLate = $conn->query($sqlLate);
                $rowLate = $queryLate->num_rows; #days Late--6
                $rowLate = $rowLate + 0; #days Late--6
                $late_ded = $rowLate * 500; #late deduction--7

                $totalDed = $absent_ded + $late_ded;
                $balance = $emp_salary - $totalDed;

                #CHECK IF THIS PAYROLL HAS ALREADY BEEN CALCULATED AND INSERTED
                $sqlAlready = "SELECT * FROM payroll WHERE emp_id = '$emp_id' AND month = '$month'";
                $queryAlr = $conn->query($sqlAlready);
                if($queryAlr->num_rows < 1){
                    $sql = "INSERT INTO payroll (emp_id, name, salary, days_absent, absent_deduction, days_late, late_deduction, balance, month) 
                    VALUES ('$emp_id', '$emp_name', '$emp_salary', '$total_absent', '$absent_ded', '$rowLate', '$late_ded', '$balance', '$month')";
                    if($conn->query($sql)){
                        $_SESSION['success'] = 'Payroll added successfully';
                    }
                    else{
                        $_SESSION['error'] = $conn->error;
                    }
                } else {
                    $_SESSION['error'] = 'Payroll Calculated';
                }
            } else {
                $_SESSION['error'] = 'No Data in Attendance and Schedule yet';
            }
        }
    } else {
        $_SESSION['error'] = 'Fill all Fields';
    }
    
    header('location: payroll.php');

?>