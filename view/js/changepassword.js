$(document).ready(()=>{
    $('body').prepend(prepareNavbar());
    let data='islogin=true';
    $.ajax({
     type: "POST",
     url: '../controller/processUsersRequest.php',
     data: data,
     success: (data) => {
         data = JSON.parse(data);
         if(data['errors'].length >0){
             document.location='index.html';
         }
     }
    });

    // logout function
    $('#logout').on('click',(event)=>{
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: '../controller/processUsersRequest.php',
            data: 'logout=true',
            success: (data) => {
                data = JSON.parse(data);
                if(data['errors'].length ==0){
                    document.location='index.html';
                }
            }
        });
    });

    // change password 
    $('#changepassword').submit((event) =>{
        event.preventDefault();
        data=$('#changepassword').serialize();
        data+='&changepassword=true';
        $.ajax({
            type: "POST",
            url: '../controller/processUsersRequest.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                console.log(data);
                $('#message').html(createMessages("",data));
                $("#myModal").modal('show'); //toggling model
                $('input').val('');
                
                
            }
        });
    });

 })