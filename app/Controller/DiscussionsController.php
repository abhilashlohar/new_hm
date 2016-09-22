<?php
App::import('Controller', 'Hms');
class DiscussionsController extends HmsController {
var $helpers = array('Html', 'Form','Js','Text');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Discussions';

function count_comment_via_discussion_post_id($discussion_post_id){
	
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('discussion_comment');	
	$conditions=array("discussion_post_id"=>$discussion_post_id,"delete_id"=>0);	
	return $this->discussion_comment->find('all',array('conditions'=>$conditions));
}

function insert_hyperlink_url_comment_box($text){
	
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	if(preg_match($reg_exUrl, $text, $url)) {
		$text = nl2br($text);
		 return preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank" rel="nofollow">'.$url[0].'</a>', $text);

	} else {
		return $text = nl2br(wordwrap($text, 25, " ", true));
		  // return $text;
	}

}


function index($list=null,$id=null){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();

$dash_id = $this->request->query('dash_id');
$this->set("dash_id",$dash_id);


	$this->set("list",$list);
	$this->set("id",$id);
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id');
	$this->loadmodel('discussion_post');
	$conditions=array("society_id"=>$s_society_id,"status"=>0,'users_have_access' =>array('$in' => array($s_user_id)));
	$order=array('discussion_post.discussion_post_id'=> 'DESC');
	$posts=$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order));
	
	
	$this->set(compact("posts"));
}

function topic_show_type($type_list=null){
	$this->layout='blank';
	$this->ath();
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id');
	
	$this->set(compact("type_list"));
	if($type_list=="all"){
		$this->loadmodel('discussion_post');
		$conditions=array("society_id"=>$s_society_id,"status"=>0,'users_have_access' =>array('$in' => array($s_user_id)));
		$order=array('discussion_post.discussion_post_id'=> 'DESC');
		$posts=$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set(compact("posts"));
	}
	if($type_list=="my"){
		$this->loadmodel('discussion_post');
		$conditions=array("society_id"=>$s_society_id,"status"=>0,'user_id' =>$s_user_id);
		$order=array('discussion_post.discussion_post_id'=> 'DESC');
		$posts=$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set(compact("posts"));
	}
	
	if($type_list=="archive"){
		$this->loadmodel('discussion_post');
		$conditions=array("society_id"=>$s_society_id,'status' =>1);
		$order=array('discussion_post.discussion_post_id'=> 'DESC');
		$posts=$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set(compact("posts"));
	}
}

