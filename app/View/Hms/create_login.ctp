<form method="post">          
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Validation States</h4>
</div>
<div class="portlet-body form">

<label style="font-size:14px;">Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="name" id="name"><br>
<span id="nam" style="color:red;"></span>
</div>
<br>



<label style="font-size:14px;">Email<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="email" id="email"><br>
<span id="mail" style="color:red;"></span>
</div>
<br>


<label style="font-size:14px;">Mobile<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="mobile" id="mobile"><br>
<span id="mob" style="color:red;"></span>
</div>
<br>

<label style="font-size:14px;">Password<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" class="m-wrap span4" name="password" id="password"><br>
<span id="pass" style="color:red;"></span>
</div>
<br>


<div class="form-actions">
<button type="submit" class="btn blue" id="submit" name="sub">Submit</button>
<button type="button" class="btn">Cancel</button>
</div>
</div>
</div>
</form>


<script>

$(document).ready(function(){
$("#submit").bind('click',function(){
var ttt = 55;
var name = $("#name").val();
var email = $("#email").val();
var mobile = $("#mobile").val();
var password = $("#password").val();
if(name == "")
{
$("#nam").html('Name is Required');	
ttt = 555;
}
else
{
$("#nam").html('');	
}
if(email == "" && mobile == "")
{
$("#mail").html('Please Fill E-mail or Mobile');	
$("#mob").html('Please Fill E-mail or Mobile');
ttt = 555;
}
else
{

$("#mail").html('');	
$("#mob").html('');	

if(email != "")
{
if(email == '' || email.indexOf('@') == -1 || email.indexOf('.') == -1){
ttt = 555;
$("#mail").html('Email is not Valid');
}
else
{
$("#mail").html('');	
}
}


}
if(password == "")
{
$("#pass").html('Password is Required');
ttt = 555;	
}
else
{
$("#pass").html('');	
}
if(ttt == 555)
{
return false;	
}


});
});

</script>



