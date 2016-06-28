<?php if($delete==0) { ?>


<div class="modal-header" >
	<h4 id="myModalLabel1">Cancel Voucher</h4>
</div>
<div class="modal-body">
	Are you sure to Cancel this Expanse Tracker Voucher ?
	<br/><br/>
	Reasion for Cancel: <input type="text" class="span6 m-wrap" id="resion"/>
</div>
<div class="modal-footer">
	<button class="btn" id="close_edit">No</button>
	<button class="btn red cancel_voucher_btn" voucher_id="<?php echo $v_id; ?>"><i class="icon-remove"></i> Cancel</button>
</div>

<?php } ?>









<?php if($delete==1) { ?>
<div class="modal-body">Voucher Canceled successfully.</div>
<div class="modal-footer"><a href="expense_tracker_view" class="btn blue" >Ok</a></div>
<?php } ?>