function submit_comment(){
	$this->ath();
	$s_user_id=$this->Session->read('hm_user_id');
	$s_society_id=$this->Session->read('hm_society_id');
	$post_id=(int)$this->request->data['post_id'];
	$comment=htmlentities($this->request->data['comment_box']);
	$webroot_path=$this->requestAction(array('controller' => 'Fns', 'action' => 'webroot_path'));
	if(empty($comment)){
		exit;
	}
	if(empty($s_user_id)){
		exit;
	}
	//$comment_box = nl2br(wordwrap($comment, 25, " ", true));
	$date=date("Y-m-d");
	$time=date('h:i:a',time());
	$comment_box=$this->insert_hyperlink_url_comment_box($comment);
	$ip= $this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
	$society_name= $this->requestAction(array('controller' => 'Fns', 'action' => 'society_name_via_society_id'),array('pass'=>array((int)$s_society_id)));
	
	$r=$this->content_moderation_society($comment);
	if($r==0){
		echo $word='You have entered banned words. <br/> ';
		exit;
	}else{
		$this->loadmodel('discussion_comment');
		$conditions=array("delete"=>"no");
		$order=array('discussion_comment.discussion_comment_id'=>'DESC');
		$cursor_last_color=$this->discussion_comment->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>1));
		foreach ($cursor_last_color as $collection_color) 
		{
		$last_color=$collection_color["discussion_comment"]["color"];
		}
		if(sizeof($cursor_last_color)==0) {  $last_color='blue'; }

			$color_in=$this->rendom_color($last_color);
		//////////////////end color///////////////////

		$this->loadmodel('discussion_post');
		$conditions=array('discussion_post_id'=>$post_id,'society_id'=>$s_society_id);
		$result_discussion_post=$this->discussion_post->find('all',array('conditions'=>$conditions));
		$create_post_id=$result_discussion_post[0]['discussion_post']['user_id'];
		$discussion_post_id=(int)$result_discussion_post[0]['discussion_post']['discussion_post_id'];
		$topic=$result_discussion_post[0]['discussion_post']['topic'];
		
		
		$discussion_comment_id=$this->autoincrement('discussion_comment','discussion_comment_id');
		$this->loadmodel('discussion_comment');
		$this->discussion_comment->saveAll(Array( Array("discussion_comment_id" => $discussion_comment_id, "user_id" => $s_user_id , "society_id" => $s_society_id, "comment" => $comment_box,"discussion_post_id" => $post_id, "delete_id" =>0, "date" =>$date, "time" => $time, "color" => $color_in))); 
		
		
		if($create_post_id==$s_user_id){
			
			$this->loadmodel('discussion_comment');
			$conditions=array("discussion_post_id"=>$discussion_post_id);
			$result_discussion_comment=$this->discussion_comment->find('all',array('conditions'=>$conditions));
			foreach($result_discussion_comment as $discussion_comment_data){
				$commenter_ids[]=$discussion_comment_data["discussion_comment"]["user_id"];
			}
			$commenter_ids=array_unique($commenter_ids);
			
			if (($key = array_search($s_user_id, $commenter_ids)) !== false) {
				unset($commenter_ids[$key]);
			}
			$commenter_ids=array_values($commenter_ids);
			
			
			$current_member_info= $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$s_user_id)));
				$current_member_name=$current_member_info["user_name"];
				$current_wing_flats=$current_member_info["wing_flat"];
				$current_profile_pic=$current_member_info["profile_pic"];
				foreach($current_wing_flats as $current_wing_flat){
					$current_wing_flats=$current_wing_flats;
				}
			
			foreach($commenter_ids as $commenter_id){
				if($commenter_id!=$create_post_id){
					$commenter_info= $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$commenter_id)));
					$commenter_name=$commenter_info["user_name"];
					$email=@$commenter_info["email"];
					if(!empty($email)){
					
					$reply="donotreply@housingmatters.in";
					
					
					
					$message_web='<div style="margin:0;padding:0" dir="ltr" bgcolor="#ffffff">
								<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%;">
									<tbody>
										<tr>
											<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
												<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="line-height:20px" colspan="3" height="20">&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
															<tbody>
															<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															<tr>
															<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td width="100%"><a href="#" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px" target="_blank"><span style="color:#00A0E3">Housing</span><span style="color:#777776">Matters</span></a></td>
															<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img  src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
																
															</td>
															</tr>
															<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															</tbody>
															</table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:28px" height="28">&nbsp;</td></tr><tr><td><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">Hello  '.$commenter_name.'<br/>'.$current_member_name.' Commented on his own topic.</span></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr><tr><td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border:solid 1px #e5e5e5;border-radius:2px;display:block"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding:5px 10px;background:#269ABC;border-top:#cccccc 1px solid;border-bottom:#cccccc 1px solid"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:19px;color:#FFF">'.$topic.'</span></td></tr><tr>
															<td style="padding:5px;">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td style="padding-right:10px;font-size:0px" valign="middle"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img  src="'.$ip.$this->webroot.'profile/'.$current_profile_pic.'" style="border:0" height="50" width="50"></a></td>
															<td style="width:100%" valign="middle">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="2">
															<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">'.$current_member_name.' '.$current_wing_flat.'</span><br/><span style="color:#ADABAB;font-size: 12px;">'.date("d-m-Y",strtotime($date)).'&nbsp;&nbsp;'.$time.'</span></td></tr><tr><td style="line-height:10px" colspan="2" height="10">&nbsp;</td></tr><tr><td width="100%"></td></tr></tbody></table>
															</td>
															</tr></tbody></table>
															</td>
														</tr>
														<tr>
															<td style="padding:5px;font-size:12px;" height="10">'.$comment_box.'</td>
														</tr>
													</tbody>
												</table></td></tr></tbody></table></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr></tbody></table></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
							</tr>						<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
																<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:2px" colspan="3" height="2">&nbsp;</td></tr><tr><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:1px solid #026A9E;background:#008ED5;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">View on HousingMatters</span></font></center></a></td></tr></tbody></table></a></td><td style="display:block;width:10px" width="10">&nbsp;&nbsp;&nbsp;</td><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px">Comment</span></font></center></a></td></tr></tbody></table></a></td><td width="100%"></td></tr><tr><td style="line-height:32px" colspan="3" height="32">&nbsp;</td></tr></tbody></table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														
														
												<tr>
															<td  width="15">&nbsp;&nbsp;&nbsp;</td>
													<td>
													<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															
															<tr>
															<td  align="left" valign="middle" width="">
															Thank you <br/>HousingMatters (Support Team)<br/>www.housingmatters.in
															
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															
															
															</tr>
															
															</tbody>
													</table>
													</td>
												</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>';
					$this->loadmodel('email');
					$conditions=array('auto_id'=>10);
					$result_email=$this->email->find('all',array('conditions'=>$conditions));
					foreach ($result_email as $collection){
						$from=$collection['email']['from'];
					}
					
	
					$from_name="HousingMatters";
					$subject= 'Discussion: ['. $society_name . ']' .'  -   '.'New Comment on '.$topic.'';
					$this->send_email($email,$from,$from_name,$subject,$message_web,$reply);
					
					
				}
				}
			}
			if(sizeof($commenter_ids)>0){
				$this->send_notification('<span class="label label-warning"><i class="fa fa-commenting-o" aria-hidden="true" style=" padding: 1px 0px 1px 2px; font-size: 15px; "></i></span>','New Comment: <b>'.$comment_box.'</b> by '.$current_member_name,$webroot_path.'Discussions/index?dash_id='.$discussion_post_id,$s_user_id,$commenter_ids);
			}
			
		}else{
			
			$create_post_info= $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$create_post_id)));
					$create_post_name=$create_post_info["user_name"];
					$create_post_email=@$create_post_info["email"];
					
					
			$this->loadmodel('discussion_comment');
			$conditions=array("discussion_post_id"=>$discussion_post_id);
			$result_discussion_comment=$this->discussion_comment->find('all',array('conditions'=>$conditions));
			foreach($result_discussion_comment as $discussion_comment_data){
				$commenter_ids[]=$discussion_comment_data["discussion_comment"]["user_id"];
			}
			$commenter_ids=array_unique($commenter_ids);
			
			if (($key = array_search($s_user_id, $commenter_ids)) !== false) {
				unset($commenter_ids[$key]);
			}
			$commenter_ids=array_values($commenter_ids);
			
			$current_member_info= $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$s_user_id)));
				$current_member_name=$current_member_info["user_name"];
				$current_wing_flats=$current_member_info["wing_flat"];
				$current_profile_pic=$current_member_info["profile_pic"];
				$current_email=$current_member_info["email"];
				foreach($current_wing_flats as $current_wing_flat){
					$current_wing_flats=$current_wing_flats;
				}
				
				///////////creator email///
				if(!empty($create_post_email)){
					
					$reply="donotreply@housingmatters.in";
					$message_web='<div style="margin:0;padding:0" dir="ltr" bgcolor="#ffffff">
								<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%;">
									<tbody>
										<tr>
											<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
												<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="line-height:20px" colspan="3" height="20">&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
															<tbody>
															<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															<tr>
															<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td width="100%"><a href="#" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px" target="_blank"><span style="color:#00A0E3">Housing</span><span style="color:#777776">Matters</span></a></td>
															<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img  src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
																
															</td>
															</tr>
															<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															</tbody>
															</table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:28px" height="28">&nbsp;</td></tr><tr><td><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">Hello  '.$create_post_name.'<br/>'.$current_member_name.' Commented on Your
															post you were interested.</span></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr><tr><td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border:solid 1px #e5e5e5;border-radius:2px;display:block"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding:5px 10px;background:#269ABC;border-top:#cccccc 1px solid;border-bottom:#cccccc 1px solid"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:19px;color:#FFF">'.$topic.'</span></td></tr><tr>
															<td style="padding:5px;">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td style="padding-right:10px;font-size:0px" valign="middle"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img  src="'.$ip.$this->webroot.'profile/'.$current_profile_pic.'" style="border:0" height="50" width="50"></a></td>
															<td style="width:100%" valign="middle">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="2">
															<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">'.$current_member_name.' '.$current_wing_flat.'</span><br/><span style="color:#ADABAB;font-size: 12px;">'.date("d-m-Y",strtotime($date)).'&nbsp;&nbsp;'.$time.'</span></td></tr><tr><td style="line-height:10px" colspan="2" height="10">&nbsp;</td></tr><tr><td width="100%"></td></tr></tbody></table>
															</td>
															</tr></tbody></table>
															</td>
														</tr>
														<tr>
															<td style="padding:5px;font-size:12px;" height="10">'.$comment_box.'</td>
														</tr>
													</tbody>
												</table></td></tr></tbody></table></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr></tbody></table></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
							</tr>						<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
																<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:2px" colspan="3" height="2">&nbsp;</td></tr><tr><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:1px solid #026A9E;background:#008ED5;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">View on HousingMatters</span></font></center></a></td></tr></tbody></table></a></td><td style="display:block;width:10px" width="10">&nbsp;&nbsp;&nbsp;</td><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px">Comment</span></font></center></a></td></tr></tbody></table></a></td><td width="100%"></td></tr><tr><td style="line-height:32px" colspan="3" height="32">&nbsp;</td></tr></tbody></table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														
														
												<tr>
															<td  width="15">&nbsp;&nbsp;&nbsp;</td>
													<td>
													<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															
															<tr>
															<td  align="left" valign="middle" width="">
															Thank you <br/>HousingMatters (Support Team)<br/>www.housingmatters.in
															
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															
															
															</tr>
															
															</tbody>
													</table>
													</td>
												</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>';
					$this->loadmodel('email');
					$conditions=array('auto_id'=>10);
					$result_email=$this->email->find('all',array('conditions'=>$conditions));
					foreach ($result_email as $collection){
						$from=$collection['email']['from'];
					}
					
	
					$from_name="HousingMatters";
					$subject= 'Discussion: ['. $society_name . ']' .'  -   '.'New Comment on '.$topic.'';
					$this->send_email($create_post_email,$from,$from_name,$subject,$message_web,$reply);
					
					
				}
				$create_post_id_ar[]=$create_post_id;
				$this->send_notification('<span class="label label-warning"><i class="fa fa-commenting-o" aria-hidden="true" style=" padding: 1px 0px 1px 2px; font-size: 15px; "></i></span>','New Comment: <b>'.$comment_box.'</b> by '.$current_member_name,$webroot_path.'Discussions/index?dash_id='.$discussion_post_id,$s_user_id,$create_post_id_ar);
				
				
				
				
				
			
			foreach($commenter_ids as $commenter_id){
				if($commenter_id!=$create_post_id){
					$commenter_info= $this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'),array('pass'=>array((int)$commenter_id)));
					$commenter_name=$commenter_info["user_name"];
					$email=@$commenter_info["email"];
					if(!empty($email)){
					
					$reply="donotreply@housingmatters.in";
					
					
					
					$message_web='<div style="margin:0;padding:0" dir="ltr" bgcolor="#ffffff">
								<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%;">
									<tbody>
										<tr>
											<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
												<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="line-height:20px" colspan="3" height="20">&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
															<tbody>
															<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															<tr>
															<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td width="100%"><a href="#" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px" target="_blank"><span style="color:#00A0E3">Housing</span><span style="color:#777776">Matters</span></a></td>
															<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img  src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
																
															</td>
															</tr>
															<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															</tbody>
															</table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:28px" height="28">&nbsp;</td></tr><tr><td><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">Hello  '.$commenter_name.'<br/>'.$current_member_name.' commented on a post you were interested.</span></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr><tr><td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border:solid 1px #e5e5e5;border-radius:2px;display:block"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding:5px 10px;background:#269ABC;border-top:#cccccc 1px solid;border-bottom:#cccccc 1px solid"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:19px;color:#FFF">'.$topic.'</span></td></tr><tr>
															<td style="padding:5px;">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td style="padding-right:10px;font-size:0px" valign="middle"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img  src="'.$ip.$this->webroot.'profile/'.$current_profile_pic.'" style="border:0" height="50" width="50"></a></td>
															<td style="width:100%" valign="middle">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="2">
															<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">'.$current_member_name.' '.$current_wing_flat.'</span><br/><span style="color:#ADABAB;font-size: 12px;">'.date("d-m-Y",strtotime($date)).'&nbsp;&nbsp;'.$time.'</span></td></tr><tr><td style="line-height:10px" colspan="2" height="10">&nbsp;</td></tr><tr><td width="100%"></td></tr></tbody></table>
															</td>
															</tr></tbody></table>
															</td>
														</tr>
														<tr>
															<td style="padding:5px;font-size:12px;" height="10">'.$comment_box.'</td>
														</tr>
													</tbody>
												</table></td></tr></tbody></table></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr></tbody></table></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
							</tr>						<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
																<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:2px" colspan="3" height="2">&nbsp;</td></tr><tr><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:1px solid #026A9E;background:#008ED5;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">View on HousingMatters</span></font></center></a></td></tr></tbody></table></a></td><td style="display:block;width:10px" width="10">&nbsp;&nbsp;&nbsp;</td><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index?dash_id='.$discussion_post_id.'" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px">Comment</span></font></center></a></td></tr></tbody></table></a></td><td width="100%"></td></tr><tr><td style="line-height:32px" colspan="3" height="32">&nbsp;</td></tr></tbody></table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														
														
												<tr>
															<td  width="15">&nbsp;&nbsp;&nbsp;</td>
													<td>
													<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															
															<tr>
															<td  align="left" valign="middle" width="">
															Thank you <br/>HousingMatters (Support Team)<br/>www.housingmatters.in
															
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															
															
															</tr>
															
															</tbody>
													</table>
													</td>
												</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>';
					$this->loadmodel('email');
					$conditions=array('auto_id'=>10);
					$result_email=$this->email->find('all',array('conditions'=>$conditions));
					foreach ($result_email as $collection){
						$from=$collection['email']['from'];
					}
					
	
					$from_name="HousingMatters";
					$subject= 'Discussion: ['. $society_name . ']' .'  -   '.'New Comment on '.$topic.'';
					$this->send_email($email,$from,$from_name,$subject,$message_web,$reply);
					
					
				}
				}
			}
			if(sizeof($commenter_ids)>0){
				$this->send_notification('<span class="label label-warning"><i class="fa fa-commenting-o" aria-hidden="true" style=" padding: 1px 0px 1px 2px; font-size: 15px; "></i></span>','New Comment: <b>'.$comment_box.'</b> by '.$current_member_name,$webroot_path.'Discussions/index?dash_id='.$discussion_post_id,$s_user_id,$commenter_ids);
			}
		}
	}
}

