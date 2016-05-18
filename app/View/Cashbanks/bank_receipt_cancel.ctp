<form method="post">
<div class="popup_cancel">	
	<div class="modal-backdrop fade in"></div>
		<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
			<div class="modal-body">
				<h5><b>If you want to cancel the receipt please select following option.</b></h5>
				<label class="radio line">
				<div class="radio" id="uniform-undefined"><span><input type="radio" name="cancel" value="1" style="opacity: 0;"></span></div>
				 Due to Cheque Bounce
				</label>
				 <br>
				<label class="radio line">
				<div class="radio" id="uniform-undefined"><span><input type="radio" name="cancel" value="2" style="opacity: 0;"></span></div>
				 Due to duplicacy 
				</label> 
				<input type="hidden" value="<?php echo $transaction_id; ?>" name="transaction_id_for_cancel">
			</div>
			<div class="modal-footer">
				<a href="#" role="button" class="btn close_popup">Cancel</a>
				<button type="submit" href="#" role="button" class="btn red ok_cancel hide" name="cancel_submit">Ok</button>
			</div>
		
		</div>
</div>
</form>

<script>
	$('input:radio[name="cancel"]').die().live("click",function(){
		$(".ok_cancel").show();
	});
</script>