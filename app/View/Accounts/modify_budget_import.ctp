<?php 
$status=$result_budget_import[0]['budget_import']['status'];
$from=$result_budget_import[0]['budget_import']['from'];
$to=$result_budget_import[0]['budget_import']['to'];

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
	<th> Expense Head</th>
	<th> Amount </th>
	<th> Action </th>
</tr>
<?php 

foreach($result_budget as $data){
	$auto_id=$data['budget']['auto_id'];
	$expense_head=$data['budget']['expense_head'];
	$expense_head_id=$data['budget']['expense_head_id'];
	$amount=$data['budget']['amount'];
	$expense_head=$data['budget']['expense_head'];
	

	?>
	<tr>
		<td><?php echo $expense_head; ?></td>
		<td> <input type="text" field_name="amount" status="<?php echo $status; ?>" amount_id="<?php echo $auto_id; ?>" class="span4 m-wrap amount" maxlength="10" value="<?php echo $amount; ?>"> </td>
		<td>
			<a style="" role="button" delete="<?php echo $auto_id; ?>" class="btn mini  remove_row" href="#"><i class="icon-trash"></i></a>
		</td>
	</tr>

	<?php  } ?>
</table>
<?php } ?>
<br/>
<div>
<button class=" btn blue">Save </button>
<button class="btn red">Delete all</button>
</div>


<script>
$(document).ready(function() {
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
				}, 1000);
		});
	});
	
});
</script>

