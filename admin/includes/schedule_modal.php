<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add WORK-HOURS</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/schedule_add.php">
          		  <div class="form-group">
                  	<label for="time_in" class="col-sm-3 control-label">Time In</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control timepicker" id="time_in" name="time_in" required>
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="check1" class="col-sm-3 control-label">CHECK IN 1</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="check1" name="check1" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="check2" class="col-sm-3 control-label">CHECK IN 2</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="check2" name="check2" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="time_out" class="col-sm-3 control-label">Time Out</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="time_out" name="time_out" required>
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
            	<h4 class="modal-title"><b>Update WORK-HOURS</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="part/schedule_edit.php">
            		<input type="hidden" id="timeid" name="timeid">
                <div class="form-group">
                    <label for="edit_time_in" class="col-sm-3 control-label">Time In</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
                      </div>
                    </div>
                </div>
				        <div class="form-group">
                    <label for="edit_check1" class="col-sm-3 control-label">CHECK IN 1</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_check1" name="edit_check1" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_check2" class="col-sm-3 control-label">CHECK IN 2</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_check2" name="edit_check2" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_time_out" class="col-sm-3 control-label">Time out</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
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
            	<form class="form-horizontal" method="POST" action="part/schedule_delete.php">
            		<input type="hidden" id="del_timeid" name="del_timeid">
            		<div class="text-center">
	                	<p>DELETE WORK-HOURS</p>
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


     