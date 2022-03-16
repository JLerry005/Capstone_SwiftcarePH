
    // alert("Working!");
    
    let phoneNumberInput = document.getElementById("phone-number-input");
    let editPhoneNumber = document.getElementById("edit-phone-number");
    

    phoneNumberInput.disabled = true;

    $('#edit-phone-number').click(function () {
        phoneNumberInput.disabled = false;
        $('#phone-number-input').focus();
        $('#edit-phone-number').hide();
        $('#save-phone-number').show();
    });

    $('#change-phone-number-form').submit( function (event) {
        event.preventDefault();
        let newPhoneNumberInput = $('#phone-number-input').val();
        let savePhoneNumber = $('#save-phone-number').val();
        let savePhoneSuccessMessage = $('#phone-success-message');

        $('#phone-success-message').load("includes/change-phone-inc.php", {
            newPhoneNumberInput: newPhoneNumberInput,
            savePhoneNumber: savePhoneNumber,
        }, function (statusTxt) {
            if (statusTxt == "Successfully Saved!") {
                $('#changes-made-toast').toast('show');
                $('#phone-number-input').focus();
                $('#phone-number-input').addClass("success-input").delay(3000).queue( function () {
                    $(this).removeClass("success-input");
                    next();
                });
                $('#save-phone-number').hide();
                $(savePhoneSuccessMessage).fadeIn();
                $(savePhoneSuccessMessage).delay(1000).fadeOut('slow');
                $('#edit-phone-number').delay(2000).fadeIn();
            }
            if (statusTxt == "STMT FAILED!") {
                alert('Failed!');
                alert('There was an error!');
            }
        });

    });


    // Verify Old Password - Ajax
    $("#btnEditPasswordNext").click(function (event) {
        event.preventDefault();
        let userPassword = $('#userPassword').val();
        let btnEditPasswordNext = $('#btnEditPasswordNext').val();

        $('.resultMessage').load("includes/userVerifyPassword-inc.php", {
            userPassword: userPassword,
            btnEditPasswordNext: btnEditPasswordNext,
        }, function (statusTxt) {
            if (statusTxt == "Correct Password!") {
                $('#edit-password').modal("hide");
                $('#edit-new-password').modal("show");
            }
            if (statusTxt == "Wrong Password!") {
                // alert("Wrong Password!");
            }
        });
        
    });

    // let newPassword = $('#new-password').val();
    let newPassword = document.getElementById("new-password");
    let newPasswordRepeat = document.getElementById("new-password-repeat");

    newPassword.onkeyup = function () {
        if (newPassword.value.length >= 8) {
            newPasswordRepeat.disabled = false;
        }
        else{
            newPasswordRepeat.disabled = true;
        }
    }

    $('#edit-new-password-form').submit(function (event) {
        event.preventDefault();
        let newPasswordValue = $('#new-password').val();
        let saveChanges = $('#btnSaveChanges').val();
        let resultToast = $('#result-toast');

        if (newPassword.value !== newPasswordRepeat.value) {
            alert("password did not match!");
        }
        else{
            $('#edit-new-password').modal("hide");
            $('#result-modal').load("includes/insert-new-password-inc.php", {
                newPasswordValue: newPasswordValue,
                saveChanges: saveChanges,
            }, function(statusTxt) {
                if (statusTxt == "Changes Saved!") {
                    $('#result-toast').toast('show');
                }
                if (statusTxt == "STMT FAILED!") {
                    $('#edit-new-password').modal("hide");
                }
            });
        }
        
        // let newPassword = $('#new-password').val();
        // let newPasswordRepeat = $('#new-password-repeat').val();

    });

    // $('#sample').click(function (){
    //     alert("Working!");
    // });