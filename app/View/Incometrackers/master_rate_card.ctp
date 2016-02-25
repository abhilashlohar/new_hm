<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>
<div>
<a href="<?php echo $webroot_path; ?>Incometrackers/select_income_heads" class="btn" rel='tab'>Selection of Income Heads</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_rate_card" class="btn yellow" style="font-size:16px;" rel='tab'>Rate Card</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/master_noc" class="btn" style="font-size:16px;" rel='tab'>Non Occupancy Charges</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_penalty" class="btn" style="font-size:16px;" rel='tab'>Penalty Option</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/neft_add" class="btn" style="font-size:16px;" rel='tab'>Add NEFT</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/it_setup" class="btn" style="font-size:16px;" rel='tab'>Remarks</a>
<a href="<?php echo $webroot_path; ?>Incometrackers/other_charges" class="btn" rel='tab'>Other Charges</a>
</div>

<div style="background-color: rgb(255, 255, 255);padding: 5px;">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th>Flat type</th>
			<th>First Name</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Mark</td>
			<td>Otto</td>
			<td class="hidden-phone">makr124</td>
			<td><span class="label label-success">Approved</span></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Jacob</td>
			<td>Nilson</td>
			<td class="hidden-phone">jac123</td>
			<td><span class="label label-info">Pending</span></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Larry</td>
			<td>Cooper</td>
			<td class="hidden-phone">lar</td>
			<td><span class="label label-warning">Suspended</span></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Sandy</td>
			<td>Lim</td>
			<td class="hidden-phone">sanlim</td>
			<td><span class="label label-danger">Blocked</span></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Sandy</td>
			<td>Lim</td>
			<td class="hidden-phone">sanlim</td>
			<td><span class="label label-danger">Blocked</span></td>
		</tr>
	</tbody>
</table>
</div>