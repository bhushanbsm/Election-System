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
						<div class="col-md-10 admin">
							<div class="row">
								<h4 class="text-center">Welcome Admin</h4>
							</div>
							<div class="row">
							<!-- Nav tabs -->
							  	<ul class="nav nav-tabs nav-pills" role="tablist">
								    <li role="presentation" class="active btn-my"><a href="#election" aria-controls="election" role="tab" data-toggle="tab">Elections</a></li>
								    <li role="presentation" class="btn-my"><a href="#create" aria-controls="create" role="tab" data-toggle="tab">Create New</a></li>
									<li role="presentation" class="btn-my"><a href="<?=site_url();?>">Log Out</a></li>							  	
							  	</ul>

							<!-- Tab panes -->
							  	<div class="tab-content">
								    <div role="tabpanel" class="tab-pane active" id="election">
								    	<div class="row">
								    		<div class="col-md-10 col-md-offset-1 mg-top table-responsive">
									    		<table class="table table-bordered table-hover table-condensed">
									    			<tr>
									    				<th>Sr. No.</th>
									    				<th>Election Name</th>
									    				<th>View</th>
									    			</tr>
									    			<?php $i = 1;?>
									    			<?php foreach($voting_name->result_array() as $value){ ?>
									    			<tr>
									    			<td> <?=$i;?> </td>
									    			<td> <?=$value['voting_name'];?> </td>
									    			<td><a href=<?=site_url('admin_controller/election_view/'.$value['id']);?> class="btn btn-xs btn-primary">View</a></td>
									    			</tr>
									    			<?php $i++; }?>
									    		</table>
									    	</div>
								    	</div>
								    </div>
						
								    <div role="tabpanel" class="tab-pane" id="create">
								    	<form enctype="multipart/form-data" method="POST" action=<?=site_url('admin_controller/create_election');?>>
									    	<div class="row">
									    		<div class="col-md-offset-5">
									    			
												</div>
							
									    		<div class="col-md-12 mg-top">
									    			<div class="row">
									    				<div class="col-md-3 col-md-offset-1">
									    					<label class="control-label">Election Name</label>
									    					<input type="text" name="ename" class="form-control" placeholder="Election Name" required>
									    				</div>
									    				
									    				<div class="col-md-4">
									    					<label class="control-label">Description</label>
									    					<textarea name="edescription" class="form-control" rows="1" placeholder="Description" required></textarea>
									    				</div>
									    				<div class="col-md-4">
									    					<label class="control-label">Photo</label>
									    					<input type="file" name="eimage" class="btn btn-success" required="">
									    				</div>
									    			</div>
									    		</div>
									    	</div>

									    	<div class="line mg-top"></div>
									    	
									    	<div class="row mg-top">
									    		<div class="col-md-3 col-md-offset-1">
									    			<label class="control-label">Membar Name</label>
									    		</div>
									    		<div class="col-md-4">
									    			<label class="control-label">Description</label>
									    		</div>
									    		<div class="col-md-4">
									    			<label class="control-label">Photo</label>
									    		</div>
									    	</div>
									    	
									    	
									    	<div class="mtop">
										    	<div class="row">
										    		<div class="col-md-3 col-md-offset-1">
										    			<input type="text" name="mname[]" placeholder="Membar Name" class="form-control" required>
										    		</div>
										    		<div class="col-md-4">
										    			<textarea name="mdescription[]" rows="1" class="form-control" placeholder="Description" required></textarea>
										    		</div>
										    		<div class="col-md-4">
										    			<input type="file" name="mimage_0" class="btn btn-success" required>
										    		</div>
										    	</div>
									    	</div>
									    	<div class="row" id="row-add"> 
									    		<a name="add_more" id="add_more" class="col-md-offset-1 btn btn-primary">Add More</a>
									    		<a name="remove" id="remove_btn" class="btn btn-primary">Remove</a>
									    	</div>
									    	<div class="row mg-top">
									    		<div class="col-md-2 col-md-offset-5">
									    			<button type="submit" name="submit" class="btn btn-primary" value="submit">Create</button>
									    		</div>
									    	</div>
								    	</form>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


				<div class="modal fade" id="infoModal">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Information</h4>
							</div>
							<div class="modal-body">
								<p>
									<?=$error_msg;?>
									<?=validation_errors();?>
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

		</div>


<!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('/assets/js/jquery-3.2.1.js');?>"></script>
    <script src="<?=base_url('/assets/js/bootstrap.js');?>"></script>
    <script>
    	$(document).ready(function(){
    	$i=1;
    	$('#add_more').click(function () {
    		$em1= '<div class="mremove">'+'<div class="row mg-top">'+'<div class="col-md-3 col-md-offset-1">'+
					'<input type="text" name="mname[]" placeholder="Membar Name" class="form-control">'+
					'</div>'+
					'<div class="col-md-4">'+
					'<textarea name="mdescription[]" rows="1" class="form-control" placeholder="Description"></textarea></div>'+
					'<div class="col-md-4"><input type="file" name="mimage_'+$i+'" class="btn btn-success"></div></div></div>';
			$i++;
    		$('#row-add').before($em1);
		});

    });
    	$(document).on('click','#remove_btn',function() {
	     $(".mremove:last").remove();
		});
	</script>


	
	<script>
    	<?php if ($error_flag == TRUE){ ?>
    		$('#infoModal').modal('show');
    	<?php } ?>
    </script>
	</body>
</html>