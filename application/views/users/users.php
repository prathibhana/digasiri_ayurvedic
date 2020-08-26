<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!--
				Empty box
				<div class="box">
				<div class="box-header"></div>
				<div class="box-body"></div>
				<div class="box-footer"></div>
			</div> -->
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">USERS </h3>
					<div class="text-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_user_modal">
							<i class="fa fa-user-plus"></i> Add User
						</button>
					</div>
				</div>
				<div class="box-body">
				<table class="table table-bordered data_tables display pageResize">
					<tr>
						<th>User Name</th>
						<th>Email</th>
						<th>Create Date</th>
						<th>Status</th>
						<th></th>

					</tr>
					<?php foreach ($users as $user) { ?>
						<tr>
							<td><?php echo $user->first_name; ?></td>
							<td><?php echo $user->email; ?></td>
							<td><?php echo $user->create_date; ?></td>
							<td><?php echo $user->status; ?></td>
							<td class="text-center">
								<button type="button" class="btn btn-success btn-sm"
									><i class="fa fa-pencil"></i> </button>
							<button type="button" class="btn btn-danger btn-sm"
							><i class="fa fa-pencil-square"></i></button>
							<?php if($user->status==0){?>
							<form action="<?php base_url();?>users/active_user" method="post"
								  style="display: inline">
							<input type="hidden" name="id" value="<?php echo $user->id;?>"/>
							<button type="submit" class="btn btn-success btn-sm"
									id="user_active"
								><i class="fa fa-check"></i> </button>
							<?php }?>

							</form>
							<form action="<?php base_url();?>users/inactive_user" method="post"
								  style="display: inline">
							<?php if($user->status==1){?>
							<input type="hidden" name="id" value="<?php echo $user->id;?>"/>
							<button type="submit" class="btn btn-danger btn-sm"
									id="user_inactive"
								><i class="fa fa-times"></i> </button>
							<?php }?>
							</form>
							</td>
						</tr>
					<?php } ?>
				</table>
				</div>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>

</section>

<!--add new user modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_user_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h4>New User</h4></div>

			</div>
			<form action="<?php base_url();?>users/add_user" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name"
									   placeholder="First Name" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name"
									   placeholder="Last Name" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Email Address</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email"
									   data-validation="email">
								<p id="email_error" >email already exist!</p>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<div class="text-right">
						<button type="reset" class="btn btn-success" data-toggle="modal" data-target="">Reset</button>
						<button type="submit" class="btn bg-aqua" data-toggle="modal" data-target="">Create</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$('#email_error').hide();
		$('#email').change(function () {
			var email = $(this).val();
			$.ajax({
				type: 'post',
				url: base_url+'users/users/check_email',
				async : false,
				datatype : 'json',
				data : {'email': email},
				success: function (response) {
					if (response){
						$('#email_error').show();
					}
					else {
						$('#email_error').hide();
					}
				}
			})
	});
	})
</script>
