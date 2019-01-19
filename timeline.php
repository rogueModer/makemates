<div id="userTimelineBox">
				<form action="#" method="GET">
					<div class="card">
							<!-- Nav tabs -->
						<ul class="nav nav-tabs">
						    <li class="nav-item">
							    <a class="nav-link active" data-toggle="tab" href="#timelinePostBox">Text</a>
						  	</li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane container active" id="timelinePostBox">
								<textarea class="form-control" name="timelinePost" rows="3" id="textPost" placeholder="Write on <?php if(isset($su)){ echo $su[0][1];} ?> Timeline....."></textarea>
								<input type="submit" class="btn btn-primary btn-md mt-2 float-right" id="postBtn" name="timelinePostBtn" value="Post">
							</div>
						</div>
			   		</div>
		   		</form>
		</div>

		<ul class="container text-center" id="userLoadPost">
			<?php
				$tpd = DB::query('SELECT users.user_id, users.fn, users.un, textpost.textpost, textpost.date FROM users join textpost ON users.user_id = :id AND textpost.user_id = :id order by date desc', array(":id" => $su[0][0]));
                
                    forEach($tpd as $pd){

			 		if(isset($picName)){
			 			echo "<div class='card lpc mb-5'>
							  <div class='card-body'>
							    <h6 class='card-title text-left'><img class='post-profile-img' src='public/profilePic/{$picName}'> <a href='profile.php?u={$pd[2]}'>{$pd[1]}</a></h6><hr>
							    <p class='card-text'>{$pd[3]}</p> <hr>
							    <p class='card-link text-left '>Post on : {$pd[4]}</p>
							  </div>
						  </div>";
			 		} else{
			 			
				 		echo "<div class='card lpc mb-5'>
								  <div class='card-body'>
								    <h6 class='card-title text-left'><img class='img-circle' src='public/image/profileImg.jpg' width='30px' height='auto'> <a href='profile.php?u={$pd[2]}'>{$pd[1]}</a></h6><hr>
								    <p class='card-text'>{$pd[3]}</p> <hr>
								    <p class='card-link text-left'>Post on : {$pd[4]}</p>
								  </div>
							  </div>";
				 		}
				 }
			 ?>
  		</ul>