function topic_detail($post_id=null){
	$this->layout="blank";
	$this->ath();
	$s_user_id=$this->Session->read('hm_user_id');
	$s_society_id=$this->Session->read('hm_society_id');
	if(!empty($post_id)){
		
		$this->loadmodel('discussion_post');
		$conditions=array("discussion_post_id"=>(int)$post_id);
		$posts=$this->discussion_post->find('all',array('conditions'=>$conditions));
		$this->set(compact("posts"));
	}else{
		
		$this->loadmodel('discussion_post');
		$conditions=array("society_id"=>$s_society_id,"status"=>0,'users_have_access' =>array('$in' => array($s_user_id)));
		$order=array('discussion_post.discussion_post_id'=> 'DESC');
		$posts=$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>1));
		$this->set(compact("posts"));
	}
	
}

function comments($post_id=null,$comment_id=null){
	$this->ath();
	$s_user_id=$this->Session->read('hm_user_id');
	$s_society_id=$this->Session->read('hm_society_id');
	$this->set('s_user_id',$s_user_id);
	if(empty($comment_id)){
		$this->loadmodel('discussion_comment');
		$conditions=array("discussion_post_id"=>(int)$post_id,"delete_id"=>0,"society_id"=>$s_society_id);
		$order=array('discussion_comment.discussion_comment_id'=> 'ASC');
		$comments=$this->discussion_comment->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set(compact("comments"));
	}else{
		$this->loadmodel('discussion_comment');
		$conditions=array("discussion_post_id"=>(int)$post_id,"discussion_comment_id"=>array('$gt'=>(int)$comment_id),"delete_id"=>0,"society_id"=>$s_society_id);
		$order=array('discussion_comment.discussion_comment_id'=> 'ASC');
		$comments=$this->discussion_comment->find('all',array('conditions'=>$conditions,'order'=>$order));
		$this->set(compact("comments"));
	}
	
}

