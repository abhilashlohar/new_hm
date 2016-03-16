<?php
echo $this->requestAction(array('controller' => 'Hms', 'action' => 'submenu_as_per_role_privilage'));
?>

<form method="post">
	<input type="text" class="m-wrap medium date-picker" data-date-format="dd-mm-yyyy" Placeholder="Opening Balance Date" style="background-color:white !important;" name="date" id="date">
	<br><br>
	<table class="table table-bordered table-condensed " style="background-color:white;">
		<tr>
			<th>Accounts Group</th>
			<th>ledger Name</th>
			<th>Debit</th>
			<th>Credit</th>
			<th>Penalty (debit)</th>
		</tr>

	</table>
	<button type="submit" name="sub" class="btn green" id="submit_opening_balance">Submit</button>
</form>