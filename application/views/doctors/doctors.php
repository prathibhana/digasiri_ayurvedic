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
					<h3 class="box-title">DOCTORS </h3>
					<div class="text-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_doctor_modal">
							<i class="fa fa-user-plus"></i> Add Doctor
						</button>
					</div>
				</div>
				<div class="box-body">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Gender</th>
						<th>Speciality</th>
						<th>Schedule</th>
						<th>Create Date</th>
					</tr>
					<?php foreach ($doctors as $doctor) { ?>
						<tr>
							<td><?php echo $doctor->name; ?></td>
							<td><?php echo $doctor->gender; ?></td>
							<td><?php echo $doctor->speciality; ?></td>
							<td><?php echo $doctor->schedule_id; ?></td>
							<td><?php echo $doctor->create_date; ?></td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="add_doctor_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h4>New Doctor</h4></div>

			</div>
			<form action="<?php base_url();?>doctors/add_doctor" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" id="name"
									   placeholder="Name" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="gender" id="gender"
									   placeholder="Gender" data-validation="required">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Speciality</label>
								<select class="form-control" name="speciality" id="speciality"
									   placeholder="Select Speciality" data-validation="required">
									<option value="spec 1">spec1</option>
									<option value="spec 2">spec2</option>
								</select>
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
