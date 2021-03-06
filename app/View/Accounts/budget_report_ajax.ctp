<center>
	<div>
		<?php echo $society_name; ?> <br/>
		Budget Report From : 
		<?php echo $from; ?> To : <?php echo $to; ?><br/>
		Budget Created by: <?php echo $created_by; ?> on : <?php echo $created_on; ?>
		<div style="float:right;"> 
			<a target="_blank" href="budget_report_excel/<?php echo $from; ?>/<?php echo $to; ?>" class="btn green mini tooltips add_excel pull-right" data-placement="left" data-original-title="Download in excel"><i class="fa fa-file-excel-o"></i></a>
		</div>
	</div>
</center>
<table class="table table-condensed table-bordered">
			
		<tr>
			<th> Expenditure Head</th>
			<th > <span style="float:right">Budget (Rs) </span> </th>
			<th > <span style="float:right"> Actual (Rs) </span> </th>
			<th > <span style="float:right">Variation (Rs) </span> </th>
			<th > <span style="float:right">Variation %</span> </th>
			<!--<th></th>-->
		</tr>
		<?php 
		$total_budget_amount=0;$total_system_amount=0;$total_actual_amount=0;
		foreach($result_budget as $data){
				$auto_id=$data['budget']['auto_id'];
				$expense_head=$data['budget']['expense_head'];
				$expense_head_id=$data['budget']['expense_head_id'];
				$amount=$data['budget']['amount'];
				$expense_head=$data['budget']['expense_head'];
				
				$from=$data['budget']['from'];
				$to=$data['budget']['to'];
				$total_budget_amount+=$amount;
				$result_ledger=$this->requestAction(array('controller' => 'Accounts', 'action' => 'fetch_ledger_posting_expens_head'), array('pass' => array((int)$expense_head_id,$from,$to)));
				$actual_amount=$result_ledger['closing_balance'][0];
				$variation=$actual_amount-$amount;
				$total_system_amount+=$actual_amount; 
				$total_actual_amount+=$actual_amount-$amount;
				$percentage=$variation/$amount.' %' ;
				
				if($variation>0){
					$color="red";
					
					$variation="+ ".$variation;
				}else{
					$color="green";
					
				}
				if($actual_amount==0){
					$percentage="Unutilized";
					$variation="Unutilized";
				}
			?>
			<tr>
				<td><?php echo $expense_head; ?></td>
				<td><span style="float:right;">  <?php echo $amount; ?> </span> </td>
				<td>
					<span style="float:right;">  <?php echo $actual_amount; ?> </span>
				</td>
				<td>
					<span style="float:right;color:<?php echo $color; ?>">  <?php echo $variation; ?> </span>
				</td>
				<td>
					<span style="float:right;">  <?php echo $percentage; ?>  </span>
				</td>
				
				
				
			</tr>

			<?php  } ?>
			<tfoot>
				<tr>
					<td><span style="float:right;"> <b> Total </b> </span></td>
					<td><span style="float:right;"> <b> <?php echo $total_budget_amount; ?> </b> </span></td>
					<td> <span style="float:right;"> <b> <?php echo $total_system_amount; ?> </b> </span></td>
					<td> <span style="float:right;"> <b> <?php echo $total_actual_amount; ?> </b> </span></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		<br/>