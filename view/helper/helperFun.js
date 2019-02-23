// pagination creator on the basis of no. of records
let createPagination=(record=1,size=1)=>{
    let str=`<div class="btn-group" role="group" aria-label="Basic example">`;
    // for(j=0,i=1;i<=record && j<5 ;i+=size){
    for(let j=1,i=1;i<=record && j<=5;i+=size,++j){
        str+=`<button type="button" onClick="loadEmployeeData(${j},${size})"  id='page${j}_${record}' name="page${j}" class="btn btn-secondary">${j}</button>`;
    }
    str+=`</div>`;
    return str;
}

// prepare navbar
const prepareNavbar=()=>{
    let str=`
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="home.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="employee.html">Employee</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contacts.html">Contacts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="changepassword.html">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id='logout' onClick='logout()' href="#">Logout</a>
        </li>
    </ul>
</nav>
    `.trim();

    return str;
}

// create success/faliure messages 
const createMessages = (firstArg="",message) => {
    let str = '';
    if (message['success'].length != 0) {
        message['success'].forEach(e => {
            str += '<div class="alert alert-success" role="alert">' +firstArg + e +'</div>';
        })
    }

    if (message['errors'].length != 0) {
        message['errors'].forEach(e => {
            str += '<div class="alert alert-danger" role="alert">'+firstArg + e +'</div>';
        });
    }
    
    return str;
}

// return options 
let prepareOptions=(data)=>{
    return data.map(country=>`<option  value="${country['name']}" >${country['name']}</option>`);  
}

// create table out of json array of object
let createTable=(employees)=>{
    let str=`<table class="table"> <thead> <tr> <th>#</th> <th>Name</th> <th>Father Name</th> <th>DOB</th> <th>Contact No.</th> <th colspan="3">Action</th> </tr> </thead> <tbody>`;
    let i=0;
    employees.forEach((emp=>{
        str+=`<tr><td>${++i}</td> <td>${emp["fname"]} ${emp["lname"]}</td> <td>${emp["fatherName"]}</td> <td>${emp["dob"]}</td> <td>${emp["contact"]}</td> <td><input type="button" value="View" class="btn btn-info" onclick="viewEmployee(${emp["empId"]})"></td> <td><input type="button" value="Edit" class="btn btn-warning" onclick="loadEmployee(${emp["empId"]})"></td> <td><input type="button" value="Delete" class="btn btn-danger" onclick="deleteEmployee(${emp["empId"]})"></td> </tr>`;
    }))
    str+=' </tbody> </table>';
    return str;
}


let logout=()=>{
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '../controller/processUsersRequest.php',
        data: 'logout=true',
        success: (data) => {
            data = JSON.parse(data);
            console.log(data);
            if(data['errors'].length ==0){
                document.location='index.html';
            }
        }
    });
 }

 let checkLogin=()=>{
    let data='islogin=true';
    $.ajax({
     type: "POST",
     url: '../controller/processUsersRequest.php',
     data: data,
     success: (data) => {
         if(data=='0'){
             document.location='index.html';
         }
     }
    });
 }