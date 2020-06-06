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
					<table class="table table-bordered">
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>Date of Birth</th>
							<th>Age</th>
							<th>NIC NO</th>
							<th>Telephone NO</th>
							<th>Street</th>
							<th>Street Two</th>
							<th>City</th>
							<th>District</th>
							<th>Province</th>
							<th>Create Date</th>
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
								<td><?php echo $patient->street; ?></td>
								<td><?php echo $patient->street_two; ?></td>
								<td><?php echo $patient->city; ?></td>
								<td><?php echo $patient->district; ?></td>
								<td><?php echo $patient->province; ?></td>
								<td><?php echo $patient->create_date; ?></td>
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
									   placeholder="First Name" data-validation="required">
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name"
									   placeholder="Last Name" data-validation="required">
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
									   placeholder="dob" data-validation="required">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>NIC NO</label>
								<input type="text" class="form-control" name="nic" id="nic"
									   placeholder="NIC Number" pattern="[0-9]{9}[x|X|v|V]|[0-9]{11}[x|X|v|V]"
									   title="Contain 10 or 12 character" data-validation="required">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Street</label>
								<input type="text" class="form-control" name="street" id="street"
									   placeholder="Enter Street" data-validation="required">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Street two</label>
								<input type="text" class="form-control" name="street_two" id="street_two"
									   placeholder="Enter Street Two" data-validation="required">
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
<!--								<select class="form-control" name="province" id="province"-->
<!--										placeholder="Enter Province" data-validation="required">-->
<!--									<option disabled selected>Select Province</option>-->
<!--									--><?php //foreach ($provinces as $province){?>
<!--										<option value="--><?php //echo $province->name_en?><!--">--><?php //echo $province->name_en?><!--</option>-->
<!---->
<!--									--><?php //}?>
<!--								</select>-->
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

	});
</script>
