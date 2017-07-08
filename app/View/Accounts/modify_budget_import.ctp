<?php 
$status=$result_budget_import[0]['budget_import']['status'];
$from=$result_budget_import[0]['budget_import']['from'];
$to=$result_budget_import[0]['budget_import']['to'];
$budget_id=$result_budget_import[0]['budget_import']['auto_id'];
?>
<center>
	<h5> 
		<strong>
			<?php echo $result_society[0]['society']['society_name']; ?><br/>
		 Budget Upload <?php echo date("d-m-Y",$from).' to '.date("d-m-Y",$to) ?>
		 </strong> 
	 </h5> 
</center>

<?php
if($status=="yearly"){ ?>

		<table class="table table-condensed table-bordered">
			<tr>
				<td>
					<input type="text" class="date-picker date_change" field_name="from" value="<?php echo date("d-m-Y",$from) ; ?>" budget_id="<?php echo $budget_id; ?>" data-date-format="dd-mm-yyyy" placeholder="From" >
				
					<input type="text" class="date-picker date_change" field_name="to" value="<?php echo date("d-m-Y",$to) ; ?>" budget_id="<?php echo $budget_id; ?>" data-date-format="dd-mm-yyyy" placeholder="To">
				</td>
			</tr>
		<tr>
			<th> Expense Head</th>
			<th > <span style="float:right">Amount </span> </th>
			<th> Action </th>
		</tr>
		<?php 
		$total=0;
		foreach($result_budget as $data){
			$auto_id=$data['budget']['auto_id'];
			$expense_head=$data['budget']['expense_head'];
			$expense_head_id=$data['budget']['expense_head_id'];
			$amount=$data['budget']['amount'];
			$expense_head=$data['budget']['expense_head'];
			$total+=$amount;

			?>
			<tr>
				<td><?php echo $expense_head; ?></td>
				<td> <input type="text" field_name="amount" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span4 m-wrap amount" maxlength="10" value="<?php echo $amount; ?>" style="text-align:right;float:right;"> </td>
				<td>
					<a style="" role="button" delete="<?php echo $auto_id; ?>" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a>
				</td>
			</tr>

			<?php  } ?>
			<tfoot>
				<tr>
					<td><span style="float:right;"> <b> Total </b> </span></td>
					<td><input type="text" value="<?php echo $total; ?>" style="text-align:right;float:right;" readonly class="span4 m-wrap total"> </td>
					<td></td>
				</tr>
			</tfoot>
		</table>
<?php }elseif($status=="month"){ ?>

			<table class="table table-condensed table-bordered" style="overflow:auto;">
			<tr>
				<th> Expense Head</th>
				<th> April </th>
				<th> May </th>
				<th> June </th>
				<th> July </th>
				<th> August </th>
				<th> September </th>
				<th> October </th>
				<th> November </th>
				<th> December </th>
				<th> January </th>
				<th> February </th>
				<th> March </th>
				<th> Action </th>
			</tr>
			<?php 

			foreach($result_budget as $data){
					$auto_id=$data['budget']['auto_id'];
					$expense_head=$data['budget']['expense_head'];
					$expense_head_id=$data['budget']['expense_head_id'];
					$April=$data['budget']['April'];
					$May=$data['budget']['May'];
					$June=$data['budget']['June'];
					$July=$data['budget']['July'];
					$August=$data['budget']['August'];
					$September=$data['budget']['September'];
					$October=$data['budget']['October'];
					$November=$data['budget']['November'];
					$December=$data['budget']['December'];
					$January=$data['budget']['January'];
					$February=$data['budget']['February'];
					$March=$data['budget']['March'];
				?>
				<tr>
					<td>
						<?php echo $expense_head; ?>
					</td>
					<td> 
						<input type="text" field_name="April" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $April; ?>">
					</td> 
					<td> 
						<input type="text" field_name="May" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $May; ?>">
					</td> 
					<td> 
						<input type="text" field_name="June" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $June; ?>">
					</td> 
					<td> 
						<input type="text" field_name="July" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $July; ?>">
					</td> 
					<td> 
						<input type="text" field_name="August" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $August; ?>">
					</td> 
					<td> 
						<input type="text" field_name="September" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $September; ?>">
					</td> 
					<td> 
						<input type="text" field_name="October" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $October; ?>">
					</td> 
					<td> 
						<input type="text" field_name="November" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $November; ?>">
					</td> 
					<td> 
						<input type="text" field_name="December" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $December; ?>">
					</td> 
					<td> 
						<input type="text" field_name="January" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $January; ?>">
					</td> 
					<td> 
						<input type="text" field_name="February" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $February; ?>">
					</td> 
					<td> 
						<input type="text" field_name="March" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span12 m-wrap amount" maxlength="10" value="<?php echo $March; ?>">
					</td> 
					
					
					<td>
						<a style="" role="button" delete="<?php echo $auto_id; ?>" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a>
					</td>
				</tr>

				<?php  } ?>
			</table>





<?php } ?>
<br/>
<div>
<button class=" btn blue save" save_id="<?php echo $budget_id; ?>">Submit </button>
<button class="btn red delete_all" delete_id="<?php echo $budget_id; ?>">Reset</button>
</div>


<script>
$(document).ready(function() {
	
	
$('.date_change').on("change",function(){ 
	var date=$(this).val();
	var field_name=$(this).attr('field_name');
	var budget_id=$(this).attr('budget_id');
	$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/budget_update_date/"+budget_id+"/"+field_name+"/"+date,
			dataType: 'json'
		}).done(function(response){
			
		});
	
});	
	
	function total_count(){
		var Total=0;
		$('.amount').each(function(){
			var total=$(this).val();
			Total+=Number(total);
		});
		$('.total').val(Total);
	}
	
	
	
	$('.amount').on("keyup blur",function(){ 
		var amount=$(this).val();
		var id=$(this).attr("amount_id");
		var status=$(this).attr("status");
		var field_name=$(this).attr("field_name");
		//var url="budget_update_data/"+id+"/"+status+"/"+field_name+"/"+amount;
		 
		$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/budget_update_data/"+id+"/"+status+"/"+field_name+"/"+amount,
			dataType: 'json'
		}).done(function(response){
			//alert(response);
			
		});
		total_count();
	});

	
	$('.remove_row').on("click",function(){ 
		var current=$(this);
		var del=$(this).attr("delete");
		$.ajax({
			url: "<?php echo $webroot_path; ?>Accounts/budget_delete_data/"+del,
			//dataType: 'json'
		}).done(function(response){
		    	current.closest("tr").addClass('animated zoomOut');
				setTimeout(function() {
					current.closest("tr").remove();
							total_count();
				}, 1000);
		});
		
	});
	
	$('.delete_all').on("click",function(){ 
		var current=$(this);
		var del=$(this).attr("delete_id");

			$.ajax({
				url: "<?php echo $webroot_path; ?>Accounts/budget_deleteall_data/"+del,
				//dataType: 'json'
			}).done(function(response){
				
				window.location.href="<?php echo $webroot_path; ?>Accounts/budget_import";
			});
	});
	
	
	$('.save').on("click",function(){ 
		var current=$(this);
		var id=$(this).attr("save_id");
		 
			$.ajax({
				url: "<?php echo $webroot_path; ?>Accounts/budget_save_data/"+del,
				//dataType: 'json'
			}).done(function(response){
				
				window.location.href="<?php echo $webroot_path; ?>Accounts/budget_import";
			}); 
	});
	
	
	
});
</script>


