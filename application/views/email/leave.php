<div class="container" style="margin-top:25px;">
	<div class="row col-md-9">
		<div class="panel panel-info">
  			<div class="panel-body">
  				<div class="row">
					<div class="col-md-6 pull-right">
						<h3><?php echo $user['subject']; ?></h3>
						<h4><?php echo date("Y-m-d"); ?></h4>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<p><?php echo $user['message']; ?></p>

						<p class="text-right">Automated Email. Please Don't reply</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
