<?php
echo $this->requestAction(array('controller' => 'hms', 'action' => 'submenu_as_per_role_privilage'), array('pass' => array()));?>


<div style="background-color: rgb(255, 255, 255); padding: 0px 20px;">
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td ><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="fa fa-file-text"></i> Documents</span> <span><i class=" icon-info-sign tooltips " data-placement="bottom" data-original-title="You could post frequently needed content like Society Rules &amp; Regulations, Associations Policies, Standard Operating Procedures, Guidelines, News Letters etc."></i>
        </span></td>
		<td align="right">
			<div class="input-append ">  
			   <input class="m-wrap medium" size="10" placeholder="Search" id="search" type="text"><button class="btn red ser" >Search</button>
			</div>
		</td>
	</tr>
</table>
</div>
<br/>
<?php $i=0;

foreach ($result_resource as $collection){
	$i++;
	$title=$collection['resource']["resource_title"];
	 $name=$collection['resource']["resource_attachment"];
	 $ext = pathinfo($name, PATHINFO_EXTENSION);
	 $category_id=(int)$collection['resource']['resource_category'];
	 $category_name = $this->requestAction(array('controller' => 'hms', 'action' => 'resource_category_name'),array('pass'=>array($category_id)));
	 $date=$collection['resource']['resource_date'];
	$upload_id=$collection['resource']['user_id'];

	$id=$collection['resource']['resource_id'];
	 $to=@(int)$collection['resource']['visible'];
	$wing_notice_id=@$collection['resource']['sub_visible'];
	$data='';
	
	
	
	$result_user_info=$this->requestAction(array('controller'=>'Fns','action'=>'user_info_via_user_id'), array('pass' => array((int)$upload_id)));
		foreach($result_user_info as $collection2){
		$uploadby=$collection2["user"]["user_name"];
		@$profile_pic=@$collection2["user"]["profile_pic"];
		}
	
	?>
	<div class=" search_record" id="">
	<div class="span6 " style="padding: 5px;" >
	<div  style="background-color: rgb(255, 255, 255); padding: 10px; color: rgb(96, 96, 96); width: 98%; margin: auto;">
		<div style="font-size: 14px;"> <span style="font-weight: 600;"><?php echo $title; ?></span> </div>
		<br/>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="120">
					<div style="height: 100px; width: 100px; border: 1px solid rgb(177, 177, 177); padding-top: 10px; color: rgb(216, 74, 56);" align="center"><i style="font-size: 60px;" class="fa fa-file-pdf-o"></i><br><span>PDF</span></div>
					
				</td>
				<td valign="top">
					<span style="font-size: 12px; color: rgb(150, 150, 150);font-weight: 600;">Uploaded on: </span><span style="font-size: 12px; color: rgb(150, 150, 150);"><?php echo $date; ?></span><br/>
					<span style="font-size: 12px; color: rgb(150, 150, 150);font-weight: 600;">Category:</span> <span style="font-size: 12px; color: rgb(150, 150, 150);">  <?php echo $category_name; ?></span> <br/>
					<span style="font-size: 12px; color: rgb(150, 150, 150);font-weight: 600;">Recipients:</span> <span style="font-size: 12px; color: rgb(150, 150, 150);"> <?php echo $to; ?></span> <br/>
					<span style="font-size: 12px; color: rgb(150, 150, 150);font-weight: 600;">Uploaded By:</span> <span style="font-size: 12px; color: rgb(150, 150, 150);"> <?php echo $uploadby; ?></span> <br/>
					<a href="<?php echo $webroot_path; ?>resource_file/<?php echo $name; ?>" download><i class="icon-download-alt"></i> Download</a> <?php if($role_id==1) {?>  | <a href="<?php echo $webroot_path; ?>/Documents/resource_edit/<?php echo $id ?>" rel='tab' role="button"> <i class=" icon-edit"></i> Edit</a> <?php } ?>
				</td>
			</tr>
		</table>
	</div>
	</div>
	</div>
	<?php
} ?>

<script>
$(document).ready(function(){
<?php

$status1=(int)$this->Session->read('document_status');
$status2=(int)$this->Session->read('document_status1');
if($status1==1)
{

?>
			$.gritter.add({

			title: '<i class="icon-file"></i> Documents',
			text: 'Documents are published.',
			sticky: false,
			time: '10000',

			});

<?php 

$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(4)));

  }   

		if($status2==2)
		{

		?>
			$.gritter.add({

			title: '<i class="icon-file"></i> Documents',
			text: 'Documents are sent for approval.',
			sticky: false,
			time: '10000',

			});

		<?php 

		$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array(4)));

		}   ?>

  
  
});



</script>

<script type="text/javascript">

		 var $rows = $('.search_record');
		 $('.ser').click(function() {
			var z=$('#search').val();
			var val = $.trim(z).replace(/ +/g, ' ').toLowerCase();
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>
