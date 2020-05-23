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
					<h3 class="box-title">PATIENTS </h3>
					<div class="text-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_patient_modal">
							<li class="fa fa-user-plus"> Add New Patient
							</li>
						</button>
					</div>
				</div>
				<div class="box-body"></div>
				<table class="table table-bordered">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Gender</th>
						<th>Date of Birth</th>
						<th>Age</th>
						<th>NIC NO</th>
						<th>Telephone NO</th>
						<th>Address</th>
						<th>Create Date</th>
					</tr>
					<?php foreach ($patients as $patient) { ?>
						<tr>
							<td><?php echo $patient->pat_fname; ?></td>
							<td><?php echo $patient->pat_lname; ?></td>
							<td><?php echo $patient->pat_gender; ?></td>
							<td><?php echo $patient->pat_dob; ?></td>
							<td><?php echo "age"; ?></td>
							<td><?php echo $patient->pat_nic; ?></td>
							<td><?php echo $patient->pat_tele_no; ?></td>
							<td><?php echo $patient->pat_address; ?></td>
							<td><?php echo $patient->create_date; ?></td>
						</tr>
					<?php } ?>
				</table>
				<div class="box-footer"></div>
			</div>
		</div>
	</div>

</section>

<!--add new user modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_patient_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h4>New Patient</h4></div>

			</div>
			<form action="<?php base_url();?>patients/add_patient" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" name="pat_fname" id="pat_fname"
									   placeholder="First Name" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="pat_lname" id="pat_lname"
									   placeholder="Last Name" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Gender</label>
								<input type="text" class="form-control" name="pat_gender" id="pat_gender"
									   placeholder="Gender" data-validation="required">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Date of Birth</label>
								<input type="date" class="form-control" name="pat_dob" id="pat_dob"
									   placeholder="dob" data-validation="required">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NIC NO</label>
								<input type="text" class="form-control" name="pat_nic" id="pat_nic"
									   placeholder="NIC NO" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Address</label>
								<input type="text" class="form-control" name="pat_address" id="pat_address"
									   placeholder="Enter Address" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Telephone NO</label>
								<input type="text" class="form-control" name="pat_tele_no" id="pat_tele_no"
									   placeholder="Telephone Number" data-validation="required">
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
