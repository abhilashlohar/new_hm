<div style="background-color: rgb(255, 255, 255); padding: 0px 20px;">
<table cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
		<td><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-book"></i> Resident Directory</span></td>
		<td align="right">
			<div class="input-append ">  
			   <input class="m-wrap medium" size="10" placeholder="Search" id="search" type="text"><button class="btn red ser">Search</button>
			</div>
		</td>
	</tr>
</tbody></table>
</div>
<style>
.r_d{
width:32%; float:left; padding:5px;
}

@media (min-width: 650px) and (max-width: 1200px){
.r_d{
width:46%;float:left; padding:5px;
}
}

@media (max-width: 650px) {
.r_d{
width:100%; float:left; padding:5px;
}
}

.hv_b:hover{
background-color:rgb(218, 236, 240);
}
</style>
<?php foreach($arranged_users as $user_info){ 
	$user_name=$user_info["user_name"];
	$wing_flats=$user_info["wing_flat"];
	foreach($wing_flats as $user_flat_id=>$wing_flat){?>
	<div class="r_d">
		<div style="background-color: rgb(255, 255, 255); padding: 4px;">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td rowspan="2" valign="top">
						<img alt="" src="http://localhost/new_hm/profile/blank.jpg" style="width:50px; height:28px;">
					</td>
					<td valign="top">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td valign="top">
								<?php echo $user_name; ?>
								</td>
							 </tr>
							 <tr>
								<td valign="top">
								<?php echo $wing_flat; ?>
								</td>
							 </tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php } ?>
<?php } ?>

