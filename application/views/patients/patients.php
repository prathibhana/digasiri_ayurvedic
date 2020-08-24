<?php if($this->session->flashdata('alert')) { ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.notify({
						message: '<?php echo $this->session->flashdata('alert')['massage']?>'
					},
					{
						type: '<?php echo $this->session->flashdata('alert')['type']?>',
						placement: {
							from: "bottom",
							align: "right"
						},
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						},
					});
		});
	</script>
<?php } ?>
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
						<button type="button" class="btn btn-success" data-toggle="modal"
								data-target="#add_patient_modal">
							<i class="fa fa-user-plus"></i> Add New Patient
						</button>
					</div>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-responsive" id="patient_table">
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>Age</th>
							<th>NIC Number</th>
							<th>Telephone Number</th>
							<th>Address</th>
							<th>Create Date</th>
							<th></th>
						</tr>
						<?php foreach ($patients as $patient) { ?>
							<tr>
								<td><?php echo $patient->salutation; ?>&nbsp;<?php echo $patient->first_name; ?></td>
								<td><?php echo $patient->last_name; ?></td>
								<td><?php echo $patient->gender; ?></td>
								<td><?php echo $patient->date_of_birth; ?></td>
								<td><?php echo "age"; ?></td>
								<td><?php echo $patient->nic; ?></td>
								<td><?php echo $patient->telephone_no; ?></td>
								<td><?php echo $patient->street.', '.$patient->street_two.',<br>
									'.$patient->city.', '.$patient->district.',<br>'.$patient->province; ?></td>

								<td><?php echo $patient->create_date; ?></td>
								<td class="text-center">
								<button type="button" class="btn btn-success btn-sm"
								name="patient_update" id="patient_update" data-id="<?php echo $patient->id;?>"
								><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-sm" name="patient_delete"
								id="patient_delete" data-id="<?php echo $patient->id;?>"
								><i class="fa fa-pencil-square"></i></button>
								<button type="=button" class="btn btn-success btn-sm" name="active" id="active"
								><i class="fa fa-right"></i></button>
								<button type="=button" class="btn btn-warning btn-sm" name="inactive" id="inactive"
								><i class="fa fa-times"></i></button>
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

<!--add new patient modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="add_patient_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h4>New Patient</h4></div>

			</div>
			<form action="<?php base_url(); ?>patients/add_patient" method="post">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Salutation</label>
								<select class="form-control" name="salutation" id="salutation"
										placeholder="Salutation" data-validation="required">
									<option disabled selected>Salutation</option>
									<option value="Rev.">Rev.</option>
									<option value="Mr.">Mr.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Mss.">Mss.</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name"
									   placeholder="First Name" data-validation="custom"
									   data-validation-regexp="^([A-Za-z]+)$">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name"
									   placeholder="Last Name" data-validation="custom"
									   data-validation-regexp="^([A-Za-z]+)$">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="gender" id="gender"
										placeholder="Gender" data-validation="required">
									<option disabled selected>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Date of Birth</label>
								<input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
									   placeholder="dob" data-validation="date">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NIC NO</label>
								<input type="text" class="form-control" name="nic" id="nic"
									   placeholder="NIC Number" pattern="[0-9]{9}[x|X|v|V]|[0-9]{11}[x|X|v|V]"
									   title="Contain 10 or 12 character" data-validation="alphanumeric">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Street</label>
								<input type="text" class="form-control" name="street" id="street"
									   placeholder="Enter Street" data-validation="alphanumeric" data-validation-allowing=".,/-_">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Street two</label>
								<input type="text" class="form-control" name="street_two" id="street_two"
									   placeholder="Enter Street Two" data-validation="alphanumeric" data-validation-allowing=".,/-_">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>City</label>
								<select class="form-control" name="city" id="city"
										placeholder="Enter City" data-validation="required">
									<option disabled selected>Select City</option>
									<?php foreach ($cities as $city){?>
										<option value="<?php echo $city->name_en?>"><?php echo $city->name_en?></option>

									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Postal Code</label>
								<input type='text' class="form-control" name="postal_code"
									   id="postal_code" readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>District</label>
								<select class="form-control" name="district" id="district"
										placeholder="Enter District" data-validation="required">
									<option disabled selected>Select District</option>
									<?php foreach ($districts as $district){?>
										<option value="<?php echo $district->name_en?>"><?php echo $district->name_en?></option>

									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Province</label>
								<input type='text' class="form-control" name="province"
									   id="province" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Telephone NO</label>
								<input type="tel" class="form-control" name="telephone_no" id="telephone_no"
									   placeholder="Telephone Number" pattern="^\+?\d{0,13}"
									   title="Phone Number" required>
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
<!--update patient modal-->
<div class="modal fade" tabindex="-1" role="dialog" id="update_patient_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h4>Update Patient</h4></div>

			</div>
			<form action="<?php base_url(); ?>patients/update_patient" method="post">
				<input type="hidden" name="id" id="update_id"/>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Salutation</label>
								<select class="form-control" name="salutation_update" id="salutation_update"
										placeholder="Salutation" data-validation="required">
									<option disabled selected>Salutation</option>
									<option value="Rev.">Rev.</option>
									<option value="Mr.">Mr.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Mss.">Mss.</option>
								</select>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" name="first_name_update" id="first_name_update"
									   placeholder="First Name" data-validation="custom"
									   data-validation-regexp="^([A-Za-z]+)$">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="last_name_update" id="last_name_update"
									   placeholder="Last Name" data-validation="custom"
									   data-validation-regexp="^([A-Za-z]+)$">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" name="gender_update" id="gender_update"
										placeholder="Gender" data-validation="required">
									<option disabled selected>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Date of Birth</label>
								<input type="date" class="form-control" name="date_of_birth_update"
									   id="date_of_birth_update" placeholder="dob" data-validation="date">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NIC NO</label>
								<input type="text" class="form-control" name="nic_update" id="nic_update"
									   placeholder="NIC Number" pattern="[0-9]{9}[x|X|v|V]|[0-9]{11}[x|X|v|V]"
									   title="Contain 10 or 12 character" data-validation="alphanumeric">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Street</label>
								<input type="text" class="form-control" name="street_update" id="street_update"
									   placeholder="Enter Street" data-validation="alphanumeric" data-validation-allowing=".,/-_">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Street two</label>
								<input type="text" class="form-control" name="street_two_update" id="street_two_update"
									   placeholder="Enter Street Two" data-validation="alphanumeric" data-validation-allowing=".,/-_">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>City</label>
								<select class="form-control" name="city_update" id="city_update"
										placeholder="Enter City" data-validation="required">
									<option disabled selected>Select City</option>
									<?php foreach ($cities as $city){?>
										<option value="<?php echo $city->name_en?>"><?php echo $city->name_en?></option>

									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Postal Code</label>
								<input type='text' class="form-control" name="postal_code_update"
									   id="postal_code_update" readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>District</label>
								<select class="form-control" name="district_update" id="district_update"
										placeholder="Enter District" data-validation="required">
									<option disabled selected>Select District</option>
									<?php foreach ($districts as $district){?>
										<option value="<?php echo $district->name_en?>"><?php echo $district->name_en?></option>

									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Province</label>
								<input type='text' class="form-control" name="province_update"
									   id="province_update" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Telephone NO</label>
								<input type="tel" class="form-control" name="telephone_no_update"
									   id="telephone_no_update"
									   placeholder="Telephone Number" pattern="^\+?\d{0,13}"
									   title="Phone Number" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="text-right">
						<button type="reset" class="btn btn-success" data-toggle="modal" data-target="">Reset</button>
						<button type="submit" class="btn bg-aqua" data-toggle="modal" data-target="">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--Delete patient modal-->
<div class="modal fade " tabindex="-1" role="dialog" id="delete_patient_modal">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<div class="modal-title"><h3>Delete Patient
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></h3>
					</button>
				</div>

			</div>
			<div class="modal-body">
				Are you sure you want to delete this patient?
			</div>
			<div class="modal-footer text-right">
				<form action="<?php echo base_url(); ?>patients/Patients/delete_patient" method="post" style="display: inline">
					<input type="hidden" name="delete" id="delete_id">
					<button type="submit" class="btn btn-success" data-toggle="modal" data-target="">Yes</button>
				</form>
			<button type="submit" class="btn bg-aqua" data-toggle="modal" data-target="">No</button>
			</div>
		</div>
	</div>
</div>
<script>$(document).ready(function () {
	$('#city').change(function () {
		let city=$(this).val();	//getting data
		$.ajax({
			type:'post',
			url: base_url + 'patients/patients/get_postal_code',
			async :false,
			dataType:'json',
			data:{'city':city},
			success: function (response) {
				$('#postal_code').val(response[0]['postcode']);
			},
		});

	});

	});</script>
<script>
	$(document).ready(function () {
		$('#district').change(function () {
			let district=$(this).val();
			$.ajax({
				type:'post',
				url:base_url + 'patients/patients/get_province',
				async: false,
				dataType: 'json',
				data:{'district':district},
				success:function (response) {
					$('#province').val(response[0]['name_en']);

				},
			});

		});
		$('#patient_table').on('click','#patient_update',function(){
			let id=$(this).attr('data-id');
			// alert(id);
			$('#update_patient_modal').modal('show');
			$.ajax({
				type:'post',
				url:base_url+'patients/patients/get_patient',
				async:false,
				dataType:'json',
				data:{'id':id},
				success:function (response) {
					$('#update_id').val(response[0]['id']);
					$('#salutation_update').val(response[0]['salutation']).change();
					$('#first_name_update').val(response[0]['first_name']);
					$('#last_name_update').val(response[0]['last_name']);
					$('#gender_update').val(response[0]['gender']).change();
					$('#date_of_birth_update').val(response[0]['date_of_birth']);
					$('#nic_update').val(response[0]['nic']);
					$('#street_update').val(response[0]['street']).change();
					$('#street_two_update').val(response[0]['street_two']).change();
					$('#city_update').val(response[0]['city']).change();
					$('#postal_code_update').val(response[0]['postal_code']).change();
					$('#district_update').val(response[0]['district']).change();
					$('#province_update').val(response[0]['province']).change();
					$('#telephone_no_update').val(response[0]['telephone_no']).change();
				}
			})
		});
		$('#patient_table').on('click','#patient_delete',function(){
			let id=$(this).attr('data-id');
			$('#delete_id').val('id')
			$('#delete_patient_modal').modal('show');
		});

	});
</script>
