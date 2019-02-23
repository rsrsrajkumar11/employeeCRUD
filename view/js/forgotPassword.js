$(document).ready(()=>{
    $('#forgot').submit((event)=>{
        event.preventDefault();
        let data=$('#forgot').serialize();
        data+='&forgot=true'
        $.ajax({
            type: "POST",
            url: '../controller/processUsersRequest.php',
            data: data,
            success: (data) => {
                console.log(data);
                data = JSON.parse(data);
                // console.log(data);
                $('#message').html(createMessages("",data));
                $("#myModal").modal('show'); //toggling model
            }
        });
    });
});

let sendCode=()=>{
    // console.log($('[name=email]').val());
    let data='forgotPass=true&email='+$('[name=email]').val();
    $.ajax({
        type: "POST",
        url: '../controller/processUsersRequest.php',
        data: data,
        success: (data) => {
            // console.log(data);
            data = JSON.parse(data);
            console.log(data);
            $('#message').html(createMessages("",data));
            $("#myModal").modal('show'); //toggling model
        }
    });

}