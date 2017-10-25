<!DOCTYPE html>
<html>
	<head>
		<title>Election View</title>
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
								    <li role="presentation" class="active btn-my"><a href="#election" aria-controls="election" role="tab" data-toggle="tab">Election</a></li>
								    <li role="presentation" class="btn-my"><a href="#create" aria-controls="create" role="tab" data-toggle="tab">Create New Members</a></li>
							  	</ul>

							<!-- Tab panes -->
							  	<div class="tab-content">
								    <div role="tabpanel" class="tab-pane active" id="election">
								    	<div class="row mg-top mg-l">
								    		<div class="col-md-2">
								    			<img src=<?=base_url('assets/images/').$voting_table['img_path'];?> class="m-thumb">
								    		</div>
								    		<div class="col-md-9 mg-l">
								    			<div class="row">
								    				<h1 class="text-capitalize"><?=$voting_table['voting_name'];?></h1>
								    			</div>
								    			<div class="row">
								    				<p><?=$voting_table['description'];?>.</p>
								    			</div>
								    		</div>
								    	</div>
								    	<div class="row">
								    		<div class="col-md-offset-10">
								    			<button class="btn btn-xs btn-success" name="electupdate" type="button" data-toggle="modal" data-target="#electModal">Update</button>
								    		</div>
								    	</div>

								    	<div class="row">
								    		<div class="col-md-10 col-md-offset-1 mg-top table-responsive">
									    		<table class="table table-bordered table-hover table-condensed">
									    			<tr>
									    				<th>Sr. No.</th>
									    				<th>Member Name</th>
									    				<th>Description</th>
									    				<th>Update</th>
									    			</tr>
									    			<?php $i = 1;?>
									    			<?php foreach($candidate->result_array() as $value){?>
									    			<tr>
										    			<td><?=$i;?></td>
										    			<td class="text-capitalize"><?=$value['name'];?> </td>
										    			<td><?=$value['description'];?> </td>
										    			<td><button class="btn btn-xs btn-primary" name="memberupdatebtn" type="button" data-toggle="modal" data-target="#memberModal" data-id=<?=$value['id'];?> >Update</button></td>
									    			</tr>
									    			<?php $i++; }?>
									    		</table>
									    	</div>
								    	</div>
								    </div>
						
								    <div role="tabpanel" class="tab-pane" id="create">
								    	<form enctype="multipart/form-data" method="POST" action=<?=base_url('index.php/admin_controller/create_member/'.$voting_table['id']);?>>
									    	
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
									    	<div class="row mg-l" id="row-add"> 
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
			</div><!--Row-->
		</div> <!--Container Close-->

		
<!--Member data update Modal -->
			<div class="modal fade" id="memberModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Member Data Update</h4>
							</div>
							<form enctype="multipart/form-data" method="POST" action="" id="mform">
								<div class="modal-body">
									<div class="row">
									</div>
									<div class="form-group">
										<label class="control-label">Member Name</label>
										<input type="text" name="name" id="mname_id" class="form-control">
									</div>
									<div class="form-group">
										<label class="control-label">Description</label>
										<textarea type="text" class="form-control" id="mdescription_id" name="description"></textarea>
									</div>
									<div class="form-group">
										<label class="control-label">Photo</label>
										<div class="row"><img src="" class="m-thumb mg-l mg-bottom-15"></div>
										<input type="file" class="btn btn-success" name="image">
									</div>
								</div>
							</form><!--Form close-->
								<div class="modal-footer">
									<button class="btn btn-primary" id="msubmit" name="membersubmit">Save</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
<!--Member data update Modal Close-->

<!--Error Modal -->
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
<!--Error Modal Close-->

<!--Election data update Modal -->
			<div class="modal fade" id="electModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Election Data Update</h4>
							</div>
							<form enctype="multipart/form-data" method="POST" action='<?=site_url('admin_controller/update_election/'.$voting_table['id']);?>' >
								<div class="modal-body">
									<div class="row">
									</div>
									<div class="form-group">
										<label class="control-label">Election Name</label>
										<input type="text" name="electname" class="form-control" value="<?=$voting_table['voting_name'];?>" >
									</div>
									<div class="form-group">
										<label class="control-label">Description</label>
										<textarea type="text" class="form-control" name="electdescription"> <?=$voting_table['description'];?> </textarea>
									</div>
									<div class="form-group">
										<label class="control-label">Photo</label>
										<div class="row"><img src="<?=base_url('assets/images/').$voting_table['img_path'];?>" class="m-thumb mg-l mg-bottom-15"></div>
										<input type="file" class="btn btn-success" name="electimage">
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" name="electsubmit">Save</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
<!--Election data update Modal Close-->





<!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('/assets/js/jquery-3.2.1.js');?>"></script>
    <script src="<?=base_url('/assets/js/bootstrap.js');?>"></script>
<!-- Jquery for adding new dynamic inputs for member -->
    <script>

    	$(document).ready(function(){
//associative array for candidates data from php to js array indexed with candidates id
    		var member = [];
    		<?php foreach ($candidate->result_array() as $key => $value) { ?>
    			member[<?=$value['id'];?>] = {'name':'<?=$value['name'];?>', 'description':'<?=$value['description'];?>', 'image':'<?=$value['img_path'];?>', 'vid':<?=$value['vid'];?>};
    		<?php } ?>	
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

//manipulate modal to update member details		
		$('#memberModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  var id = button.data('id');
		  var modal = $(this);
		  modal.find('#mname_id').val(member[id]['name']);
		  modal.find('#mdescription_id').val(member[id]['description']);
		  modal.find('img').attr("src",'<?=base_url('assets/images/');?>' + member[id]['image']);
		  modal.find('#msubmit').attr("data-id", id);
		});

//dynamicaly create uri for submiting form because id and vid is required
		$("#msubmit").click(function(){
		  	var id = $(this).data('id');
			$("#mform").attr("action",'<?=site_url('admin_controller/update_member/'.$voting_table['id'].'/');?>' + id);
			$("#mform").submit();
		});

//show modal if errors encountered
		if( <?=$error_flag;?>)
		{
			$('#infoModal').modal('show');
		}
		
    });
/*Jquery to remove dynamically added member input fields*/
    	$(document).on('click','#remove_btn',function() {
	     $(".mremove:last").remove();
		});
	</script>
	</body>
</html>