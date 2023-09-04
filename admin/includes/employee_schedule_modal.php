<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/schedule_employee_edit.php">
            		<input type="hidden" id="scheduleid" name="scheduleid">
                <div class="form-group">
                    <label for="emp_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="emp_name" name="edit_emp_name" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="days_off" class="col-sm-3 control-label">Days Off</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="days_off" name="edit_days_off" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_daysoff" class="col-sm-3 control-label">No of Days Off</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="no_daysoff" name="edit_no_daysoff" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_dayson" class="col-sm-3 control-label">No of Days On</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="no_dayson" name="edit_no_dayson" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_days" class="col-sm-3 control-label">Total Days</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="total_days" name="edit_total_days" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="month" class="col-sm-3 control-label">Month</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="month" name="edit_month" required>
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/schedule_employee_add.php">
          		  <div class="form-group">
                  	<label for="emp_id" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_id" name="emp_id" required>
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="emp_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="days_off" class="col-sm-3 control-label">Days Off</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="days_off" name="days_off" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_daysoff" class="col-sm-3 control-label">No of Days Off</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="no_daysoff" name="no_daysoff" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_dayson" class="col-sm-3 control-label">No of Days On</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="no_dayson" name="no_dayson" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_days" class="col-sm-3 control-label">Total Days</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="total_days" name="total_days" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="month" class="col-sm-3 control-label">Month</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control" id="month" name="month" required>
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>