<div style="background-color: #FFF; padding: 0px 10px; border: 1px solid rgb(233, 231, 231);">
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td style="white-space: nowrap;"><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-th-list"></i> Contact Handbook </span><span class=" tooltips" data-placement="bottom" data-original-title="This list is maintained by your society members"><i class=" icon-info-sign"></i></span></td>
		<td align="right">
			<span style="margin-top: 5px; margin-bottom: 5px;"><a href='contact_handbook_export'class='btn' download='download'><i class="fa fa-file-excel-o"></i></a></span>
			<input class="m-wrap medium" placeholder="Search" id="search" style="margin-top: 5px; margin-bottom: 5px;" type="text">
			<a  onclick="blank_value();" href="javascript:ShowContactForm()" class=" btn blue" style="margin-top: 5px; margin-bottom: 5px;"><i class='icon-plus-sign'></i> Add New </a>
		</td>
	</tr>
</table>
</div>


<div style="float:left; width:68%;">

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

.hv_b{
background-color:rgb(218, 236, 240);
}
</style>
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

	  
	  function search_record()
		  {
		    if(xobj)
			 {	
			 
		     var c1=document.getElementById("get_search").value;
			 var query="?con=" + c1;
			
			 xobj.open("GET","contact_handbook_view_page" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("view_search").innerHTML=xobj.responseText;
			   }
			  }
			  
			 }
			 xobj.send(null);
		  }
		  
	</script>



<div id="all_dir">


<div id="view_search">

 <?php
			foreach ($result_contact_handbook as $collection)            
			{  
				$c_h_id=$collection['contact_handbook']["c_h_id"];
				$mobile=$collection['contact_handbook']["c_h_mobile"];
				$user_id=(int)$collection['contact_handbook']['user_id'];
				$name=$collection['contact_handbook']["c_h_name"];
				$email=$collection['contact_handbook']["c_h_email"];
				$web=$collection['contact_handbook']["c_h_web"];
				$service=$collection['contact_handbook']["c_h_service"];
				$service_name="";$result_contact_handbook_service='';
				
				if(!empty($service)){
				foreach($service as $data){
				$result_contact_handbook_service[]=$this->requestAction(array('controller' => 'hms', 'action' => 'contact_handbook_service'),array('pass'=>array($data)));	
				$service_name=implode(',',$result_contact_handbook_service);
				}
				}
		
$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($user_id)));
$user_name=$result_user["user_name"];
$flat_info=$result_user["wing_flat"];
foreach($flat_info as $wing_flat){
	$wing_flat=$wing_flat;
}		
			
?>

<div class="r_d fadeleftsome" style="width:45%" >
	<div class="hv_b" style="overflow: auto;padding: 5px;cursor: pointer;" title="">
		<div style="float:left;margin-left:3%;"  >

			<i class="icon-user"></i> &nbsp; <span style="font-size:16px;"><?php echo $name; ?></span><br/>
			<i class=" icon-wrench"></i> &nbsp; <span style="font-size:14px;">Services :<span style="display:none;"><?php echo $service_name ; ?></span><span class=" tooltips" data-placement="top" data-original-title="<?php echo $service_name ; ?>">  <i class=" icon-search"></i></span> </span><br/>
			<i class="icon-phone-sign"></i> &nbsp; <span style="font-size:14px;"><?php echo $mobile ; ?></span><br/>
			<i class="icon-envelope-alt"></i> &nbsp; <span style="font-size:14px;"><a style="text-decoration: blink;" href="mailto:<?php echo $email ; ?>"><?php echo $email ; ?></a></span><br/>
			<i class="icon-sitemap"></i> &nbsp; <span style="font-size:14px;"><a href='<?php echo $web ; ?>' target="_blank"> <?php echo $web ; ?></a></span><br/>

			<i class="icon-user"></i> &nbsp; <span class="" data-placement="right" data-original-title="">Added by: <?php echo $user_name ; ?> <?php echo $wing_flat; ?></span><br/> 
				<center>
				<?php
				if($s_user_id==$user_id )
				{
				?>
				<span class="btn mini yellow contact_edit" contact_id="<?php echo $c_h_id; ?>"><i class=' icon-edit'></i>  </span> 
				<?php } ?>
				<?php
				if($s_user_id==$user_id)
				{ ?>
				<span ><a role='button' element_id='<?php echo $c_h_id ; ?>' class="btn mini con_delete red" > <i class="icon-trash"></i>  </a></span>
				<?php } ?>
				</center>
		</div>
	</div>