function new_topic(){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id');
	$webroot_path=$this->requestAction(array('controller' => 'Fns', 'action' => 'webroot_path')); 
	
	if(isset($this->request->data['sub'])){
		$topic=htmlentities($this->request->data['topic']);
		$topic = wordwrap($topic, 25, " ", true);
		$description=htmlentities($this->request->data['description']);
		$description = nl2br(wordwrap($description, 25, " ", true));
		$description = iconv("utf-8", "utf-8//ignore", $description);
		$file=$this->request->form['file']['name'];
		if(!empty($file)){
			$target = "discussion_file/";
			$target=@$target.basename( @$this->request->form['file']['name']);
			$ok=1;
			move_uploaded_file(@$this->request->form['file']['tmp_name'],@$target);
		}
		$date=date("Y-m-d");
		$time=date('h:i:a',time());
		$send_to=$this->request->data['send_to'];
		if($send_to=="all_users"){
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,null)));
			$sub_visible=null;
		}
		if($send_to=="role_wise"){
			$roles=$this->request->data['roles'];
			$details=implode(",",$roles);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$roles;
		}elseif($send_to=="wing_wise"){
			$wings=$this->request->data['wings'];
			$details=implode(",",$wings);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$wings;
		}
		elseif($send_to=="group_wise"){
			$groups=$this->request->data['groups'];
			$details=implode(",",$groups);
			$receivers= $this->requestAction(array('controller' => 'Fns', 'action' => 'sending_option_results'),array('pass'=>array($send_to,$details)));
			$sub_visible=$groups;
		}
		$users_have_access=array();
		foreach($receivers as $user_id=>$user_info){
			$users_have_access[]=$user_id;
		}
		
		$this->loadmodel('discussion_post');
		$discussion_post_id=$this->autoincrement('discussion_post','discussion_post_id');
		$this->discussion_post->saveAll(Array( Array("discussion_post_id" => $discussion_post_id, "user_id" => $s_user_id , "society_id" => $s_society_id, "topic" => $topic,"description" => $description, "file" =>$file,"delete" =>"no", "date" =>strtotime($date), "time" => $time, "visible" => $send_to, "sub_visible" => $sub_visible,"users_have_access"=>$users_have_access,"status"=>0))); 
		
		
		
		$this->loadmodel('society');
		$conditions=array("society_id"=>$s_society_id);
		$society_info=$this->society->find('all',array('conditions'=>$conditions));
		$society_name=$society_info[0]["society"]["society_name"];
		
		$ip= $this->requestAction(array('controller' => 'Fns', 'action' => 'hms_email_ip'));
		$this->loadmodel('user');
		$conditions=array("user_id"=>$s_user_id,"active"=>"yes");
		$users=$this->user->find('all',array('conditions'=>$conditions));
		foreach($users as $data){
			$user_id=$data["user"]["user_id"];
			$sender_email=$data["user"]["email"];
			$profile_pic=@$data["user"]["profile_pic"];
			$user_name_post=$data["user"]["user_name"];
			if(!empty($sender_email)){
				$reply=$sender_email;
			}else{
				$reply="donotreply@housingmatters.in";
			}
			$result_user=$this->requestAction(array('controller' => 'Fns', 'action' => 'member_info_via_user_id'), array('pass' => array($user_id))); 
			$wing_flat=$result_user["wing_flat"];
			foreach($wing_flat as $data){
				$wing_flat=$data;
			}
		}
		$en_discussion_post_id=$this->requestAction(array('controller' => 'hms', 'action' => 'encode'), array('pass' => array($discussion_post_id,'housingmatters'))); 			
		foreach($receivers as $user_id=>$user_info){
			$email=$user_info["email"];
			$user_name=$user_info["user_name"];
			if(!empty($email)){
				$message_web='<div style="margin:0;padding:0" dir="ltr" bgcolor="#ffffff">
								<table style="border-collapse:collapse" border="0" cellpadding="0" cellspacing="0" width="100%;">
									<tbody>
										<tr>
											<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
												<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td style="line-height:20px" colspan="3" height="20">&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
															<tbody>
															<tr><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															<tr>
															<td style="height:32;line-height:0px" align="left" valign="middle" width="32"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img src="'.$ip.$this->webroot.'as/hm/HM-LOGO-small.jpg" style="border:0" height="50" width="50"></a></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td width="100%"><a href="#" style="color:#3b5998;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px" target="_blank"><span style="color:#00A0E3">Housing</span><span style="color:#777776">Matters</span></a></td>
															<td align="right"><a href="https://www.facebook.com/HousingMatters.co.in" target="_blank"><img  src="'.$ip.$this->webroot.'as/hm/SMLogoFB.png" style="max-height:30px;min-height:30px;width:30px;max-width:30px" height="30px" width="30px"></a>
																
															</td>
															</tr>
															<tr style="border-bottom:solid 1px #e5e5e5"><td style="line-height:16px" colspan="4" height="16">&nbsp;</td></tr>
															</tbody>
															</table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:28px" height="28">&nbsp;</td></tr><tr><td><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">Hello  '.$user_name.'<br/>A new topic created in Discussion Forum</span></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr><tr><td><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border:solid 1px #e5e5e5;border-radius:2px;display:block"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="padding:5px 10px;background:#269ABC;border-top:#cccccc 1px solid;border-bottom:#cccccc 1px solid"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:19px;color:#FFF">'.$topic.'</span></td></tr><tr>
															<td style="padding:5px;">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td style="padding-right:10px;font-size:0px" valign="middle"><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><img  src="'.$ip.$this->webroot.'profile/'.$profile_pic.'" style="border:0" height="50" width="50"></a></td>
															<td style="width:100%" valign="middle">
															<table style="border-collapse:collapse" cellpadding="0" cellspacing="0"><tbody><tr><td colspan="2">
															<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">'.$user_name_post.' '.$wing_flat.'</span><br/><span style="color:#ADABAB;font-size: 12px;">'.date("d-m-Y",strtotime($date)).'&nbsp;&nbsp;'.$time.'</span></td></tr><tr><td style="line-height:10px" colspan="2" height="10">&nbsp;</td></tr><tr><td width="100%"></td></tr></tbody></table>
															</td>
															</tr></tbody></table>
															</td>
														</tr>
														<tr>
															<td style="padding:5px;" height="10">'.$description.'</td>
														</tr>
													</tbody>
												</table></td></tr></tbody></table></td></tr><tr><td style="line-height:14px" height="14">&nbsp;</td></tr></tbody></table></td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
							</tr>						<tr>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															<td>
																<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="line-height:2px" colspan="3" height="2">&nbsp;</td></tr><tr><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:1px solid #026A9E;background:#008ED5;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index/'.$en_discussion_post_id.'/0" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">View on HousingMatters</span></font></center></a></td></tr></tbody></table></a></td><td style="display:block;width:10px" width="10">&nbsp;&nbsp;&nbsp;</td><td><a href="#" style="color:#3b5998;text-decoration:none" target="_blank"><table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #c9ccd1;background:#f6f7f8;padding:7px 16px 11px 16px"><a href="'.$ip.$this->webroot.'Discussions/index/'.$en_discussion_post_id.'/0" style="color:#3b5998;text-decoration:none;display:block" target="_blank"><center><font size="3"><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#525252;font-size:14px;line-height:14px">Comment</span></font></center></a></td></tr></tbody></table></a></td><td width="100%"></td></tr><tr><td style="line-height:32px" colspan="3" height="32">&nbsp;</td></tr></tbody></table>
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
														</tr>
														
														
												<tr>
															<td  width="15">&nbsp;&nbsp;&nbsp;</td>
													<td>
													<table style="border-collapse:collapse" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															
															<tr>
															<td  align="left" valign="middle" width="">
															Thank you <br/>HousingMatters (Support Team)<br/>www.housingmatters.in
															
															</td>
															<td style="display:block;width:15px" width="15">&nbsp;&nbsp;&nbsp;</td>
															
															
															</tr>
															
															</tbody>
													</table>
													</td>
												</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>';
					$this->loadmodel('email');
					$conditions=array('auto_id'=>10);
					$result_email=$this->email->find('all',array('conditions'=>$conditions));
					foreach ($result_email as $collection){
						$from=$collection['email']['from'];
					}
					
	
					$from_name="HousingMatters";
				$subject= 'Discussion: ['. $society_name . ']' .'  -   '.'New Discussion: '.$topic.'';
				$this->send_email($email,$from,$from_name,$subject,$message_web,$reply);
			}
		}
		
		$this->send_notification('<span class="label label-info"><i class=" icon-comments"></i></span>','New Discussion: <b>'.$topic.'</b> by '.$user_name_post,$webroot_path.'Discussions/index',$s_user_id,$users_have_access);
		
		$this->redirect(array('controller' => 'Discussions','action' => 'index'));
	}
}


