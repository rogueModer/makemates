
<div id="aboutMainBox">

	<?php	if(isset(DB::query('SELECT * FROM about WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']))[0])){
				$about = DB::query('SELECT * FROM about WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']))[0];
			}

	?>

		<div id="aboutBox">
	  	<form action="user.php" method="POST" >
			<fieldset>
					<ul class="nav nav-tabs" role="tablist">
					    <li class="nav-item">
					      <a class="nav-link active" data-toggle="tab" href="#basicInfo">Basic Information</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" data-toggle="tab" href="#workEducation">Work & Educations</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" data-toggle="tab" href="#location">Locations</a>
					    </li>
					</ul>

			  <!-- Tab panes -->
			  <div class="tab-content aboutTabContent" >
			    <div id="basicInfo" class="container tab-pane active"><br>
			      <h3>Basic Information :</h3>
			      <?php

			      	if(!isset($about['nickname'])){
			      		echo "<a href='#' id='addNickName'>+ Add Nickname</a></br>";
			      		echo "<div id='nicknameCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='nickname' class='form-control' placeholder='Enter your Nickname here.'>
								    <a href='#' id='nicknameSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
			      	} else{
			      		echo "<span class='font-weight-bold'>Nickname  : </span><span>{$about['nickname']}</span></br>";
			      	}

			      	if(!isset($about['dob'])){
			      		echo "<a href='#' id='addDob'>+ Add Date of Birth</a></br>";
						echo "<div id='dobCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='date' name='dob' class='form-control'>
								    <a href='#' id='dobSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
			      	} else{
			      		echo "<span class='font-weight-bold'>Date of Birth : </span><span>{$about['dob']}</span></br>";
			      	}

			      	if(!isset($about['age'])){
			      		echo "<a href='#' id='addAge'>+ Add Age </a></br>";
						echo "<div id='ageCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='age' class='form-control' placeholder='Enter your age here.'>
								    <a href='#' id='ageSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
									</div>
							</div>";
			      	} else{
			      		echo "<span class='font-weight-bold'>Age : </span><span>{$about['age']}</span></br>";
			      	}

			      	if(!isset($about['contactNo'])){
			      		echo "<a href='#' id='addNo'>+ Add Contact No</a></br>";
						echo "<div id='contCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='contNo' class='form-control' placeholder='Enter your Contact Number.'>
								    <a href='#' id='contSave' class='btn btn-success btn-sm card-link'>Save</a>
									<a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
			      	} else{
			      		echo "<span class='font-weight-bold'>Contact No : </span><span>{$about['contactNo']}</span></br>";
			      	}

			      	if(!isset($about['status'])){
						echo "<a href='#' id='addStatus'>+ Add Status</a></br>";
						echo "<div id='statusCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='status' class='form-control' placeholder='Enter your Status.'>
								    <a href='#' id='statusSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
			      	} else{
			      		echo "<span class='font-weight-bold'>Status : </span><span>{$about['status']}</span></br>";
			      	}

			      	if(!isset($about['relStatus'])){
			      		echo "<a href='#' id='addRelStatus'>+ Add RelationShip Status</a></br>";
						echo "<div id='relStatusCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='relStatus' class='form-control' placeholder='Enter your RelationShip Status.'>
								    <a href='#' id='relStatusSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";

			      	} else{
			      		echo "<span class='font-weight-bold'>RelationShip : </span><span>{$about['relStatus']}</span></br>";
			      	}
			  ?>

			    </div>
			    <div id="workEducation" class="container tab-pane fade"><br>
			      <h3>Work & Educations : </h3>

			    </div>
			    <div id="location" class="container tab-pane fade"><br>
			      <h3>Locations :</h3>

			    </div>
			  </div>
			</fieldset>
		</form>
	</div>
</div>

<script src="./public/js/about.js"></script>
