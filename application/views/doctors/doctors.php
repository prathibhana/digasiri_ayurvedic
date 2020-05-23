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
							<li class="fa fa-user-plus"> Add Doctor
							</li>
						</button>
					</div>
				</div>
				<div class="box-body"></div>
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
							<td><?php echo $doctor->doc_name; ?></td>
							<td><?php echo $doctor->gender; ?></td>
							<td><?php echo $doctor->doc_spec; ?></td>
							<td><?php echo $doctor->doc_sch_id; ?></td>
							<td><?php echo $doctor->create_date; ?></td>
						</tr>
					<?php } ?>
				</table>
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
								<input type="text" class="form-control" name="doc_name" id="doc_name"
									   placeholder="Name" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Gender</label>
								<input type="text" class="form-control" name="gender" id="gender"
									   placeholder="Gender" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Speciality</label>
								<input type="text" class="form-control" name="doc_spec" id="doc_spec"
									   placeholder="Select Speciality" data-validation="required">
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
