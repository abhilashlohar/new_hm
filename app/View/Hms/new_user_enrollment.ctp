<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div style="background-color: #FFF; ">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>Unit</th>
			<th>Wing</th>
			<th>Unit</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Owner/Tenant</th>
			<th>Committe</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
			<select class=" m-wrap " >
			<option value="" style="display:none;">--Unit--</option>
			<option value="Category 1">Category 1</option>
			</select>
			</td>
			<td>
				
			</td>
			<td>Otto</td>
			<td>1</td>
			<td>Mark</td>
			<td>Otto</td>
			<td>Otto</td>
		</tr>
	</tbody>
</table>

<table id="sample"> 
	<tr>
			<td>
			<select class=" m-wrap " >
			<option value="" style="display:none;">--Unit--</option>
			<option value="Category 1">Category 1</option>
			</select>
			</td>
			<td>
				
			</td>
			<td>Otto</td>
			<td>1</td>
			<td>Mark</td>
			<td>Otto</td>
			<td>Otto</td>
	</tr>
</table>
<button type="button" class="btn" id="add_row"><i class="icon-plus"></i> Add row</button>
</div>
<script>
$(document).ready(function(){
	$("#add_row").on("click",function(){
		var new_line = $("#sample").find('tr:eq(1)').clone();
		alert(new_line);
		$("table").append(new_line);
		$("select").chosen();
	});
})
</script>
