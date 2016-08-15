<?php if($type==1){ ?>
<div class="controls">
		<select style="font-size:16px;" id="" class="m-wrap chosen user_info" name="user"  data-placeholder="Choose a Category"   tabindex="1">
		<option value="" >--Select member--</option>
		<?php 

		foreach ($result_user as $db) 
		{
		$user_id=$db['user']["user_id"];
		$user_name=$db['user']["user_name"];
		?>
		<option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
		<?php } ?>
		</select>
</div>
<?php } ?>

<?php if($type==2){ ?>
<div class="controls">
		<select style="font-size:16px;" id="wing" class="m-wrap chosen wing_select" name="wing_name"  data-placeholder="Choose a Category"   tabindex="1">
		<option value="" >--Select Wing--</option>
		<?php 

		foreach ($result_wing as $db) 
		{
		$wing_id=$db['wing']["wing_id"];
		$wing_name=$db['wing']["wing_name"];
		?>
		<option value="<?php echo $wing_id; ?>"><?php echo $wing_name; ?></option>
		<?php } ?>
		</select>
</div>
<?php } ?>


<?php if($type==3){ ?>
<div class="controls">
		<select style="font-size:16px;" id="" class="m-wrap chosen" name="flat_name"  data-placeholder="Choose a Category"   tabindex="1">
		<option value="" >--Select flat--</option>
		<?php 

		foreach ($result_flat as $db) 
		{
		 $flat_id=$db['flat']["flat_id"];
		 $flat_name=$db['flat']["flat_name"];
		 $flat_name=ltrim($flat_name,'0');
		?>
		<option value="<?php echo $flat_id; ?>"><?php echo $flat_name; ?></option>
		<?php } ?>
		</select>
</div>
<?php } ?>

<script>
$(".chosen").chosen();
</script>