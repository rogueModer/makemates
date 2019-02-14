	$(document).ready(function(){

		req = 'inactive';

		function getData(start){
			$.ajax({
				method : "POST",
				url : 'loadpost.php',
				cache: false,
				data : { start : start },
				success : function(data){

					if(data == ""){
						req = "active";
						$('#userLoadPost').append('<h5>No data Found</h5>');

					} else {
						$('#userLoadPost').append(data);
						req = "inactive";
					}
				}
			});
		}

		if(req == "inactive"){
			req = "active";
			start = 0;
			getData(start);
		}

		$(window).scroll(function(){

				targetHeight = $(window).height() + $(window).scrollTop();
				ajaxReqHeight = $('#userLoadPost').height();
							
				if(targetHeight > ajaxReqHeight && req == "inactive"){
						req = "active";
						start = start + 7;
						setTimeout(() => { getData(start); }, 1000);
				}
		});
	});