</div>
<?php 
}
?>
</div>
</div>


<div id="con_show" style="display:none;" >
<div class="modal-backdrop fade in"></div>
<div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-body" style="font-size:16px;">

</div> 
<div class="modal-footer">
<div id='new_create'>
<a href="contact_handbook" class="btn green">OK</a> 
</div>
<a href="#" role="button" id="can" class="btn">No</a>
</div>
</div>

</div>


<div id="view_dir" style="display:none;" class="fadeleftsome">

<br/><br/><div align="center" style="font-size:24px;"><img src="<?php echo $this->webroot ; ?>/as/loading.gif" height="50px" width="50px"/><br/>Please Wait</div>

</div>

<script>
$(document).ready(function() {
	$("#back").live('click',function(){
			$("#view_dir").hide();
			$("#all_dir").show();	
	});
	
	$(".contact_edit").live('click',function(){
		
		var id=$(this).attr("contact_id");
		$("#new_text").val(0);
		$("#contact_hand").hide();
		$("#edit_contact").load('contact_handbook_edit?id=' + id);
		
	});
	
	
	$(".cancel_form").live('click',function(){
	$("#hide_dive").hide();

	});	
});





</script>

<script>

function view_ticket(id)
{

	$(document).ready(function() {
				
				
				$( "#view_dir" ).load( 'contact_handbook_view_page?id=' + id , function() {
				
				  $("#all_dir").hide();
				 
				  $("#view_dir").show();
				});
		
		
		});
	
}

$(document).ready(function() {
$(".con_delete").click(function(){
 var t=$(this).attr('element_id');
  $("#con_show").show();
  $('#con_show').html('<div class="modal-backdrop fade in"></div><div   class="modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"><div class="modal-body" style="font-size:14px;"><i class="icon-warning-sign" style="color:#d84a38;"></i> Sure, you want to delete the contact handbook permanently ? </div><div class="modal-footer"><a href="contact_handbook_delete?con='+t+'" class="btn blue" >Yes</a><a href="#"  role="button" id="can" class="btn">No</a></div></div>');
   $("#can").live('click',function(){
   $('#con_show').hide();
});
 
});
});
</script>

</div>
<div style="float:right; display:none;" id="contact_hand">

<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					
				</div>
                
       
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid" >
					<div>
                        <div class="row-fluid"  >
              			 <div class="span12">
                  <!-- BEGIN VALIDATION STATES-->
				  
                 		 <div class="portlet box blue " style="">
                     <div class="portlet-title" style="background-color: #7490BE;" >
                        <h4><i class="icon-th-list" style='font-size:16px;'></i>Contact Handbook Registration</h4>
                        
                     </div>
                     <div class="portlet-body form " >
                        <h3 class="block"></h3>
                        <!-- BEGIN FORM-->
                        <form  id="contact-form"  method="post" name="form" enctype="multipart/form-data" onSubmit="return validate();">
                         <fieldset>
						 
						  
						 
                           <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Name of service provider/vendor </label>
                                 <input type="text" class="span12 m-wrap"  name="name" id="na">
                              </div>
                           </div>
                         
						 <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Services offered </label>
                              
								 
								  <select data-placeholder="You can select multiple services "  name="service[]"  class="  chosen" multiple="multiple" style="width: 290% !important;" >
									 <?php
									foreach($contact_handbook_service as $data){
										$contact_handbook_service_id=$data['contact_handbook_service']['contact_handbook_service_id'];
										$contact_handbook_service_name=$data['contact_handbook_service']['contact_handbook_service_name'];
										?> 
									<option value="<?php echo $contact_handbook_service_id; ?>"><?php echo $contact_handbook_service_name; ?>  </option>
									 
									 <?php } ?>
									 </select>
								 </div>
                           </div> 
								  

								  
						  
                                 <input type="hidden" class="span12 m-wrap"  name="text_id" id="hid_id">
                           
                           
                            <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Mobile</label>
                                 <input type="text" class="span12 m-wrap" name="mobile" maxlength="10" id="mob">
                              </div>
                           </div>
						   
						     <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Email</label>
                                 <input type="text" class="span12 m-wrap" name="email" id="email_tex">
                              </div>
                           </div>
						   
						    <div class="control-group ">
                              <div class="controls">
                               <label class="" style="font-size:14px;" >Website</label>
                                 <input type="text" class="span12 m-wrap" name="web" id="web_tex">
                              </div>
                           </div>
						   
						   
                          <br/>
                                       <div class=""  >
                             <input type="submit" style="background-color: #7490BE;"  class="btn blue" value="Submit" name="sub"> 
							 <a   href="javascript:ShowContactcancel()" class=" btn " >Cancel </a> </div>
                           
                           </fieldset>
                        </form>
                        <!-- END FORM-->
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END VALIDATION STATES-->
               </div>
            </div>
            
            
            
            
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			

