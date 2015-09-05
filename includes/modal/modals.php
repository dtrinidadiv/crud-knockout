
<div class="modal fade" id="cModal2" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" ariaHidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" 
					data-bind="click: btnCancel">&times;</span>
				</button>
				<div class="panel-heading modal-title" id="myModalLabel"><strong class="text-header">Add New Contact Information</strong></div>
			</div> <!-- MODAL HEADER -->
				<div class="modal-body">
					<input type="hidden" id="cID"
					data-bind = "textInput: cID">
					<?php include 'includes/modal/contact_modal.php'; ?>
				</div>
				<!-- modal-body-->
		</div>
		<!-- modal-content -->
	</div>
	<!-- modal-dialog -->
</div>
<!-- modal-fade-->



<!--========================================================== END OF MODALS ====================================================================-->