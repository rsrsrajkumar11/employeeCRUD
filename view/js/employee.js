// csv2json conversion function
function csvToJson(csv){
    var lines=csv.split("\n");
    var result = [];
    var headers=lines[0].split(",");
    for(var i=1;i<lines.length;i++){
        var obj = {};
        var currentline=lines[i].split(",");
        for(var j=0;j<headers.length;j++){
            obj[headers[j]] = currentline[j];
        }
        result.push(obj);
    }
    return JSON.stringify(result); //JSON
  }

// json2csv converions function start
function json2csv(jsonData, jsonFields) {
 
	// var csvStr = jsonFields.join(",") + "\n";
	var csvStr = jsonFields + "\n";
	for(let i = 0; i < jsonData.length; i++) {
		csvStr += Object.getOwnPropertyNames(jsonData[i])
		 .map( e => jsonData[i][e]).join(",")
		 + "\n";
	}
	return csvStr;
}

// download all employee details
let downloadFile=()=>{
    let data=`download=All`;
    $.ajax({
        type: "POST",
        url: '../controller/processEmployeeRequest.php',
        data: data,
        success: (data)=>{
            data=JSON.parse(data);
            if(data['errors'].length==0){
                data=data['data'][0];
                let csv=json2csv(data,"empId,fname,lname,fatherName,motherName,email,contact,gender,address,country,state,city,zip,aadhar,pancard,technology,dob");
                let exportedFilenmae = 'employees_details.csv';

                let blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
                if (navigator.msSaveBlob) { // IE 10+
                    navigator.msSaveBlob(blob, exportedFilenmae);
                } else {
                    let link = document.createElement("a");
                    if (link.download !== undefined) { // feature detection
                        // Browsers that support HTML5 download attribute
                        var url = URL.createObjectURL(blob);
                        link.setAttribute("href", url);
                        link.setAttribute("download", exportedFilenmae);
                        link.style.visibility = 'hidden';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }
                }
            }
        }
    });
}

// prepare optoins and there value
let prepareInitalOPtions=()=>{
    $('#country').html(prepareOptions(country));
    $('#state').html(prepareOptions(states));
    $('#city').html(prepareOptions(city));
}

// inital load all employee 
let loadEmployeeData=(page,size)=>{
 
    let data=`fetchMinimal=true&page=${page}&size=${size}`;
    $.ajax({
        type: "POST",
        url: '../controller/processEmployeeRequest.php',
        data: data,
        success: (data)=>{
            data=JSON.parse(data);
            if(data['errors'].length==0){
                data=data['data'];
                $('#retriveData').html(createTable(data));
            }
        }
    });
    
    let pageval=$('[name=page5]').attr('id'),t=0;
    if (pageval) {
        pageval = pageval.split(/page|_/ig);
        if (page%5  == 0  && pageval[1] <= pageval[2] / 2) {
            t = $('[name=page5]').text();
            t = parseInt(t) + 5;
            $('[name=page5]').text(t).attr('onClick', `loadEmployeeData(${t},${size})`).attr('id', `page${t}_${pageval[2]}`);
            t = $('[name=page4]').text();
            t = parseInt(t) + 5;
            $('[name=page4]').text(t).attr('onClick', `loadEmployeeData(${t},${size})`).attr('id', `page${t}_${pageval[2]}`);
            t = $('[name=page3]').text();
            t = parseInt(t) + 5;
            $('[name=page3]').text(t).attr('onClick', `loadEmployeeData(${t},${size})`).attr('id', `page${t}_${pageval[2]}`);
            t = $('[name=page2]').text();
            t = parseInt(t) + 5;
            $('[name=page2]').text(t).attr('onClick', `loadEmployeeData(${t},${size})`).attr('id', `page${t}_${pageval[2]}`);
            t = $('[name=page1]').text();
            t = parseInt(t) + 5;
            $('[name=page1]').text(t).attr('onClick', `loadEmployeeData(${t},${size})`).attr('id', `page${t}_${pageval[2]}`);
        }
    }

    pageval=$('[name=page1]').attr('id');
    if(pageval){
        pageval=pageval.split(/page|_/ig);
        // console.log(pageval,page);
        if(pageval[1] == page && pageval[1]!='1'){
            t=$('[name=page5]').text();
            t=parseInt(t)-5;
            $('[name=page5]').text(t).attr('onClick',`loadEmployeeData(${t},${size})`).attr('id',`page${t}_${pageval[2]}`);
            t=$('[name=page4]').text();
            t=parseInt(t)-5;
            $('[name=page4]').text(t).attr('onClick',`loadEmployeeData(${t},${size})`).attr('id',`page${t}_${pageval[2]}`);
            t=$('[name=page3]').text() ;
            t=parseInt(t)-5;
            $('[name=page3]').text(t).attr('onClick',`loadEmployeeData(${t},${size})`).attr('id',`page${t}_${pageval[2]}`);
            t=$('[name=page2]').text() ;
            t=parseInt(t)-5;
            $('[name=page2]').text(t).attr('onClick',`loadEmployeeData(${t},${size})`).attr('id',`page${t}_${pageval[2]}`);
            t=$('[name=page1]').text() ;
            t=parseInt(t)-5;
            $('[name=page1]').text(t).attr('onClick',`loadEmployeeData(${t},${size})`).attr('id',`page${t}_${pageval[2]}`);
        }
    
    }
        
}

