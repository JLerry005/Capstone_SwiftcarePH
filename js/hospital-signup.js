    let userPass = document.getElementById("password");
    let userPassRepeat = document.getElementById("repeatPassword");

    let minimumChar = document.getElementById("minimumChar");
    let passMatchWarning = document.getElementById("passMatchWarning");
    let btnSignup = document.getElementById("btnSignup");

    let passwordInput = document.getElementById("password");
    let repeatPasswordInput = document.getElementById("repeatPassword");

    // function clearStorageForNewSignup() {
    //     localStorage.clear();
    // }

    userPassRepeat.disabled = true;
    // check if password matches
    userPass.onkeyup = function() {
        if(userPass.value.length < 1) {
            $('#passMatchWarning').hide();
        }

        if (userPass.value.length > 1) {
            $('#passMatchWarning').show();
        }

        if(userPass.value.length >= 8) {
            userPassRepeat.disabled = false;
            minimumChar.style.display = "block";
            minimumChar.classList.remove("invalidInput");
            minimumChar.classList.add("validInput");
            } else {
            userPassRepeat.disabled = true;
            minimumChar.classList.remove("validInput");
            minimumChar.classList.add("invalidInput");
        }


        if (userPass.value != userPassRepeat.value) {
            // alert("Password Didn't Match!");
            $('#passMatchWarning').removeClass("passwordWarningMatched");
            $('#passMatchWarning').addClass("passwordWarningNotMatched");
                $('#passMatchWarning').text("Password doesn't match!");
            // return false;
        }

        else {
            // alert("Password Matched!");
            $('#passMatchWarning').addClass("passwordWarningMatched");
            $('#passMatchWarning').text("Password matched!");
            // return true;
        }
    }

    userPassRepeat.onkeyup = function() {

        if (userPass.value != userPassRepeat.value) {
            
            $('#passMatchWarning').removeClass("passwordWarningMatched");
            $('#passMatchWarning').addClass("passwordWarningNotMatched");
            $('#passMatchWarning').show();
                $('#passMatchWarning').text("Password doesn't match!");
        }

        else if (userPass.value == userPassRepeat.value) {
            $('#passMatchWarning').removeClass("passwordWarningNotMatched");
            $('#passMatchWarning').addClass("passwordWarningMatched");
            $('#passMatchWarning').show();
            $('#passMatchWarning').text("Password matched!");
            return true;
        }
    }

    // Submit Button
    btnSignup.onclick = function (e) {
        if (userPass.value != userPassRepeat.value) {
            e.preventDefault();
            alert("Password Did not Match!");
            $('.userPasswordRepeat').addClass("userPasswordRepeatNotValid");
            $('.userPassword').addClass("userPasswordRepeatNotValid");
        }

        else{

            clearStorageForNewSignup();

            $('.userPasswordRepeat').removeClass("userPasswordRepeatNotValid");
            $('.userPassword').removeClass("userPasswordRepeatNotValid");
            $('.userPasswordRepeat').addClass("userPasswordRepeatValid");
            $('.userPassword').addClass("userPasswordRepeatValid");
            return true;
        }
    }

     // Toggle User Password
     $("#togglePassword").click(function() {
        // alert("Working");
        $(this).toggleClass("bi-eye bi-eye-slash");
        passwordInput = $(this).parent().find("input.passwordInput");

        if (passwordInput.attr("type") == "password") {
            passwordInput.attr("type", "text");
        } 
        
        else {
            passwordInput.attr("type", "password");
        }
    });

    // Toggle Repeat User Password
    $(".toggleRepeatPassword").click(function() {
        $(this).toggleClass("bi-eye bi-eye-slash");
        repeatPasswordInput = $(this).parent().find("input.repeatPasswordInput");

        if (repeatPasswordInput.attr("type") == "password") {
            repeatPasswordInput.attr("type", "text");
        } 
        
        else {
            repeatPasswordInput.attr("type", "password");
        }
    });

    // Validate Image file Upload
    // $("#btnSignup").click( function () {
    //     const hospitalID = $("#hospitalID").val();
    //     const hospitalPermit = $("#hospitalPermit").val();
    //     const doctorLicense = $("#doctorLicense").val();

    //     if(hospitalID == '' && hospitalPermit == '' && doctorLicense == ''){  
    //         alert("Please Select Image");  
    //         return false;  
    //     }

    //     else{  
    //         var extension = $('.imageInput').val().split('.').pop().toLowerCase();  
    //         if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
    //         {  
    //                 alert('Invalid Image File');  
    //                 $('.imageInput').val('');  
    //                 return false;  
    //         }  
    //     }
    // });
