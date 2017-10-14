<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Welcome To Voting Panel</title>
		
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
					<img src="<?=base_url().'/assets/images/banner.jpg';?>" class="img-responsive banner">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-1">
					<img src="<?=base_url().'/assets/images/sidebanner.jpg';?>" class="sidebanner img-responsive">
				</div>

				<div class="col-md-10">
					<div class="row">
						<div class="row">
						<a href="<?=site_url('voting_controller/');?>" class="btn btn-sm btn-primary">Home</a>
					</div>
						<div class="col-md-offset-1 col-md-9 vote-pane mg-top">
			 				<div class="col-md-9 col-md-offset-2">
								<h1 class="text-center">Welcome to Voting Panel</h1>
							</div>

<!--Voting Form-->			
							<div class="form-horizontal">
								<div class="row">
									<div class="form_group text-center has-error">
										<label class="bg-danger">
				<!--will show errors of validation on aadhar no-->
											<?=validation_errors();?>
				<!--will show msg of voting either success or failer-->
											<?=$result;?>
											<?=form_open('voting_controller/voting/'.$id);?>
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 col-md-offset-3 control-label">Enter Aadhar Card No.</label>
									<div class="form-group col-md-3">
										<input type="text" name="aadharno" class="form-control" required autofocus>
									</div>
								</div>
<!--print list of condidates standing for election-->
								<?php
									foreach ($candidate->result_array() as $value) {
								?>
								<div class="form-group">
									<div class="radio col-md-offset-6 col-md-3">
										<div class="btn btn-group">
										<label class="btn btn-success text-capitalize">
											<input required type="radio" name="radiobutton" value=<?=$value['name'];?>><?=$value['name'];?>
										</label>
										</div>
									</div>
								</div>
					
								<?php }	?>
								<div class="form-group">
					    			<div class="col-md-offset-4 col-md-5">
					      				<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Vote</button>
					    			</div>
				  				</div>
							</div>
						</div>		
						<?=form_close();?>
					</div>
				</div>
			</div>
		</div>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url().'/assets/js/jquery-3.2.1.js'?>"></script>
    <script src="<?=base_url().'/assets/js/bootstrap.js'?>"></script>	
	</body>
</html>