</div>
<div id="edit_contact">
</div>		
	<input type="hidden" id="new_text"value="1"	>	
	
<script>
$(document).ready(function(){
<?php 
	$contact_handbook=$this->Session->read('contact_create');
if($contact_handbook==1){
?>	
	$.gritter.add({

			title: '<i class="icon-th-list"></i> Contact Handbook',
			text: '<p>Contact handbook is successfully register.</p>',
			sticky: false,
			time: '10000',

		});
	
<?php
$this->requestAction(array('controller' => 'hms', 'action' => 'griter_notification'), array('pass' => array('contact_handbook')));
 } ?>
	
		$('#contact-form').validate({
			
	    rules: {
	      name: {
	       
	        required: true
	      },
		  mobile: {
	       
	        //required: true,
			number:true,
			minlength:10,
			maxlength:10
	      },
		   email: {
	       
	        //required: true,
			email:true
	      },
		    address: {
	        required: true
	      },
		 
	    },
		
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			},
			submitHandler: function () {
				
				$("input[name=sub]").attr('disabled','disabled');
				
				 form.submit();
			}
	  });
	  


}); 
</script>


<script>

var contact_advertiser = false;
function ShowContactForm()
{
	
	var z=document.getElementById("new_text").value;
	
	if(z!=1){
		document.getElementById("hide_dive").style.display="none";
	}
	if(!contact_advertiser)
	{
		document.getElementById("contact_hand").style.display="block";
		contact_advertiser = true;
	}
	else
	{
		document.getElementById("contact_hand").style.display="none";
		contact_advertiser = false;
	}
}
</script>

<script>
var contact_advertiser = false;
function ShowContactFormzzz()
{
	if(!contact_advertiser)
	{
		document.getElementById("contact_hand").style.display="block";
		contact_advertiser = false;
	}
	else
	{
		document.getElementById("contact_hand").style.display="none";
		contact_advertiser = false;
	}
}
</script>
<script>
var contact_advertiser = false;
function ShowContactcancel()
{
	if(!contact_advertiser)
	{
	
		document.getElementById("contact_hand").style.display="none";
		contact_advertiser = false;
	}
	else
	{
		document.getElementById("contact_hand").style.display="none";
		contact_advertiser = false;
	}
}
</script>


<script>
function contact_add(id,mobi,nam,email_ch,web_ch,service_ch)
{
document.getElementById("na").value=nam;
document.getElementById("mob").value=mobi;
document.getElementById("hid_id").value=id;
document.getElementById("email_tex").value=email_ch;
document.getElementById("web_tex").value=web_ch;
//document.getElementById("ser_tex").value=service_ch;
ShowContactFormzzz();

}

function blank_value()
{
document.getElementById("na").value="";
document.getElementById("mob").value="";
document.getElementById("hid_id").value="";
document.getElementById("email_tex").value="";
document.getElementById("web_tex").value="";
document.getElementById("ser_tex").value="";
}
</script>
<script>
function show_tooltips()
{
$(document).ready(function() {
 jQuery('.tooltips').tooltip();
});
}
	  
</script>
<script type="text/javascript">
		 var $rows = $('#view_search .r_d');
		 $('#search').keyup(function() {
			var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
			
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
				return !~text.indexOf(val);
			}).hide();
		});
 </script>