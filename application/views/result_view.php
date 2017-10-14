<!DOCTYPE html>
<html>
	<head>
		<title>My Voting Result</title>
		<link rel="stylesheet" href="<?=base_url("assets/css/bootstrap.min.css");?>">
		<link rel="stylesheet" href=<?=base_url("assets/css/bootstrap-theme.css")?>>		
		<link href=<?=base_url("assets/fonts/glyphicons-halflings-regular.ttf");?>>
		<link rel="stylesheet" href=<?=base_url("assets/css/mycss.css");?>>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<img src=<?=base_url("assets/images/banner.jpg");?> class="img-responsive banner">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-1">
					<img src="<?=base_url().'/assets/images/sidebanner.jpg';?>" class="sidebanner img-responsive">
				</div>

				<div class="col-md-10">
					<div class="row">
						<a href="<?=site_url('voting_controller/');?>" class="btn btn-sm btn-primary">Home</a>
					</div>
					<div class="row">
						<div class="col-md-7 col-md-offset-2 result vote-pane mg-top" id="result">
							<div class="row">
								<h1 class="text-center">Result for Voting of <?=$voting_name;?></h1>
							</div>
							<div class="col-md-9 col-md-offset-1">
								<table class="table table-striped table-hover">
									<tr class="success">
										<th>Sr. No.</th>
										<th>Name</th>
										<th>Votes</th>
									</tr>
									<?php $i = 1; 
									foreach ($candidate->result_array() as $value) 
									{?>
									<tr>
										<td><?=$i;?></td>
										<td class="text-capitalize"><?=$value['name'];?></td>
										<td><?=$value['count'];?></td>
									</tr>
									<?php $i++; }?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap Core JavaScript -->
	    <script src="<?=base_url().'/assets/js/jquery-3.2.1.js'?>"></script>
	    <script src="<?=base_url().'/assets/js/bootstrap.js'?>"></script>
	</body>
</html>