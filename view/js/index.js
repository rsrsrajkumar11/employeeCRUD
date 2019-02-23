$(document).ready(()=>{
    $('#login').submit((event) =>{
        event.preventDefault();
        // console.log('aaaaa');
        data=$('#login').serialize();
        data+='&login=true';
        console.log(data);
        $.ajax({
            type: "POST",
            url: '../controller/processUsersRequest.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                // console.log(data);
                if(data['errors'].length ){
                    $('[type=reset]').trigger( "click" );
                    $('#message').html(createMessages("",data));
                    $("#myModal").modal('show'); //toggling model
                }else{
                     document.location='home.html'
                }
                // alert(data[data['errors'].length != 0 ? 'error' : 'success']);
                // document.location.reload();
            }
        });
    });

    // $("#myModal").modal('show');
});


