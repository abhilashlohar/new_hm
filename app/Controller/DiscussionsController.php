<?php
App::import('Controller', 'Hms');
class DiscussionsController extends HmsController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'Discussions';




function index($id=null,$list=null){
	if($this->RequestHandler->isAjax()){
		$this->layout='blank';
	}else{
		$this->layout='session';
	}
	$this->ath();
	$this->set('id',$id);
	$id=(int)$this->decode($id,'housingmatters');
	$this->set('list',$list);
	
	
	$s_user_id=$this->Session->read('hm_user_id'); 
	$s_society_id=$this->Session->read('hm_society_id');
	


	
	
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
		
		$this->loadmodel('discussion_post');
		$discussion_post_id=$this->autoincrement('discussion_post','discussion_post_id');
		$this->discussion_post->saveAll(Array( Array("discussion_post_id" => $discussion_post_id, "user_id" => $s_user_id , "society_id" => $s_society_id, "topic" => $topic,"description" => $description, "file" =>$file,"delete" =>"no", "date" =>strtotime($date), "time" => $time, "visible" => $send_to, "sub_visible" => $sub_visible))); 
	}
	
	
	
	
	
	
	
	
}

function submit_topic(){
	pr($this->request->form);
	exit;
	
}



function delete_topic(){
$this->layout='blank';
$s_society_id=$this->Session->read('society_id'); 

$con=$this->request->query('con');
$con=(int)$this->decode($con,'housingmatters');

if($con==0) { $this->redirect(array('controller' => 'Discussions','action' => 'index')); }

$this->loadmodel('discussion_post');
$this->discussion_post->updateAll(array("delete_id" =>1),array("discussion_post_id" => $con));

$this->redirect(array('controller' => 'Discussions','action' => 'index/mytopics/1'));
}

function archive()
{
	$this->layout='blank';
	$s_society_id=$this->Session->read('society_id'); 
	$con=(int)$this->request->query('con');
	$con=(int)$this->decode($con,'housingmatters');
	if($con==0) { $this->redirect(array('controller' => 'Discussions','action' => 'index')); }
	$this->loadmodel('discussion_post');
	$this->discussion_post->updateAll(array("delete_id" =>2),array("discussion_post_id" => $con));
	$this->redirect(array('controller' => 'Discussions','action' => 'index/archives/2'));
	
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


 //////////////// Moderation content check start ///////////////////////////
/*
$this->loadmodel('society');
$conditions=array('society_id'=>$s_society_id);
$result1=$this->society->find('all',array('conditions'=>$conditions));
foreach($result1 as $data)
{
  $content=$data['society']['content_moderation'];

}


foreach($c_mod as $c_moda)
{
if(in_array($c_moda,$content))
{
echo $word='You have enter wrong word  <br/> ';
exit;
}
}
*/
//////////////////color///////////////////




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