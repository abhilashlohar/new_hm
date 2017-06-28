<form method="post">
<div class="popup_cancel">	
	<div class="modal-backdrop fade in"></div>
		<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-body">
				<h5><b>If you want to cancel the fix asset please specify remarks.</b></h5>
				
				Remark <input type="text" name="cancel_remark">
				
				<input type="hidden" value="<?php echo $transaction_id; ?>" name="transaction_id_for_cancel">
			</div>
			<div class="modal-footer">
				<a href="#" role="button" class="btn close_popup">Cancel</a>
				<button type="submit" href="#" role="button" class="btn red ok_cancel" name="cancel_submit">Cancel Fix Asset</button>
			</div>
		
		</div>
</div>
</form>