function delete_comments()
{
$this->layout='blank';
$s_society_id=$this->Session->read('hm_society_id'); 
$con=(int)$this->request->query('con');
$edit=$this->request->query('edit');
$this->set('con',$con);
$this->set('edit',$edit);
if($edit==1){
$this->loadmodel('discussion_comment');
$this->discussion_comment->updateAll(array("delete_id" =>1),array("discussion_comment_id" => $con));

}
}


function delete_topic(){
$this->layout='blank';
$s_society_id=$this->Session->read('hm_society_id'); 
$con=(int)$this->request->query('con');
$this->loadmodel('discussion_post');
$this->discussion_post->updateAll(array("status" =>1),array("discussion_post_id" => $con));

$this->redirect(array('controller' => 'Discussions','action' => 'index'));
}

function archive()
{
	$this->layout='blank';
	$s_society_id=$this->Session->read('hm_society_id'); 
	$con=(int)$this->request->query('con');
	$this->loadmodel('discussion_post');
	$this->discussion_post->updateAll(array("status" =>2),array("discussion_post_id" => $con));
	$this->redirect(array('controller' => 'Discussions','action' => 'index'));
	
}

function discussion_save_comment(){
$this->layout='blank';
$this->ath();
$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id'); 
$tid=(int)$this->request->query('tid');
 $g=$this->request->query('c'); 
$c=htmlentities(wordwrap($g, 25, " ", true));

$c=nl2br($c);

$date=date("d-m-y");
$time=date('h:i:a',time());
	
	$r=$this->content_moderation_society($g);
	
if($r==0)
{
echo $word='You have entered banned words. <br/> ';
exit;
	
}
else
{
	
$this->loadmodel('discussion_comment');
$conditions=array("delete_id"=>0);
$order=array('discussion_comment.discussion_comment_id'=>'DESC');
$cursor_last_color=$this->discussion_comment->find('all',array('conditions'=>$conditions,'order'=>$order,'limit'=>1));
foreach ($cursor_last_color as $collection_color) 
{
$last_color=$collection_color["discussion_comment"]["color"];
}
if(sizeof($cursor_last_color)==0) {  $last_color='blue'; }

	$color_in=$this->rendom_color($last_color);
//////////////////end color///////////////////

$discussion_comment_id=$this->autoincrement('discussion_comment','discussion_comment_id');
$this->loadmodel('discussion_comment');
$multipleRowData = Array( Array("discussion_comment_id" => $discussion_comment_id, "user_id" => $s_user_id , "society_id" => $s_society_id, "comment" => $c,"discussion_post_id" => $tid, "delete_id" =>0, "date" =>$date, "time" => $time, "color" => $color_in));
$this->discussion_comment->saveAll($multipleRowData); 

	
}




////////////////// Modaration content check End ///////////////////////


}