// read and send file contents to server for adding employee
function readFileContents(){
    if (typeof (FileReader) != "undefined" ) {
        var reader = new FileReader();
        reader.onload = function (event) {
            var csvrows = event.target.result;
            csvrows=csvToJson(csvrows);
            csvrows=JSON.parse(csvrows);
            csvrows=csvrows.map(d=>`fname=${d.fname}&lName=${d.lName}&fathersName=${d.fathersName}&mothersName=${d.mothersName}&email=${d.email}&contactNo=${d.contactNo}&aadharNo=${d.aadharNo}&pancardNo=${d.pancardNo}&gender=${d.gender}&dob=${d.dob}&technology1=${d.technology1}&technology2=${d.technology2}&technology3=${d.technology3}&technology4=${d.technology4}&country=${d.country}&state=${d.state}&city=${d.city}&zipCode=${d.zipCode}&address=${d.address}` );

            // sending bulk data data in a row
            for(let i=0;i<csvrows.length-1;++i){
                data = 'createNew=createNew&'+csvrows[i];
                $.ajax({
                    type: "POST",
                    url: '../controller/processEmployeeRequest.php',
                    data: data,
                    success: (data) => {
                        data = JSON.parse(data);
                        if(data['errors'].length == 0){
                            $('[type=reset]').trigger( "click" );

                            pagination();
                        }
                        $('#message').append(createMessages('Row '+ (parseInt(i)+1) +' : ',data));
                        $("#myModal").modal('show'); //toggling model
                    }
                });
            }
            $('#file').val('');  
            //   sending data ends
        }
        reader.readAsText($("#file")[0].files[0]);
    } else{
        alert("Sorry! Your browser does not support HTML5!");
        }
}

// delete employee
let deleteEmployee=(id)=>{
    let ans=confirm('are you sure, you want to delete ?');
    if(ans){
        $.ajax({
            type: "POST",
            url: '../controller/processEmployeeRequest.php',
            data: 'Delete='+id,
            success: (data)=>{
                console.log("raw data: ",data);
                data=JSON.parse(data);
                console.log("after parsing data: ",data);
                
                $('#message1').html(createMessages("",data));
                createPagination();
            }
        });
    }
}

