

$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#uploadBtn').on('click', function(){

    $('#userPhotoModal').modal('hide');

    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    
    $uploadFile = $('#upload_image')[0];


    reader.readAsDataURL($uploadFile.files[0]);
    
    $('#uploadimageModal').modal('show');
  
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
     
      $.ajax({
        url:"config/auth.php",
        type: "POST",
        data:{"profilepic": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
              
              if(res == 'success'){
                window.location.reload();          
              } else{
                alert('Something Goes Wrong, Try Again Later');
              }
        
        }
      });
    })
  });
});  