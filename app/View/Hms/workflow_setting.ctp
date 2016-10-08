<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));?>


<div class="tabbable tabbable-custom">


<form method='post' >
<table class="table  " border='0' style='background-color:#fafafa !important;width: 75%;
align-content: center;
margin-left: 13%;'>

<tr>
<td>
<span style='color:#3B6B96;font-size: 16px;font-weight: bold;'>1. Ticket will be raised to which members? </span><br><br>
<select data-placeholder="Type or select name"  name="multi[]" id="multi" class="chosen span9" multiple="multiple" tabindex="6">
		<?php 
		
		foreach($result_users_com as $data){
			$user_id=(int)$data['user_id'];
			$user_name=$data['user_name'];
			$wing_flat=$data['wing_flat']; 
		?>
		<option value="<?php echo $user_id; ?>" <?php if(in_array($user_id,$ticket_raised_by)){ ?> selected <?php } ?>> <?php echo $user_name; echo $wing_flat; ?>  </option>
		<?php  } ?>	         
</select>
	
</td>
</tr>

<tr>
<td>
<input type='submit' name='sub' class='btn blue' value='Update Settings' >
</td>

</tr>
</table>


</form>




</div>