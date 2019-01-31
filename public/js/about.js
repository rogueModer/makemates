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

// Work And Education 

$('#addScDetails').click(()=>{
	$('#scDetailsCard').css('display', 'block');
});

$('#addWorks').click(()=>{
	$('#workCard').css('display', 'block');
});

$('#addLocation').click(()=>{
	$('#locationCard').css('display', 'block');
});

$('.cancel').on('click', function(){
	$(this).parent().parent().css('display', 'none');
});



// SendAbout Data

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


// Work and Education send data

$('#scDetailsSave').click(function(){

	var scName = $('input[name=scName]').val();
	var scPsYr = $('input[name=scPsYr]').val();
	
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { scName : scName, scPsYr : scPsYr},
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change School details.');
			}
		}
	});
});

$('#workSave').click(function(){

	var workN = $('input[name=workN]').val();
	var workD = $('input[name=workD]').val();
	
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { workN : workN, workD : workD },
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change work details.');
			}
		}
	});
});


$('#locationSave').click(function(){

	var add1 = $('input[name=add1]').val();
	var add2 = $('input[name=add2]').val();
	var add3 = $('input[name=add3]').val();
	
	$.ajax({
		url : 'savePost.php',
		method : 'POST',
		data : { add1 : add1, add2 : add2, add3 : add3 },
		success : function(res){
			if(res == "saved"){
				window.location.reload();
			} else{
				alert('You cannot change work details.');
			}
		}
	});
});





