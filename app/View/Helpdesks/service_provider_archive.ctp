<div class="hide_at_print">
<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div align="center" class="mobile-align">

<a href="service_provider_view" class="btn blue" rel='tab' > View</a>
<a href="service_provider_add" class="btn blue" rel='tab' > Add</a>
<a href="service_provider_archive" class="btn red" rel='tab' > Archive</a>

</div>
</div>
<style>
table th { font-size:12px !important ; }
.popover{ width:204px !important }
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
		  
	function service_provider_mail(id)
		  {		
		 	
			
		    if(xobj)
			 {
				
				  var c2=document.getElementById("texs" + id).value;
				   var c3=document.getElementById("em" + id).value;
				 
			 var query="?con2=" + c2 +"&con3=" +c3 ;
			  
			 xobj.open("GET","service_provider_mail" +query,true);
			 xobj.onreadystatechange=function()
			  {
			  if(xobj.readyState==4 && xobj.status==200)
			   {	   
			   document.getElementById("st").innerHTML=xobj.responseText;
			   }
			  }
			 
			 }
			 xobj.send(null);
		  }
		   </script>
	
<div id="st" class="h_d"> 
 </div>
 
 <div class="row-fluid" >
  <div class="span12" >
<div class="portlet box " >
							
							<div class="portlet-body mobile_responce">
									<div align="right" class="hide_at_print">
									<a href="service_provider_excel" class="btn blue mini"><i class="fa fa-file-excel-o"></i> </a>
									<a class="btn green mini" onclick="window.print()"><i class="icon-print"></i>  </a>
									</div>
							<table class="table table-bordered" id="sample_1">
							<thead>
    						<tr >
                                        	
                                    <th style="width:5%;">Sr No</th>
									<th>Vendor Name</th>
                                    <th>Contact Person</th>
								    <th>Services</th>
									<th>Mobile</th>
									<th>Email</th>
                                   
                                    <th></th>
									<th class="hide_at_print"><span style="font-size:14px;"><i class="icon-paper-clip"></i></span></th>
                                   							
									</tr>
									</thead>
									<tbody>
						
						
						<?php
                        $z=0;
                       
                        foreach ($result_service_provider as $collection) 
                        {
                        $z++;
                        $name=$collection['service_provider']['sp_name'];
                        $auto_id= (int)$collection['service_provider']['sp_id'];
                        $attachment=@$collection['service_provider']['sp_attachment'];
                        $ext = pathinfo($attachment, PATHINFO_EXTENSION);
                        $contect=@$collection['service_provider']['sp_mobile'];
		                $Contract_start=@$collection['service_provider']['sp_cont_start'];
                        $Contract_end=@$collection['service_provider']['sp_cont_end'];
                        $contrect_person=@$collection['service_provider']['sp_person'];
                        $email=@$collection['service_provider']['sp_email'];
                        $Contract_type=@$collection['service_provider']['sp_contract_type'];
                        $pan_number = @$collection['service_provider']['pan_number'];
						if($Contract_type=="Adhoc")
                        {
                        $Contract_start="N/A";
                        $Contract_end="N/A";
                        }
						 
						 
						
                        ?>
                            <tr class="">
                            <td><?php echo $z; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $contrect_person; ?></td>
                            <td>
							
                            <div class="btn-group hide_at_print">
                            <a class="btn mini" href="#" data-toggle="dropdown">
                            View Services
                            </a>
                <ul class="dropdown-menu" >
                       
                        <?php
                       $result_vendor = $this->requestAction(array('controller' => 'hms', 'action' => 'service_provider_vendor'),array('pass'=>array($auto_id)));
                        foreach ($result_vendor as $collection) 
						{
                         $category=(int)$collection['vendor']['category_id'];
						 $type = $this->requestAction(array('controller' => 'hms', 'action' => 'help_desk_category_name'),array('pass'=>array($category)));
						?>
						 <li><a  data-toggle="modal"><i class="icon-legal"></i><?php echo $type; ?></a></li>
						 
                <?php } ?>
                </ul>
                </div>
                        <div style="display:none;" class="hide_to_show"> <?php
                       $result_vendor = $this->requestAction(array('controller' => 'hms', 'action' => 'service_provider_vendor'),array('pass'=>array($auto_id)));
                        foreach ($result_vendor as $collection) 
						{
                         $category=(int)$collection['vendor']['category_id'];
						 $type = $this->requestAction(array('controller' => 'hms', 'action' => 'help_desk_category_name'),array('pass'=>array($category)));
						?>  
						<?php echo $type; ?>,
					<?php } ?>

						</div>
                            
                            
                            </td>
                            <td><?php echo $contect; ?></td>
							<td><?php echo $email; ?></td>
                                                   
                            <td>
								
								 <span style="min-width:50px !important; " data-placement="left" class="popovers btn mini" data-trigger="hover"
								data-content="
								<p> <span> Contract Type </span> : <span> <?php echo $Contract_type; ?> </span></p>
								<p> <span> Contract from </span> : <span>  <?php echo $Contract_start; ?> </span> </p>
								<p><span> Contract to </span>  <span style='margin-left:18px;'>:  <?php echo $Contract_end; ?> </span> </p>
								<p><span> PAN Number </span>  <span style='margin-left:6px;'>:  <?php echo $pan_number; ?> </span></p>
								" data-original-title="Other Info"
								>detail</span>
								
								
							</td>
                            <td class="hide_at_print">
                            <?php
                            if(!empty($attachment))
							{
                            ?> 
							
							
							
							<a href="<?php echo $this->webroot; ?>service_provider_file/<?php echo $attachment; ?>" class=" tooltips"  data-placement="bottom" data-original-title="<?php echo $attachment; ?>" download="<?php echo $attachment ; ?>"><i class=" icon-download-alt"></i></a>
                            <?php
                            }
                            else
                            {
                            ?>
                            <a href="#" class=" tooltips" role='button' data-placement="bottom" data-original-title="<?php echo 'empty';?>"><i class=" icon-download-alt"></i></a>
                           <?php
                            } ?>
						
                             </td>
                            
                        </tr>
                   <!--popup start -->

								
								
					<!--popup end -->
     <?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->	
	</div>
		<!-- END PAGE -->	 	
	
	
	<script>
	 $(document).ready(function () {
		  jQuery('.popovers').popover({html: true});
		 
	  $('.h_d').delay(10000).fadeOut();
	 
	
	 });
	</script>