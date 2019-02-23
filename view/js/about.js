$(document).ready(()=>{
    checkLogin();
    $('body').prepend(prepareNavbar());
    let str=`<div class="card"><div class="card-body btn-danger"><p class="card-text">This page is under construction</p></div></div>`;
    $('#message').html(str);

   
    
 })


 