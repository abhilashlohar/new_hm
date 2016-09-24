<style>
table th{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
table td{
   background-color:#FFF;padding:3px 5px 3px 5px !important;
}
</style>


<?php 

$filename=$society_name.'_balance_sheet_'.$from ;
$filename = str_replace(' ', '_', $filename);
$filename = str_replace(' ', '-', $filename);

header ("Expires: 0");
header ("border: 1");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.ms-excel");
header ("Content-Disposition: attachment; filename=".$filename.".xls");
header ("Content-Description: Generated Report" );

?>

<div align="center">
<span style="font-size: 14px;"><?php echo $society_name; ?></span><br/>
<span >Balance Sheet as at</span>
 <?php echo $from; ?> 
	
</div>
<div class="row-fluid" style="background-color:#FFF;">
<table class="table table-bordered" width="100%"  style="border:none;border:1px solid;">
<tr>

<td style="border-right: 1px solid;">
<table class="table table-bordered table-hover" width="100%" style="border:none;" >
			<thead>
				
				<tr>
					<th width="50%" style="border:none;border-bottom: 1px solid;">LIABILITIES</th>
					<th width="25%" style="border:none;border-bottom: 1px solid;border-right: 1px solid;"><span style="float:right;">Amount(Rs.) </span> </th>
					<th width="25%" style="border:none;border-bottom: 1px solid;"><span style="float:right;">Amount(Rs.) </span> </th>
				</tr>
			</thead>
			<tbody>
			<?php  
			$total_balace_expenditure=0; 
			foreach($result_accounts_group as $data){
				$auto_id=$data['accounts_group']['auto_id'];
				$group_name=$data['accounts_group']['group_name'];
				
				$result_ledger_account=$this->requestAction(array('controller' => 'Accounts', 'action' => 'ledger_account_fetch'),array('pass'=>array($auto_id)));
					$total_ledger_account_expen=0;
					foreach($result_ledger_account as $data1){
					$ledger_account_id=$data1['ledger_account']['auto_id'];
					$ledger_name=$data1['ledger_account']['ledger_name'];
					$balance_sheet_expenditure=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_balance_sheet_credit_new'),array('pass'=>array($from,$ledger_account_id)));
					if(!empty($balance_sheet_expenditure)){
				
				?>
					<tr>
						<td style="border:none;"><?php echo $ledger_name;  ?></td>
						
						<td align="right" style="border:none;border-right: 1px solid;"><span style="float:right;">
						<?php 
						if($balance_sheet_expenditure>0){ echo number_format($balance_sheet_expenditure) ;  }else{
							$plus_sign=$balance_sheet_expenditure;
							echo "(".number_format(abs($plus_sign)).")" ; }
						$total_balace_expenditure+=$balance_sheet_expenditure; $total_ledger_account_expen+=$balance_sheet_expenditure  ?></span></td>
						<td style="border:none;"></td>
					</tr>
				<?php } } if(!empty($total_ledger_account_expen)){ ?>
					
							<tr><td colspan="1" style="border:none;" ><b><?php echo $group_name; ?></b> </td>
							<td style="border:none; border-right: 1px solid; border-top: 1px solid;"></td>
							<td style="border:none;">
							<span style="float:right;"> 
							<?php 
							if($total_ledger_account_expen>0){
							echo number_format($total_ledger_account_expen);
							}else{ echo "(".number_format(abs($total_ledger_account_expen)).")"; }
							?>
							</span></td></tr>
					<?php } } ?>
				
			</tbody>
</table>
</td>




<td style="">
<table class="table table-bordered  table-hover" width="100%" style="border:none;">
			<thead>
				
				<tr>
					<th width="50%" style="border:none;border-bottom: 1px solid;">ASSETS </th>
					<th width="25%" style="border:none;border-bottom: 1px solid;border-right: 1px solid;"><span style="float:right;">Amount(Rs.) </span> </th>
					<th width="25%" style="border:none;border-bottom: 1px solid;"> <span style="float:right;">Amount(Rs.) </span> </th>
				</tr>
			</thead>
		<tbody>
			<?php  
			$total_balace=0; 
			foreach($result_accounts_group1 as $data){
				$auto_id=$data['accounts_group']['auto_id'];
				$group_name=$data['accounts_group']['group_name'];
				
				$result_ledger_account=$this->requestAction(array('controller' => 'Accounts', 'action' => 'ledger_account_fetch'),array('pass'=>array($auto_id)));
				$total_ledger_account=0;
				foreach($result_ledger_account as $data1){
			
					$ledger_account_id=$data1['ledger_account']['auto_id'];
					$ledger_name=$data1['ledger_account']['ledger_name'];
					$balance_sheet_income=$this->requestAction(array('controller' => 'Accounts', 'action' => 'calculate_balance_sheet_debit_new'),array('pass'=>array($from,$ledger_account_id)));
					if(!empty($balance_sheet_income)){ ?>
					<tr>
						<td style="border:none;"><?php echo $ledger_name;  ?></td>
						<td align="right" style="border:none;border-right: 1px solid;"><span style="float:right;"> 
						<?php 
						if($balance_sheet_income>0){ echo number_format($balance_sheet_income) ; }else{
							$plus_sign=$balance_sheet_income;
							echo "(".number_format(abs($plus_sign)).")" ; 
						}
						$total_balace+=$balance_sheet_income;  $total_ledger_account+=$balance_sheet_income; ?></span></td>
						<td style="border:none;"></td>
					</tr>
				<?php } }
				if(!empty($total_ledger_account)){
				?> 
					
					<tr>
					<td colspan="1" style="border:none;"><b><?php echo $group_name; ?> </b> </td>
					<td style="border:none;border-right: 1px solid; border-top: 1px solid;"> </td>
					<td style="border:none;"><span style="float:right;">
					<?php 
					if($total_ledger_account>0){
					echo number_format($total_ledger_account); }else{ echo "(".number_format(abs($total_ledger_account)).")"; }
	
					?> </span></td>
					
					</tr>
			<?php } } ?>
			</tbody>
		</table>

</td>
<?php

$balance_sheet_income_expenditure=$this->requestAction(array('controller' => 'Accounts', 'action' => 'balance_sheet_income_expenditure'),array('pass'=>array($from)));

if($balance_sheet_income_expenditure>0){
	$total_surplus=$balance_sheet_income_expenditure ?>
			<tr>
				<td style="border-right: 1px solid;border-top: 1px solid;">
				
					<table width="100%" style="border:none;">
					<tr>
					<td colspan="2" width="75%" style="border:none;border-right: 1px solid;"> <span ><b>Surplus in income over expenditure</b></span>  </td>
					<td align="right"> <span style="float:right;"> <?php echo number_format($total_surplus); $total_balace_expenditure+=$total_surplus; ?></span> </td>
					
					</tr>
					
					</table>

				</td> 
				<td style="border-top:1px solid;"></td> 
			</tr>	
	<?php } else{
				$total_surplus=$balance_sheet_income_expenditure;?>
			<tr>
			
				<td style="border-right: 1px solid;border-top: 1px solid;">
				
				
				<table width="100%" style="border:none;">
					<tr>
					<td colspan="2" width="75%" style="border:none;border-right: 1px solid;"> <span ><b>Surplus in expenditure over income </b></span>   </td>
					<td align="right"> <span style="float:right;"> <?php echo number_format($total_surplus); $total_balace_expenditure+=$total_surplus; ?></span>
					</td>
					
					</tr>
					
				</table>
						
				</td> 
				<td style="border-top:1px solid;"></td> 
			</tr>	<?php }  ?>


<tr>
<td style="border-right: 1px solid;border-top: 1px solid;">

			<table width="100%" style="border:none;">
					<tr>
					<td colspan="2" width="75%" style="border:none;border-right: 1px solid;"><b style="float:left;">Total</b>  </td>
					<td align="right"> <span style="float:right;"><?php echo number_format($total_balace_expenditure); ?></span>
					</td>
					
					</tr>
				
			</table>


  </td>
<td style="border-top: 1px solid;"> 

			<table width="100%" style="border:none;">
					<tr>
					<td colspan="2" width="75%" style="border:none;border-right: 1px solid;"><b style="float:left;">Total</b>  </td>
					<td align="right">  <span style="float:right;"><?php echo number_format($total_balace); ?> </span>

					</td>
					
					</tr>
				
			</table>

 </td>
</tr>
</table>		
</div>