<!DOCTYPE html>
<html>
	<head>
		<title>My Voting</title>
		<link rel="stylesheet" href=<?=base_url("assets/css/bootstrap.min.css");?>>
		<link rel="stylesheet" href=<?=base_url("assets/css/bootstrap-theme.css")?>>		
		<link href=<?=base_url("assets/fonts/glyphicons-halflings-regular.ttf");?>>
		<link rel="stylesheet" href=<?=base_url("assets/css/mycss.css");?>>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<img src="<?=base_url('/assets/images/banner.jpg');?>" class="img-responsive banner">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-1">
					<img src="<?=base_url('/assets/images/sidebanner.jpg');?>" class="sidebanner img-responsive">
				</div>

				<div class="col-md-10">
					<div class="row">
						<div class="col-md-10">
							 <!-- Nav tabs -->
							  <ul class="nav nav-tabs nav-pills" role="tablist">
							    <li role="presentation" class="active btn-my"><a href="#votings" aria-controls="votings" role="tab" data-toggle="tab">Votings</a></li>
							    <li role="presentation" class="btn-my"><a href="#result" aria-controls="result" role="tab" data-toggle="tab">Results</a></li>
							    <li role="presentation"></li>
							    <button class="btn btn-primary btn-size col-md-offset-8" name="login" type="button" data-toggle="modal" data-target="#myModal">Admin Login</button>
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="votings">
							    	<div class="row">
							    	<?php foreach ($voting_name->result_array() as $value) {?>	
									  	<div class="col-sm-6 col-md-3  mg-top">
									  		<a href="<?=site_url('voting_controller/voting_home/'.$value['id']);?>" class="tab-link">
											    <div class="thumbnail">
											      <img src=<?=base_url('assets/images/'.$value['img_path']);?>>
											      <div class="caption text-center">
											        <h3 class="text-capitalize"><?=$value['voting_name'];?></h3>
											        <p><?=$value['description'];?></p>
											      </div>
											    </div>
									    	</a>
									  	</div>
									<?php }?>
									</div>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="result">
							    	<div class="row">
							    	<?php foreach ($voting_name->result_array() as $value) {?>	
									  	<div class="col-sm-6 col-md-3  mg-top">
										  	<a href="<?=site_url('voting_controller/result/'.$value['id'].'/'.$value['voting_name']);?>" class="tab-link">
											    <div class="thumbnail">
											      <img src=<?=base_url('assets/images/'.$value['img_path']);?>>
											      <div class="caption text-center">
											        <h3 class="text-capitalize"><?=$value['voting_name'];?></h3>
											        <p><?=$value['description'];?></p>
											      </div>
											    </div>
									    	</a>
									  	</div>
									<?php }?>
									</div>
							    </div>
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

<!--Admin Login panel-->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span area-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-center" id="myModalLabel">Admin Login</h4>
					</div>
					<div class="modal-body">
						<div class="form-horizontal">
							<div class="text-center">
							<label class="label-danger text-center"><?=validation_errors();?></label>
							</div>
							<?=form_open('voting_controller/login');?>
							<div class="form-group">
								<label class="control-label col-md-4">Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="submit" name="login" value="Login" class="btn btn-primary">
							</div>
							<?=form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- Bootstrap Core JavaScript -->
	    <script src="<?=base_url('/assets/js/jquery-3.2.1.js');?>"></script>
	    <script src="<?=base_url('/assets/js/bootstrap.js');?>"></script>
	    <script> <?php if ($error_msg==TRUE): ?>
	    	$('#myModal').modal('show');
	    	
	    <?php endif ?></script>
	</body>
</html>