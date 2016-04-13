<?php 
function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            @$length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                @$output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

?>
<div style="background-color: rgb(255, 255, 255); padding: 0px 20px; border: 1px solid rgb(233, 231, 231);">
<table cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
		<td><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-book"></i> Resident Directory</span></td>
		<td align="right">
			   <input class="m-wrap medium"  placeholder="Search" id="search" type="text" style="margin-top: 5px; margin-bottom: 5px;">
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

.qwe{
	background-color: #FFF; padding: 4px;border: 1px solid #ECECEC;
}
.qwe:hover{
background: transparent linear-gradient(141deg, #0FB8AD 0%, #1FC8DB 61%, #2CB5E8 75%) repeat scroll 0% 0%;

color:#FFF;
}
</style>
<div id="main" style="overflow: auto;">
<?php 

foreach($arranged_users as $user_info){ 
	$user_flat_id=(int)$user_info["user_flat_id"];
	$user_name=$user_info["user_name"];
	$user_name=substrwords($user_name,20,'...');
	$wing_flats=$user_info["wing_flat"];
	$profile_pic=$user_info["profile_pic"];
	foreach($wing_flats as $user_flat_id=>$wing_flat){?>
	
	<div class="r_d">
		<a href="member_profile/<?php echo $user_flat_id; ?>" role="button" rel='tab'>
			<div class="qwe">
				<div class="hv_b" style="overflow: auto;padding: 5px;cursor: pointer;" title="">
					<?php if(!empty($profile_pic) && $profile_pic!="blank.jpg"){ ?>
							<img alt="" src="<?php echo $webroot_path; ?>profile/<?php echo @$profile_pic; ?>" class="profile_pic"/>
							<?php }
							elseif(!empty($f_profile_pic)){ ?>
								<img alt="" src="<?php echo $f_profile_pic; ?>" class="profile_pic" />
							<?php }
							elseif(!empty($g_profile_pic)){ ?>
								<img alt="" src="<?php echo $g_profile_pic; ?>" class="profile_pic" />
							<?php }
							else{ ?>
								<img alt="" src="<?php echo $webroot_path; ?>profile/blank.jpg" class="profile_pic" />
							<?php } ?>
					<div style="float:left;margin-left:3%;margin-top: 3px;">
						<span style="font-size:18px;"><?php echo ucfirst($user_name); ?></span> 
						 <br>
						<span style="font-size:14px;"><?php echo $wing_flat; ?></span>
					</div>
				</div>
			</div>
		</a>
	</div>
		
	<?php } ?>
<?php } ?>
</div>
<style>
.profile_pic{
	float:left;max-width:25%;width:50px;height:60px;
}
</style>
<script type="text/javascript">

	 var $rows = $('#main div');
	 $('#search').keyup(function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
		
		$rows.show().filter(function() {
			var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
			return !~text.indexOf(val);
		}).hide();
	});
 </script>