function discussion_comment_refresh(){
$this->layout='blank';
$this->ath();
$s_user_id=$this->Session->read('user_id'); 
$this->set('s_user_id',$s_user_id);
$s_society_id=$this->Session->read('society_id'); 
$t_id=(int)$this->request->query('con');
$this->set('t_id',$t_id);

$this->loadmodel('discussion_comment');
//$conditions=array("discussion_post_id"=>$t_id,"delete_id"=>0);
$conditions =array( '$or' => array( 
array('discussion_post_id' =>$t_id,'delete_id' =>0),array('discussion_post_id' =>$t_id,'delete_id' =>2)));
$order=array('discussion_comment.discussion_comment_id'=>'ASC');
$this->set('result_comment_ref',$this->discussion_comment->find('all',array('conditions'=>$conditions,'order'=>$order)));
}

function discussion_comment_delete_ajax(){
$this->layout='blank';

$s_society_id=$this->Session->read('society_id'); 

$c_id=(int)$this->request->query('c_id');

$this->loadmodel('discussion_comment');
$this->discussion_comment->updateAll(array("delete_id" =>1),array("discussion_comment_id" => $c_id));
//$this->response->header('Location', 'discussion');
}



function discussion_offensive_delete_ajax(){
$this->layout='blank';
$s_society_id=$this->Session->read('society_id'); 
$co_id=(int)$this->request->query('c_id');
$c_u_id=(int)$this->request->query('c_u_id');
$this->loadmodel('discussion_comment');
$conditions=array('discussion_comment_id' => $co_id);
$result= $this->discussion_comment->find('all',array('conditions'=>$conditions));
foreach($result as $data)
{
$r=$data['discussion_comment']['offensive_user'];	
}
if(!empty($r))
{
array_push($r,$c_u_id);
}
else
{
$r=array($c_u_id);
}
$this->loadmodel('discussion_comment');
$this->discussion_comment->updateAll(array("delete_id" =>2,'offensive_user'=>$r),array("discussion_comment_id" => $co_id));

}


