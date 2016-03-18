<div style="background-color: rgb(255, 255, 255); padding: 0px 20px;">
<table cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
		<td><span style="font-size: 16px; font-weight: bold; color: rgb(83, 81, 81);"><i class="icon-book"></i> Resident Directory</span></td>
		<td align="right">
			<div class="input-append ">  
			   <input class="m-wrap medium" size="10" placeholder="Search" id="search" type="text"><button class="btn red ser">Search</button>
			</div>
		</td>
	</tr>
</tbody></table>
</div>
<style>
.r_d{
width:32%; float:left; padding:5px;
}

@media (min-width: 650px) and (max-width: 1200px){
.r_d{
width:46%;float:left; padding:5px;
}
}

@media (max-width: 650px) {
.r_d{
width:100%; float:left; padding:5px;
}
}

.hv_b:hover{
background-color:rgb(218, 236, 240);
}
</style>
<?php foreach($arranged_users as $user_info){ ?>
	
<?php } ?>

<div class="row-fluid">
	<div class="responsive span3" data-tablet="span6" data-desktop="span3">
		<div class="dashboard-stat blue">
			<div class="visual">
				<i class="icon-comments"></i>
			</div>
			<div class="details">
				<div class="number">
					1349
				</div>
				<div class="desc">									
					New Feedbacks
				</div>
			</div>
			<a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>						
		</div>
	</div>
	<div class="responsive span3" data-tablet="span6" data-desktop="span3">
		<div class="dashboard-stat green">
			<div class="visual">
				<i class="icon-shopping-cart"></i>
			</div>
			<div class="details">
				<div class="number">549</div>
				<div class="desc">New Orders</div>
			</div>
			<a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>						
		</div>
	</div>
	<div class="responsive span3" data-tablet="span6  fix-offset" data-desktop="span3">
		<div class="dashboard-stat purple">
			<div class="visual">
				<i class="icon-globe"></i>
			</div>
			<div class="details">
				<div class="number">+89%</div>
				<div class="desc">Brand Popularity</div>
			</div>
			<a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>						
		</div>
	</div>
	<div class="responsive span3" data-tablet="span6" data-desktop="span3">
		<div class="dashboard-stat yellow">
			<div class="visual">
				<i class="icon-bar-chart"></i>
			</div>
			<div class="details">
				<div class="number">12,5M$</div>
				<div class="desc">Total Profit</div>
			</div>
			<a class="more" href="#">
			View more <i class="m-icon-swapright m-icon-white"></i>
			</a>						
		</div>
	</div>
</div>