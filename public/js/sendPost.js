$(document).ready(function(){

	$('#postForm').submit(function(e){
		$('#postResult').hide();
		$('#postForm').ajaxSubmit({
			resetForm : true,
			success : function(res){
				res = JSON.parse(res);
					$('#postResult').show();

					$('#postResult').text(res.msg);
					$('#postResult').addClass('text-danger');

					 location.reload();
				if(res.status == 'success'){
					setTimeout(()=>{
							$('#postResult').hide();
					}, 2000);
					
				}
			}
		});

		e.preventDefault();
	});
});
