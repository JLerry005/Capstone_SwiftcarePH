
    // alert("working!");
    let userMobileNumber = $('#userMobileNumber').val();
    let userPassword = $('#userPassword').val();
    let submit = $('#submit');

    $('#submit').click(function (event) {
        event.preventDefault();

        $.ajax({
            method: "POST",
            url: "includes/user-login-inc.php",
            data: {userMobileNumber:userMobileNumber, userPassword:userPassword, submit:submit},
            beforeSend: function () {
                alert("Success!");
                $('.login-spinners').show();
            },
            success: function (response) {
                $('.login-spinners').hide();
            },
            error: function () {
                alert("Error!");
            }
        });
    });
        
