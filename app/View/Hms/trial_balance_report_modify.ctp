
<center>
<h5> <b> All Society Report  </b> </h5>

</center>

<table class="table table-bordered " width="100%">
	<thead>
		<tr>
			<th>Date :  <?php echo $date; ?> </th>
			
			<th style="text-align: center;" colspan="2">Closing Balance</th>
			<th></th>
		</tr>
		<tr>
			<th >Society Name</th>
			<th style="text-align: right;width: 10%;">Debit</th>
			<th style="text-align: right;width: 10%;">Credit</th>
			<th  style="text-align: center;">Status</th>
		</tr>
	</thead>
	<tbody id="table">
	<?php 
	foreach($result_trial_balance as $data){
		$society_name=$data['trial_balance_converted']['society_name'];
		$closing_debit=$data['trial_balance_converted']['closing_debit'];
		$closing_credit=$data['trial_balance_converted']['closing_credit'];
		$date=$data['trial_balance_converted']['date'];
			if($closing_debit==$closing_credit){
				$status="Ok";
			}else{
				$status="Not Ok";
			}
		?>
			<tr>
				<td ><?php echo $society_name; ?> </td>
				<td style="text-align: right;"><?php echo $closing_debit; ?></td>
				<td style="text-align: right;"><?php echo $closing_credit; ?></td>
				<td style="text-align: center;"><?php echo $status; ?></td> 
				
			</tr>
	<?php } ?>			
	</tbody>
</table>