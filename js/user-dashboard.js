    alert("Working!");

    
    // let mainCards = document.getElementById("main-cards");
    // let reservations = document.getElementById("reservations-card");
    // let account = document.getElementById("account-card");
    // let reservationsContent = document.getElementById("reservations-content");
    // let accountContent = document.getElementById("account-content");
    // let reservationsBackToDashboard = document.getElementById("reservations-back-to-dashboard");
    // let accountBackToDashboard = document.getElementById("account-back-to-dashboard");
    // let sampleButton = document.getElementById("sampleButton");

    // ==========================================================


    // START LOAD MOBILE NUMBER
    let mobileContainer = document.getElementById("mobileNumber-container");
    let spinner = document.getElementById("spinner");
    let mobileNumber = document.getElementById("mobileNumber");

    load_phone();
    
    function load_phone() {
        $.ajax({
            method: "POST",
            url: "includes/load-userData-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $(mobileNumber).val(data);
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }

    // END LOAD MOBILE NUMBER

    // ==========================================================

    // START FIRST NAME
    let firstName = document.getElementById("firstName");

    load_firstname();
    
    function load_firstname() {
        $.ajax({
            method: "POST",
            url: "includes/load-firstname-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $(firstName).val(data);
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }

    // END FIRST NAME

    // ==========================================================

    // START FIRST NAME
    let lastName = document.getElementById("lastName");

    load_lastName();
    
    function load_lastName() {
        $.ajax({
            method: "POST",
            url: "includes/load-lastname-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $(lastName).val(data);
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }

    // END FIRST NAME

    // ==========================================================

    // let toolTip = new bootstrap.tooltip(sampleButton);
    
    // $('#sampleButton').tooltip();

    // var exampleEl = document.getElementById('sampleButton');
    // var tooltip = new bootstrap.Tooltip(exampleEl, options);
      
    // Reservations Card click Function
    // reservations.onclick = function () {
    //     $(mainCards).addClass("fadingOut");
        
    //     $(mainCards).toggle("slide", {direction: "left"}, function () {
    //         $(mainCards).removeClass("fadingOut");
    //         $(reservationsContent).addClass("fadeInAnimation");
    //         $(reservationsContent).show("slide", {direction: "right" },  function () {
    //             // $('#reservations-content').removeClass("fadeInAnimation"); 
    //         });
    //     });
    // }

    // Account Card click Function
    // account.onclick = function () {
    //     $(mainCards).addClass("fadingOut");
    //     $(mainCards).toggle("slide", {direction: "left"}, function () {
    //         $(mainCards).removeClass("fadingOut");

    //         $(accountContent).addClass("fadeInAnimation");
    //         $(accountContent).show("slide", {direction: "right" },  function () {
    //             // $('#reservations-content').removeClass("fadeInAnimation"); 
    //         });
    //     });
    // }

    // Back Button click Function
    // reservationsBackToDashboard.onclick = function () {
    //     // $(reservationsContent).removeClass("fadeInAnimation");
    //     $(accountContent).addClass("fadingOut");
    //     $(reservationsContent).hide("slide", {direction: "right" });
    //     $(mainCards).show("slide", {direction: "left" });
    // }

    // Back Button click Function
    // accountBackToDashboard.onclick = function () {
    //     $(accountContent).removeClass("fadeInAnimation");
    //     // $(reservationsContent).addClass("fadingOut");
    //     $(accountContent).hide("slide", {direction: "right" });
    //     $(mainCards).show("slide", {direction: "left" });
    // }

    // ==========================================================

    
    // START Edit Phone Number
    let phoneNumberInput = document.getElementById("mobileNumber");
    let editPhoneNumber = document.getElementById("edit-phone-number");
    
    phoneNumberInput.disabled = true;

    $(editPhoneNumber).click(function () {
        phoneNumberInput.disabled = false;
        $('#mobileNumber').focus();
        $(editPhoneNumber).hide();
        $('#save-phone-number').show();
    });
    
    $('#change-phone-form').submit( function (event) {
        event.preventDefault();
        let newPhoneNumberInput = $('#mobileNumber').val();
        let savePhoneNumber = $('#save-phone-number').val();
        let savePhoneSuccessMessage = $('#phone-success-message');

        $('#phone-success-message').load("includes/change-phone-inc.php", {
            newPhoneNumberInput: newPhoneNumberInput,
            savePhoneNumber: savePhoneNumber,
        }, function (statusTxt) {
            if (statusTxt == "Successfully Saved!") {
                $('#changes-made-toast').toast('show');
                $('#mobileNumber').focus();
                $('#mobileNumber').addClass("success-input").delay(1000).queue( function () {
                    $(this).removeClass("success-input");
                });
                
                $('#save-phone-number').hide();
                $(savePhoneSuccessMessage).fadeIn();
                $(savePhoneSuccessMessage).delay(1000).fadeOut('slow');
                $('#edit-phone-number').delay(2000).fadeIn();
                load_phone();
                phoneNumberInput.disabled = true;
            }
            if (statusTxt == "STMT FAILED!") {
                alert('Failed!');
                alert('There was an error!');
            }
        });

    });

    // END Edit Phone Number

    // ==========================================================

    // START VERIFY PASSWORD

    let btnEditPassword = document.getElementById("btn-edit-password");
    let verifyPasswordDiv = document.getElementById("verifyPassword-div");
    let editPasswordDiv = document.getElementById("editPassword-div");
    let btnEditPasswordNext = $('#btnEditPasswordNext');
    let newPassword = document.getElementById("new-password");
    let passwordRepeatDiv = document.getElementById("repeat-password-div");
    let newPasswordRepeat = document.getElementById("new-password-repeat");
    let btnSaveChanges = document.getElementById("btnSaveChanges");

    $('#btnEditPasswordNext').click( function () {
        event.preventDefault();
        
        let btnEditPasswordNext = $('#btnEditPasswordNext').val();
        let userPassword = $('#userPassword').val();

        $(".resultMessage").load("includes/userVerifyPassword-inc.php", {
            userPassword: userPassword,
            btnEditPasswordNext: btnEditPasswordNext,
        }, function (statusTxt) {
            if (statusTxt == "Correct Password!") {
                $(verifyPasswordDiv).hide();
                $(editPasswordDiv).fadeIn();
            }
            if (statusTxt == "Wrong Password!") {
                // alert("Wrong Password!");
            }
        });
    });

    // END VERIFY PASSWORD

    // ==========================================================

    // CREATE NEW PASSWORD START
    // newPassword.onkeyup = function () {

    //     if (newPassword.value.length >= 8) {
    //         // $(passwordRepeatDiv).fadeIn();
    //         btnSaveChanges.disabled = false;
    //     }
    //     else{
    //         $(passwordRepeatDiv).hide();
    //         btnSaveChanges.disabled = true;
    //     }
    // }

    // btnSaveChanges.disabled = true;
    // newPasswordRepeat.onkeyup = function () {
    //     if (newPasswordRepeat.value.length >= 8) {
    //         btnSaveChanges.disabled = false;
    //     }
    //     else{
    //         btnSaveChanges.disabled = true;
    //     }
    // }

    function reloads(){
        location.reload();
    }

    btnSaveChanges.onclick = function () {
        let newPassVal = document.getElementById("new-password").value;
        let newPassRepeatVal = document.getElementById("new-password-repeat").value;

        if (newPassVal != newPassRepeatVal) {
            $('#passMatchWarning').removeClass("passwordWarningMatched");
            $('#passMatchWarning').addClass("passwordWarningNotMatched");
            $('#passMatchWarning').text("Password didn't match!");
        }
        else if(newPassVal == newPassRepeatVal){
            if (newPassVal.length < 8) {
                $('#passMatchWarning').removeClass("passwordWarningMatched");
                $('#passMatchWarning').addClass("passwordWarningNotMatched");
                $('#passMatchWarning').text("Must be atleast 8 characters!");
            }
            else{
                $.ajax({
                    method: "POST",
                    url: "includes/insert-new-password-inc.php",
                    data: {newPassVal:newPassVal},
                    success: function (data) {
                        $(editPasswordDiv).fadeOut();
                        toggleModal('editPasswordModal', false);
                        toggleModal('successModal', true);
                    },
                    error: function (data, status) {
                        console.log(data);
                        console.log(status);
                    }
                });
            }
        }
    }

    function closeButtons(){
        location.reload();
        toggleModal('successModal', false);
    }

    // Toggle Verify Password
    $("#verifyTogglePass").click(function() {
        $(this).toggleClass("bi-eye bi-eye-slash");
        userPassword = $(this).parent().find("input.userPassword");

        if (userPassword.attr("type") == "password") {
            userPassword.attr("type", "text");
        } 
        
        else {
            userPassword.attr("type", "password");
        }
    });

    // Toggle New Password
    $("#newTogglePass").click(function() {
        $(this).toggleClass("bi-eye bi-eye-slash");
        newPassword = $(this).parent().find("input.newPassword");

        if (newPassword.attr("type") == "password") {
            newPassword.attr("type", "text");
        } 
        
        else {
            newPassword.attr("type", "password");
        }
    });

    // Toggle Repeat Password
    $("#repeatTogglePass").click(function() {
        $(this).toggleClass("bi-eye bi-eye-slash");
        newPasswordRepeat = $(this).parent().find("input.newPasswordRepeat");

        if (newPasswordRepeat.attr("type") == "password") {
            newPasswordRepeat.attr("type", "text");
        } 
        
        else {
            newPasswordRepeat.attr("type", "password");
        }
    });
