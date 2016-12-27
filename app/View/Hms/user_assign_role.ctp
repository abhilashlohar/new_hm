<script type="text/javascript">
 var xobj;
   //modern browers
   if(window.XMLHttpRequest)
    {
	  xobj=new XMLHttpRequest();
	  }
	  //for ie
	  else if(window.ActiveXObject)
	   {
	    xobj=new ActiveXObject("Microsoft.XMLHTTP");
		}
		else
		{
		  alert("Your broweser doesnot support ajax");
		  }

	
	function role(c1)
		  {
			if(xobj)
			 {		
			 var query="?con=" + c1;
			 xobj.open("GET","user_assign_role_ajax" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("show_designation").innerHTML=xobj.responseText;
			   test12();
			   }
			  }
			 }
			 xobj.send(null);
		  }

		 
		  
</script>

<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

	<!--BEGIN TABS-->
	<div class="tabbable tabbable-custom">
		<ul class="nav nav-tabs">
			
		</ul>
		<div class="tab-content" style="min-height:500px;">
			<div class="tab-pane active" id="tab_1_1">
				<form method="post">
<div class="control-group" style="width:40%; margin-left:28%;">
<div class="controls" >

<label style="margin-left:30%;">Select User Name</label>

 <span style="margin-left:10%;">
		<select class="span12 chosen" name="user" id="user"  data-placeholder="Type User Name" tabindex="1" onchange="role(this.value)">
			<option value="" style="display:none;"></option>
			<?php
			
			foreach ($result_user as $collection){
				
				$user_id = $collection['user_id'];
				$user_name=$collection["user_name"];
				$wing_flat=$collection["wing_flat"];
					foreach($wing_flat as $flat){
						
					}

			?>
					<option value="<?php echo $user_id; ?>" ><?php echo $user_name; ?> <?php echo $flat ; ?></option>
			<?php } ?>
		 </select>
 </span>
						  
</div>
</div>


<div id="show_designation" style="width:60%; margin-left:20%;">
</div>
</form>
			</div>
			
		</div>

<!-- END PAGE CONTENT-->
</div>
<script>
$(document).ready(function(){
	
$(".role_assign").die().live('click',function(){
	
var chk=$(this).is(":checked");
var role_id=$(this).val();
var user_id=$("select").val();
	$.ajax({
		url: "<?php echo $webroot_path; ?>Hms/user_assign_role_auto_save/"+chk+"/"+role_id+"/"+user_id,
	}).done(function(response){
		
	}); 

	
});	
	
	
});
</script>