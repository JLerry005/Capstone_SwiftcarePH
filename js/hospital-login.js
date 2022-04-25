    // Toggle Login Password
    $("#passwordToggle").click(function() {

        $(this).toggleClass("bi-eye bi-eye-slash");
        hospitalPasswordToggle = $(this).parent().find("input.passwordInput");

        if (hospitalPasswordToggle.attr("type") == "password") {
            hospitalPasswordToggle.attr("type", "text");
        } 
        
        else {
            hospitalPasswordToggle.attr("type", "password");
        }
    });