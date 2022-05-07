    // Toggle Login Password
    $("#passwordToggle").click(function() {

        $(this).toggleClass("bi-eye bi-eye-slash");
        userPasswordToggle = $(this).parent().find("input.userPassword");

        if (userPasswordToggle.attr("type") == "password") {
            userPasswordToggle.attr("type", "text");
        } 
        
        else {
            userPasswordToggle.attr("type", "password");
        }
    });