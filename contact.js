function openContactForm() {
    document.getElementById("contact_me").style.display = "block";
}
function verification(){
    var name = document.forms["formName"]["YourName"];                 
    var phone = document.forms["formName"]["YourPhone"];  
    var message =  document.forms["formName"]["YourMessage"];
    var error = document.getElementById("msgText");
    var nameV= name.value;
    var phoneV= phone.value;	

    if (nameV.length <4)                                 
    { 
        //window.alert("Please enter your name at least 4 characters"); 
        error.innerHTML = " Please enter your name at least 4 characters ";
        error.style.color="red";
        //error.style.font-size="25";
        name.focus(); 
        return false;
    } 
    if (isNaN(phoneV) )                                 
    { 
        //window.alert("Please enter good phone number ");
        error.innerHTML = " Please enter good phone number  ";
        error.style.color="red";
        //error.style.font-size="25";
        phone.focus(); 
        return false;
    }
    if(phoneV.length <11){
        //window.alert("Please enter good phone number ");
        error.innerHTML = " Please enter good phone number  ";
        error.style.color="red";
        //error.style.font-size="25";
        phone.focus(); 
        return false;
    } 
    if (message.value.length <20)                                 
    { 
        //window.alert("Please your message is too short");
        error.innerHTML = " Please your message is too short  ";
        error.style.color="red";
        //error.style.font-size="25";
        message.focus(); 
        return false;
    }
    return true; 
}