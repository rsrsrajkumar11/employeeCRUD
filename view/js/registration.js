$(document).ready(()=>{
    $('#registration').submit((event) =>{
        event.preventDefault();
        // console.log('aaaaa');
        data=$('#registration').serialize();
        data+='&registration=true';
        console.log(data);
        $.ajax({
            type: "POST",
            url: '../controller/processUsersRequest.php',
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                // console.log(data);
                $('#message').html(createMessages("",data));
                $("#myModal").modal('show'); //toggling model
                
                
            }
        });
    });
});