// view single full employee details
let viewEmployee=(empId)=>{
    let data='viewEmployee='+empId;
    $.ajax({
        type: "POST",
        url: '../controller/processEmployeeRequest.php',
        data: data,
        success: (data)=>{
            data=JSON.parse(data);
            let emp=data['data'][0];
            console.log(emp);
            $('input[name=fname]').val(emp['fname']).prop('readonly', true);
            $('input[name=lName]').val(emp['lname']).prop('readonly', true);
            $('input[name=fathersName]').val(emp['fatherName']).prop('readonly', true);
            $('input[name=mothersName]').val(emp['motherName']).prop('readonly', true);
            $('input[name=email]').val(emp['email']).prop('readonly', true);
            $('input[name=contactNo]').val(emp['contact']).prop('readonly', true);
            $('input[name=dob]').val(emp['dob']).prop('readonly', true);
            $('[name=gender]').attr('disabled', true);
            if(emp['gender']=='m') $('#male').prop('checked',true);
            if(emp['gender']=='f') $('#female').prop('checked',true);
            if(emp['gender']=='o') $('#other').prop('checked',true);
            $('textarea').text(emp['address']).prop('readonly', true);
            $('input[name=aadharNo]').val(emp['aadhar']).prop('readonly', true);
            $('input[name=pancardNo]').val(emp['pancard']).prop('readonly', true);
            $('input[name=zipCode]').val(emp['zip']).prop('readonly', true);
            $('[type=checkbox]').attr('disabled', true);
            if(/HTML5/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            if(/Java Script/ig.test(emp['technology'])) $('#customCheck2').attr('checked',true);
            if(/CSS/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            if(/Node/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            $('button[type=submit]').text('Close View');
            $('button[type=reset]').css('display','none');
        }
    });
}

// edit data
let loadEmployee=(empId)=>{
    let data='viewEmployee='+empId;
    $.ajax({
        type: "POST",
        url: '../controller/processEmployeeRequest.php',
        data: data,
        success: (data)=>{
            data=JSON.parse(data);
            let emp=data['data'][0];
            console.log(emp);
            $('#empid').val(empId);
            $('input[name=fname]').val(emp['fname']);
            $('input[name=lName]').val(emp['lname']);
            $('input[name=fathersName]').val(emp['fatherName']);
            $('input[name=mothersName]').val(emp['motherName']);
            $('input[name=email]').val(emp['email']);
            $('input[name=contactNo]').val(emp['contact']);
            $('input[name=dob]').val(emp['dob']);
            if(emp['gender']=='m') $('#male').prop('checked',true) ;
            if(emp['gender']=='f') $('#female').prop('checked',true) ;
            if(emp['gender']=='o') $('#other').prop('checked',true) ;
            $('textarea').text(emp['address']);
            $('input[name=aadharNo]').val(emp['aadhar']) ;
            $('input[name=pancardNo]').val(emp['pancard']) ;
            $('input[name=zipCode]').val(emp['zip']) ;
            if(/HTML5/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            if(/Java Script/ig.test(emp['technology'])) $('#customCheck2').attr('checked',true);
            if(/CSS/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            if(/Node/ig.test(emp['technology'])) $('#customCheck1').attr('checked',true);
            $('button[type=submit]').text('Update');
            $('button[type=reset]').css('display','none');
            $('button[type=reset]').parent().append(`<input type="button" id="cancel" onClick="cancelEdit()" class="btn btn-info" value="Cancel" >`)
        }
    });
}

// cancel and go back to initial
let cancelEdit=()=>{
    $('button[type=reset]').css('display','');
    $('#cancel').remove();
    $('button[type=submit]').text('Create');
    $('input').attr('checked',false);
    $('[type=reset]').trigger( "click" );
    $('textarea').text('');
}

// creating pagination 
let pagination=()=>{
    $.ajax({
        type: "POST",
        url: '../controller/processEmployeeRequest.php',
        data: 'countRecords=true',
        success: function (data){
            data=JSON.parse(data);
            if(data['errors'].length==0){
                let total =data['data']['rowCount']; 
                // total 
                console.log(data['data']['rowCount']);
                $('#pagination').html(createPagination(total ,2));
            }
        }
    });
}

// when the page is loaded complately
$(document).ready(() => {
    checkLogin();

    // locad options for country,state,city
    prepareInitalOPtions();

    // create inital pagination
    pagination();

    //loading inital employee on page; setting 2 record per page
    loadEmployeeData(1,2);
    
    // trigger when user create new employee record
    $('#createEmployee').submit((event) => {
        event.preventDefault();
        let btnval = $('button[type=submit]').text();
        
        if (btnval == 'Create') {
            let data = $('#createEmployee').serialize();
            data += '&createNew=createNew';
            $.ajax({
                type: "POST",
                url: '../controller/processEmployeeRequest.php',
                data: data,
                success: (data) => {
                    data = JSON.parse(data);
                    // console.log(data);
                    if(data['errors'].length == 0){
                        $('[type=reset]').trigger( "click" );
                        pagination();
                    }
                    $('#message').html(createMessages("",data));
                    $("#myModal").modal('show'); //toggling model
                }
            });
        }

        // clear the form 
        if(btnval== 'Close View'){
            $('button[type=submit]').text('Create');
            $('button[type=reset]').css('display','');
            $('input').prop('checked',false);
            $('input[type=checkbox]').attr('checked',false);
            $('input').prop('readonly',false);
            $('textarea').text('').prop('readonly', false);
            $('input[name=dob]').val('').prop('readonly', false);
            $('[type=checkbox]').attr('disabled', false);
            $('[type=reset]').trigger( "click" );
            $('[name=gender]').attr('disabled', false);
            console.log('closed')
        }

        // trigger update of perticular employee 
        if(btnval=='Update'){
            let data = $('#createEmployee').serialize();
            data += '&update=true';
            alert(data);
            $.ajax({
                type: "POST",
                url: '../controller/processEmployeeRequest.php',
                data: data,
                success: (data) => {
                    
                    data = JSON.parse(data);
                    console.log(data);
                    // console.log(data);
                    $('#message').html(createMessages("",data));
                    $("#myModal").modal('show'); 
                    if(data['errors'].length == 0){
                        $('[type=reset]').trigger( "click" );
                        pagination();
                    }
                }
            });
        }

        $('#file').submit((event)=>{
            event.preventDefault();
        });
    });

    // data picker with format defined in it
    $(".date").datetimepicker({
        format:'YYYY-MM-DD'
    });
});
