$('#addNickName').click(()=>{
	$('#nicknameCard').css('display', 'block');
});

$('#addDob').click(()=>{
	$('#dobCard').css('display', 'block');
});

$('#addAge').click(()=>{
	$('#ageCard').css('display', 'block');
});

$('#addNo').click(()=>{
	$('#contCard').css('display', 'block');
});

$('#addStatus').click(()=>{
	$('#statusCard').css('display', 'block');
});

$('#addRelStatus').click(()=>{
	$('#relStatusCard').css('display', 'block');
});

$('.cancel').on('click', function(){
	$(this).parent().parent().css('display', 'none');
});

// Send Database

$('#nicknameSave').click(function(){
	var nickname = $('input[name=nickname]').val();

	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { nickName : nickname},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change nickname.');
			}
		}
	});
});

$('#dobSave').click(function(){
	var dob = $('input[name=dob]').val();

	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { dob : dob},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change date of birth.');
			}
		}
	});
});

$('#ageSave').click(function(){
	var age = $('input[name=age]').val();

	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { age : age},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change date of birth.');
			}
		}
	});
});

$('#ageSave').click(function(){
	var age = $('input[name=age]').val();
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { age : age},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change Age.');
			}
		}
	});
});

$('#contSave').click(function(){
	var contNo = $('input[name=contNo]').val();

	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { contNo : contNo},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change Contact No.');
			}
		}
	});
});

$('#statusSave').click(function(){
	var status = $('input[name=status]').val();
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { status : status},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change status');
			}
		}
	});
});


$('#relStatusSave').click(function(){
	var relStatus = $('input[name=relStatus]').val();
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { relStatus : relStatus},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change Relationship status');
			}
		}
	});
});
