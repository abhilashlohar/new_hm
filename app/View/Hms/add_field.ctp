<form method="post">
<table class="table" border="1">
<tr>
	<td>User Name</td>
	<td>Email</td>
	<td>Mobile</td>
	<td>Password</td>
	<td>validation status</td>
</tr>
<?php 
foreach($result_user as $data){

?>
<tr>
	<td><?php echo $data['user']['user_name']; ?></td>
	<td><?php echo $data['user']['email']; ?></td>
	<td><?php echo $data['user']['mobile']; ?></td>
	<td><input type="text" name="password[]" value="<?php echo $data['user']['password']; ?>" ></td>
	<td>
		<input type="hidden" name="user_dat_id[]" value="<?php echo $data['user']['user_id']; ?>">
		<input type="text" name="validation_status[]" value="<?php echo @$data['user']['validation_status']; ?>">
	
	</td>
</tr>
<?php } ?>
</table>
<input type="submit" name="sub" class="btn blue" >
</form>