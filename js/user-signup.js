    let userPassword = document.getElementById("userPassword");
    let userPasswordRepeat = document.getElementById("userPasswordRepeat");
    let passwordWarning = document.getElementById("passwordWarning");
    let passwordHelper  = document.getElementById("passwordHelper");
    let repeatPasswordHelper  = document.getElementById("repeatPasswordHelper");
    let minimumChar = document.getElementById("minimumChar");
    let togglePassword = document.getElementById("togglePassword");
    let btnSubmit = document.getElementById("btnSubmit");
    let formSubmitting = false;
    let setFormSubmitting = function() { formSubmitting = true; };

    passwordHelper.style.display = "none";
    passwordWarning.style.display = "none";

    // Prevent / Warn accidental tab exit / close/
    window.onload = function() {
        window.addEventListener("beforeunload", function (e) {
            if (formSubmitting) {
                return undefined;
            }

            var confirmationMessage = 'It looks like you have been editing something. '
                                    + 'If you leave before saving, your changes will be lost.';
            
            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        });
    };

    userPassword.onfocus = function () {
        passwordHelper.style.display = "block";
    }

    // Toggle User Password
    $("#togglePassword").click(function() {
        // alert("Working");
        $(this).toggleClass("bi-eye bi-eye-slash");
        userPassToggle = $(this).parent().find("input.userPassword");

        if (userPassToggle.attr("type") == "password") {
            userPassToggle.attr("type", "text");
        } 
        
        else {
            userPassToggle.attr("type", "password");
        }
    });

    // Toggle Repeat User Password
    $(".toggleRepeatPassword").click(function() {
        $(this).toggleClass("bi-eye bi-eye-slash");
        userRepeatPassToggle = $(this).parent().find("input.userPasswordRepeat");

        if (userRepeatPassToggle.attr("type") == "password") {
            userRepeatPassToggle.attr("type", "text");
        } 
        
        else {
            userRepeatPassToggle.attr("type", "password");
        }
    });

    userPasswordRepeat.disabled = true;
    userPassword.onkeyup = function() {

        
        if(userPassword.value.length >= 8) {
            userPasswordRepeat.disabled = false;
            passwordWarning.style.display = "block";
            minimumChar.classList.remove('invalidInput');
            minimumChar.classList.add('validInput');
          } 
          
          else {
            userPasswordRepeat.disabled = true;
            minimumChar.classList.remove("validInput");
            minimumChar.classList.add("invalidInput");
        }


        if (userPassword.value != userPasswordRepeat.value) {
            
            // alert("Password Didn't Match!");
            $('#passwordWarning').removeClass("passwordWarningMatched");
            $('#passwordWarning').addClass("passwordWarningNotMatched");
             $('#passwordWarning').text("Password doesn't match!");
            // return false;
        }

        else {
            // alert("Password Matched!");
            $('#passwordWarning').addClass("passwordWarningMatched");
            $('#passwordWarning').text("Password matched!");
            return true;
        }
    }
    

    // userPassword.onblur = function () {
    //     passwordHelper.style.display = "none";
    // }

    // userPasswordRepeat.onblur = function () {
    //     repeatPasswordHelper.style.display = "none";
    // }

    userPasswordRepeat.onkeyup = function() {
        // let userPassword = document.getElementByID("userPassword");
        // let userPasswordRepeat = document.getElementByID("userPasswordRepeat");

        if (userPassword.value != userPasswordRepeat.value) {
            
            // alert("Password Didn't Match!");
            $('#passwordWarning').removeClass("passwordWarningMatched");
            $('#passwordWarning').addClass("passwordWarningNotMatched");
             $('#passwordWarning').text("Password doesn't match!");
            // return false;
        }

        else {
            // alert("Password Matched!");
            $('#passwordWarning').addClass("passwordWarningMatched");
            $('#passwordWarning').text("Password matched!");
            return true;
        }
    }

    btnSubmit.onclick = function (e) {
        if (userPassword.value != userPasswordRepeat.value) {
            e.preventDefault();
            $('.userPasswordRepeat').addClass("userPasswordRepeatNotValid");
            $('.userPassword').addClass("userPasswordRepeatNotValid");
        }

        else{
            $('.userPasswordRepeat').removeClass("userPasswordRepeatNotValid");
            $('.userPassword').removeClass("userPasswordRepeatNotValid");
            $('.userPasswordRepeat').addClass("userPasswordRepeatValid");
            $('.userPassword').addClass("userPasswordRepeatValid");
            return true;
        }
    }

    


    