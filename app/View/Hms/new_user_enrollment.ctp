<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div style="background-color: #FFF; ">
<form method="post" id="contact-form">
<table class="table table-condensed table-bordered" id="main">
	<thead>
		<tr>
			<th>Unit</th>
			<th>Owner/Tenant</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Committe</th>
			<th>Remove</th>
		</tr>
	</thead>
	<tbody>
		
	</tbody>
</table>
<button type="submit">Submit</button>
</form>
<table id="sample" style="display:none;"> 
	<tr>
			<td>
			<select class="m-wrap" name="unit[]">
			<option value="" style="display:none;">--Unit--</option>
			<?php foreach($wings as $wing): 
				$wing_id=$wing["wing"]["wing_id"];
				$wing_name=$wing["wing"]["wing_name"];
				$flats= $this->requestAction(array('controller' => 'Fns', 'action' => 'all_flats_of_wing_id'),array('pass'=>array($wing_id)));
				foreach($flats as $flat):
					$flat_id=$flat["flat"]["flat_id"];
					$flat_name=$flat["flat"]["flat_name"];?>
					<option value="<?php echo $flat_id; ?>"><?php echo $wing_name.'-'.$flat_name; ?></option>
					<?php endforeach; ?>
			<?php endforeach; ?>
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
	var new_line = $("table[id=sample]").find('tr:eq(0)').clone();
	$("table[id=main]").append(new_line);
	$("table[id=main] tr:last").find("select").chosen();
	$("#add_row").on("click",function(){
		var new_line = $("table[id=sample]").find('tr:eq(0)').clone();
		$("table[id=main]").append(new_line);
		$("table[id=main] tr:last").find("select").chosen();
	});
})
</script>