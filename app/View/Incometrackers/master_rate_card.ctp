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
			<?php foreach($income_heads as $income_head):?>
			<th><?php echo $income_head; ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
	<?php foreach($flat_type_ids as $flat_type_id):?>
		<tr>
			<td><?php echo $flat_type_id; ?></td>
			<td>Mark</td>
			<td>Otto</td>
			<td class="hidden-phone">makr124</td>
			<td><span class="label label-success">Approved</span></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>