function discussion_search_topic(){
$this->layout='blank';
$this->ath();
$s_user_id=$this->Session->read('user_id'); 
$s_society_id=$this->Session->read('society_id');

$tenant=$this->Session->read('tenant');
$role_id=$this->Session->read('role_id');
$wing=$this->Session->read('wing');

$s=$this->request->query('s');
$regex = new MongoRegex("/.*$s.*/i");


$this->loadmodel('discussion_post');
$conditions =array( '$or' => array( 
array('society_id' =>$s_society_id,'delete_id' =>0,'visible' =>1,'topic' =>$regex),
array('society_id' =>$s_society_id,'delete_id' =>0,'visible' =>2,'topic' =>$regex,'sub_visible' =>array('$in' => array($role_id))),
array('society_id' =>$s_society_id,'delete_id' =>0,'visible' =>3,'topic' =>$regex,'sub_visible' =>array('$in' => array($wing))),
array('society_id' =>$s_society_id,'delete_id' =>0,'visible' =>4,'topic' =>$regex),
array('society_id' =>$s_society_id,'delete_id' =>0,'visible' =>5,'topic' =>$regex)
));
$order=array('discussion_post.discussion_post_id'=>'DESC');
$this->set('result_all_topic',$this->discussion_post->find('all',array('conditions'=>$conditions,'order'=>$order))); 

}


}
?>