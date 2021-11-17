function formValidation() {
    var name = document.user.name.value;
    var email = document.user.email;
    var password = document.user.password;
    var gender = document.user.gender;
    var country = document.user.country;
    var hobby = document.querySelectorAll('input[type="checkbox"]');
    
    var nameReg = /^[A-Za-z ]+$/;
    if (name == "" ) {
        alert("Please Enter Your name");
        return false;
    }else if(!name.match(nameReg)){
    alert("only alphabets are allowed");
    return false;
    }
    
    var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value == "") {
        alert("Please Enter Your Email");
        return false;
    }else if(!email.value.match(emailReg)){
        alert("Enter valid email");
        return false;
    }else if (password.value == "") {
        alert("Please Enter Your Password");
        return false;
    }else if (password.value.length < 5 ) {
        alert("Please Enter Minmum 5 Digit Password");
        return false;
    }
    if(password.value.length > 20){
        alert("Password length must be smaller then 20 digit");
        return false;
    }
    if (gender.value.length <= 0) {
        alert("Please select gender");
        return false;
    }
    if (country.value == "Select Country") {
        alert("Please select country");
        return false;
    }
    var check = false;
    for(let i = 0; i<hobby.length; i++){
        if(hobby[i].checked)
            check = true;
    }
    if(check == false){
        alert("Please select hobby");
        return false;
    }
}