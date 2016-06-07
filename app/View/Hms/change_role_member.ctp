<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PORTLET-->   
                  <div class="portlet box green">
                     <div class="portlet-title">
                        <h4><i class="icon-reorder"></i>Color Pickers</h4>
                        <div class="tools">
                           <a href="javascript:;" class="collapse"></a>
                           <a href="#portlet-config" data-toggle="modal" class="config"></a>
                           <a href="javascript:;" class="reload"></a>
                           <a href="javascript:;" class="remove"></a>
                        </div>
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                       <form method="post" class="form-horizontal">
                          
						   
								<div class="control-group">
                                       
                                    <div class="controls">
									  <?php //pr($result_user_role);

										foreach($result_user_role as $data){
											$auto_id=$data['user_role']['auto_id'];
											$role_id=$data['user_role']['role_id'];
											$default=@$data['user_role']['default'];
											$result_user_role=$this->requestAction(array('controller' => 'Fns', 'action' => 'role_name_via_role_id'), array('pass' => array($role_id)));
											?>
											  <label class="radio line">
												  <div class="radio" id="uniform-undefined">
													  <span>
															<input type="radio" name="role_change" value="<?php echo $auto_id; ?>" style="opacity: 0;" <?php if($default=="yes"){?> checked <?php } ?>>
													  </span>
												  </div>
											 <?php echo $result_user_role; ?>
											  </label>
										<?php } ?> 
                                    </div>
                                </div>
						   
						   
                           <div class="form-actions">
                              <button type="submit" class="btn green">Submit</button>
                             
                           </div>
                        </form>
                        <!-- END FORM-->  
                     </div>
                  </div>
                  <!-- END PORTLET-->
               </div>
            </div>