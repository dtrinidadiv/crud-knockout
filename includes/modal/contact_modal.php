<form action="#" class="form-horizontal" role="form">
	
	<div class="form-group">
		<div class="col-sm-12">
			<div class="col-sm-6">
				<label for="cFName">First Name</label>
				<input class="form-control" name="cFName" id="cFName" placeholder="First Name" required="" type="text" 
					data-bind="textInput: cFName"/>
			</div>
			<!--end of col-sm-6-->
			<div class="col-sm-6">
				<label for="cLName">Last Name</label>
				<input class="form-control" name="cLName" id="cLName" placeholder="Last Name" required="" type="text" 
					data-bind="textInput: cLName"/>
			</div>
			<!--end of col-sm-6-->
		</div>
		<!--end of col-sm-12-->
	</div>
	<!--end of form-group-->

	<div class="form-group">
		<div class="col-sm-12">
			<div class="col-sm-6">
				<label for="cEmail">Email Address</label>
				<input class="form-control" id="cEmail" name="cEmail" placeholder="email@domain.com" required="" type="text"  
					data-bind="textInput: cEmail"/>
			</div>
			<!--end of col-sm-6-->
			<div class="col-sm-6">
				<label for="cTitle">Work Title</label>
				<input class="form-control" id="cTitle" name="cTitle" placeholder="Enter Title/Position" required="" type="text" 
					data-bind="textInput: cTitle"/>
			</div>
			<!--end of col-sm-6-->
		</div>
		<!--end of col-sm-12-->
	</div>
	<!--end of form-group-->

	<div class="form-group">
		<div class="col-sm-12">
			<div class="col-sm-12">
				<label for="cPhone">Phone Number</label>
				<input class="form-control" id="cPhone" name="cPhone" placeholder="( _ _ _ ) _ _ _ - _ _ _ _" required="" type="text"  
					data-bind="textInput: cPhone"/>
			</div>
		
		</div>
		<!--end of col-sm-12-->
	</div>
	<!--end of form-group-->
	
	<div class="form-group">
		<div class="col-sm-12">
			<div class="col-sm-12">
				<label for="cNotes">Notes:</label>
				<textarea class="form-control" id="cNotes" name="cNotes" placeholder="Notes" required=""
					data-bind="textInput: cNotes"></textarea>
			</div>
			<!--end of col-sm-12-->
		</div>
		<!--end of col-sm-12-->
	</div>
	<!--end of form-group-->

	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal" id="close" type="button" 
			data-bind="click: btnCancel">Cancel
		</button>
		<!--btnCancel-->
		<button class="btn btn-primary" data-dismiss="modal" id="save" type="button" 
			data-bind="click: cSave, attr: {'data-toggle': showModal}">Save changes
		</button>
		<!--btncSave-->
	</div>
	<!-- end of modal-footer -->
</form>
<!-- end-of-form -->