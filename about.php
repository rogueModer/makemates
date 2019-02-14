
<div id="aboutMainBox">

	<?php	

	$profileUser = filter_var($_GET['u'], FILTER_SANITIZE_STRING);
	
	$searchId = DB::query('SELECT user_id FROM users where un = :uname', array(':uname' => $profileUser))[0][0];
	$realUserUn = DB:: query('SELECT un FROM users WHERE user_id = :id', array(':id' => $_COOKIE['MMID_']))[0][0];

		if(isset(DB::query('SELECT * FROM about WHERE user_id = :id', array(':id' => $searchId))[0])){
				$about = DB::query('SELECT * FROM about WHERE user_id = :id ', array(':id' => $searchId))[0];
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
			    		if($profileUser == $realUserUn){
				      		echo "<a href='#' id='addNickName'>+ Add Nickname</a></br>";
				      		echo "<div id='nicknameCard' class='card' style='height : 120px; display: none;'>
									  <div class='card-body'>
									 	<input type='text' name='nickname' class='form-control' placeholder='Enter your Nickname here.'>
									    <a href='#' id='nicknameSave' class='btn btn-success btn-sm card-link'>Save</a>
									    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
									  </div>
								</div>";
						}
			      	} else{

			      		echo "<span class='font-weight-bold'>Nickname  : </span><span>{$about['nickname']}</span></br>";
			      	}

			      	if(!isset($about['dob'])){
						if($profileUser == $realUserUn){			      	
			      			echo "<a href='#' id='addDob'>+ Add Date of Birth</a></br>";
							echo "<div id='dobCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='date' name='dob' class='form-control'>
								    <a href='#' id='dobSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
			      		echo "<span class='font-weight-bold'>Date of Birth : </span><span>{$about['dob']}</span></br>";
			      	}

			      	if(!isset($about['age'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addAge'>+ Add Age </a></br>";
							echo "<div id='ageCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='age' class='form-control' placeholder='Enter your age here.'>
								    <a href='#' id='ageSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
									</div>
							</div>";
						}
			      	} else{
			      		echo "<span class='font-weight-bold'>Age : </span><span>{$about['age']}</span></br>";
			      	}

			      	if(!isset($about['contactNo'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addNo'>+ Add Contact No</a></br>";
							echo "<div id='contCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='contNo' class='form-control' placeholder='Enter your Contact Number.'>
								    <a href='#' id='contSave' class='btn btn-success btn-sm card-link'>Save</a>
									<a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
			      		echo "<span class='font-weight-bold'>Contact No : </span><span>{$about['contactNo']}</span></br>";
			      	}

			      	if(!isset($about['status'])){
						if($profileUser == $realUserUn){
							echo "<a href='#' id='addStatus'>+ Add Status</a></br>";
							echo "<div id='statusCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='status' class='form-control' placeholder='Enter your Status.'>
								    <a href='#' id='statusSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
			      		echo "<span class='font-weight-bold'>Status : </span><span>{$about['status']}</span></br>";
			      	}

			      	if(!isset($about['relStatus'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addRelStatus'>+ Add RelationShip Status</a></br>";
							echo "<div id='relStatusCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='relStatus' class='form-control' placeholder='Enter your RelationShip Status.'>
								    <a href='#' id='relStatusSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
			      		echo "<span class='font-weight-bold'>RelationShip : </span><span>{$about['relStatus']}</span></br>";
			      	}
			  ?>

			    </div>
			    <div id="workEducation" class="container tab-pane fade"><br>
			      <h3>Work & Educations : </h3>

			      <?php 


			      	if(!isset($about['scDetails'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addScDetails'>+ Add School</a></br>";
			      			echo "<div id='scDetailsCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='scName' class='form-control mb-2' placeholder='Enter your College Name Or School Name.'>
								 	<input type='text' name='scPsYr' class='form-control' placeholder='Passing year.'>
								    <a href='#' id='scDetailsSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
					
						$about['scDetails'] = unserialize($about['scDetails']);

			      		echo "<span class='font-weight-bold'>Went to </span>
			      					<span>
			      						{$about['scDetails']['scName']}<br>
			      						<span class='font-weight-bold'>Passed In </span><span>{$about['scDetails']['scPsYr']}</span>
			      			   </span></br>";
			      	}
			    
			      	if(!isset($about['workDetails'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addWorks'>+ Add work</a></br>";
			      			echo "<div id='workCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='workN' class='form-control mb-2' placeholder='Work'>
								 	<input type='text' name='workD' class='form-control' placeholder='Work Description'>
								    <a href='#' id='workSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
					
						$about['workDetails'] = unserialize($about['workDetails']);					
						
						echo "<h4> About Work :</h4>";

						echo "<span class='font-weight-bold'>Working as </span>
			      					<span>
			      						{$about['workDetails']['workN']}<br>
			      						<span class='font-weight-bold'>About work </span><span>{$about['workDetails']['workD']}</span>
			      			   </span></br>";
			      	}

		      ?>




			    </div>
			    <div id="location" class="container tab-pane fade"><br>
			      <h3>About Location :</h3>

			      <?php 


			      	if(!isset($about['ltDetails'])){
			      		if($profileUser == $realUserUn){
			      			echo "<a href='#' id='addLocation'>+ Add Location </a></br>";
			      			echo "<div id='locationCard' class='card' style='height : 120px; display: none;'>
								  <div class='card-body'>
								 	<input type='text' name='add1' class='form-control mb-2' placeholder='City or Town Name'>
								 	<input type='text' name='add2' class='form-control mb-2' placeholder='District'>
								 	<input type='text' name='add3' class='form-control' placeholder='Pincode'>
								    <a href='#' id='locationSave' class='btn btn-success btn-sm card-link'>Save</a>
								    <a href='#' class='btn btn-danger btn-sm card-link cancel'>Cancel</a>
								  </div>
							</div>";
						}
			      	} else{
					
						$about['ltDetails'] = unserialize($about['ltDetails']);

						echo "<span class='font-weight-bold'>Lives in </span>
			      					<span>
			      						{$about['ltDetails']['add1']}, {$about['ltDetails']['add2']}<br>
			      						<span class='font-weight-bold' >Pin Code : {$about['ltDetails']['add3']}  </span> 
			      			   </span>";
			      	}

			       ?>

			    </div>
			  </div>
			</fieldset>
		</form>
	</div>
</div>

<script src="./public/js/about.js"></script>
