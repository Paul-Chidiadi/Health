<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Employee</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/employee_add.php">
          		  <div class="form-group">
                  	<label for="emp_name" class="col-sm-3 control-label">Name</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="emp_location" class="col-sm-3 control-label">Location</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_location" name="emp_location" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="emp_phone" class="col-sm-3 control-label">Phone</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_phone" name="emp_phone" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="emp_salary" class="col-sm-3 control-label">Salary</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_salary" name="emp_salary" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="emp_gender" class="col-sm-3 control-label">Gender</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="emp_gender" name="emp_gender" required>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Edit Employee</b></h4>
          	</div>
          	<div class="modal-body" id="edit">
            	<form class="form-horizontal" method="POST" action="part/employee_edit.php">
          		  <div class="form-group">
                  	<label for="edit_emp_id" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_id" name="edit_emp_id" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="edit_emp_name" class="col-sm-3 control-label">Name</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_name" name="edit_emp_name" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="edit_emp_location" class="col-sm-3 control-label">Location</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_location" name="edit_emp_location" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="edit_emp_phone" class="col-sm-3 control-label">Phone</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_phone" name="edit_emp_phone" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="edit_emp_salary" class="col-sm-3 control-label">Salary</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_salary" name="edit_emp_salary" required>
                      </div>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="edit_emp_gender" class="col-sm-3 control-label">Gender</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control" id="edit_emp_gender" name="edit_emp_gender" required>
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

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/employee_delete.php">
            		<input type="hidden" id="del_emp_id" name="del_emp_id">
            		<div class="text-center">
	                	<p>DELETE EMPLOYEE</p>
	                	<h2 id="del_schedule" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
