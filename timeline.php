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

		<div class="container text-center" id="userLoadPost">
	
  	</div>