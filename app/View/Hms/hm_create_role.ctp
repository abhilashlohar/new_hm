<form method="post">
<div class="portlet box blue">
<div class="portlet-title">
<h4 class="block">Create Role</h4>
</div>
<div class="portlet-body form">
<div class="row-fluid">
<div class="span6">

<label style="font-size:14px;">Role Name<span style="color:red;">*</span></label>
<div class="controls">
<input type="text" name="role" id="role" class="m-wrap span9"><br>
<span id="rol" style="color:red; margin-left:5px;"></span>
</div>

</div>
<div class="span6">
<table class="table table-bordered table-stripped ">
<tr>
<th> #</th>
<th>Role Name</th>
</tr>
</table>
</div>
</div>
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

var role = $("#role").val();
if(role == "")
{
$("#rol").html('Role Name is Required');
return false;	
}
else
{
$("#rol").html('');	
}
});
});
</script>




             