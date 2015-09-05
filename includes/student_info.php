<div class="container" id="sInfo" data-bind="visible: showStudentInfo">
	<div class="row" id="viewModel">
	<div class="panel-heading text-center"><h1 class="page-header">Student <small>Information</small></h1></div></div><hr>
	<form class="form-horizontal" method="POST">
		
		 <div class="form-group">
                 <div class="col-sm-12">
                <div class="col-sm-12">
                    <label>Student Name:</label>
                    
                </div>
                </div>
        </div>  
     <div class="form-group">
      
            <div class="col-sm-12">
           
                <div class="col-sm-4">
                    <input class="form-control" id="sFname" name="sFname" placeholder = "First Name" required="" type="text" 
                    data-bind="textInput: sFname">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="sMname" name="sMname" placeholder = "Middle Name" required="" type="text" 
                    data-bind="textInput: sMname">
                </div>
                <div class="col-sm-4">
                    <input class="form-control" id="sLname" name="sLname" placeholder = "Last Name" required="" type="text" 
                    data-bind="textInput: sLname">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label for="oAddress">Address:</label>
                     <input class="form-control" id="sAddress" name="sAddress" placeholder = "Enter student' address" required="" type="text" 
                      data-bind="textInput: sAddress">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label for="oNotes">Note:</label>
                    <textarea class="form-control" name="oNotes" id="sNotes" placeholder="Notes" required="" 
                    data-bind="textInput:sNotes"></textarea>
                </div>
            </div>
        </div>
<hr>
		
<!--========================================================== END OF STUDENT ====================================================================-->
<div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cModal2"
                    data-bind="click: cAdd"><span class="glyphicon glyphicon-plus-sign"></span> Add Contact</button>
                      <button type="button" class="btn btn-danger" 
                     data-bind="click: cClear,visible: cList().length >0"><span class="glyphicon glyphicon-trash"></span> Clear </button>
                </div>
                 
                 <!--col-sm-12 -->
            </div>
             <!--col-sm-12 -->
        </div>
         <!--form-group -->
<div class="container">
         <div class="table-responsive">
            <table class="table" id="myTable"
            data-bind = "visible: cList().length > 0">
                <thead class="panel-heading">
                    <tr>
                        <th><span class="glyphicon glyphicon-wrench"></span></th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Title/Position</th>
                        <th>Contact Number</th>
                    
                        
                    </tr>
                </thead> 
                <!-- Table Head -->
        
                <tbody 
                data-bind="foreach: cList">
                    <tr>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="">
                                <div class="btn-group btn-group-xs" role="group" aria-label="">
                                    <span><span class="glyphicon glyphicon-minus-sign" 
                                    data-bind="click: cDelete"></span></span>
                                </div>
                                <span> </span> 
                                <div class="btn-group btn-group-xs" role="group" aria-label="">
                                    <span><span class="glyphicon glyphicon-edit" id="save" data-toggle="modal" data-target="#cModal2" 
                                    data-bind="click:  cUpdate.bind($data,$index())"></span></span>
                                </div>
                            </div>
                        </td>
                        <td><span 
                        data-bind="text: cFName"> </span> <span 
                        data-bind="text: cLName"></span></td>
                        <td 
                        data-bind="text: cEmail"></td>
                        <td 
                        data-bind="text: cTitle"></td>
                        <td 
                        data-bind="text: cPhone"></td>
                        
                    </tr>
                </tbody> 
                <!-- Table Body -->
            </table>
            <!-- end-of-table -->
        </div>
        <!-- responsive-div -->

<input type="hidden" id="studentID" name='student_id'
		data-bind="value: student_id">
		<!--hiddent input for ID-->
		<div class="modal-footer">
			<button type="reset" class="btn btn-default" id="close">Reset</button>
			<button type="button" class="btn btn-primary" id="save"
				data-bind="click: sSave">Save changes</button>
		</div>
		<!--end of modal-footer-->
		
	</form>
	<!--end of form-->
</div>
<!--end of container-->
</div>
<!--========================================================== END OF CONTACTS ====================================================================-->


<!--========================================================== END OF PAYMENTS ====================================================================-->
<?php include('includes/modal/modals.php'); ?>