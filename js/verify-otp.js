    // Code Expiration Timer
    var interval;
    let minutes = 1;
    let currentTime = localStorage.getItem('currentTime');
    let targetTime = localStorage.getItem('targetTime');
    let expired = false;

    if (targetTime == null && currentTime == null) {
    currentTime = new Date();
    targetTime = new Date(currentTime.getTime() + (minutes * 300000));
    localStorage.setItem('currentTime', currentTime);
    localStorage.setItem('targetTime', targetTime);
    }
    else{
        currentTime = new Date(currentTime);
        targetTime = new Date(targetTime);
    }

    if(!checkComplete()){
        interval = setInterval(checkComplete, 1000);
    }

    function checkComplete() {
        if (currentTime > targetTime) {
            clearInterval(interval);
            expired = true;
            // alert("Time is up");
            // $("#alert-container").html("<b>Your code has expired!</b>");
        } 
        else {
            currentTime = new Date();
            expired = false;
            console.log("\n <font color=\"white\"> Seconds Remaining:" + ((targetTime - currentTime) / 1000) + "</font>");
            
            // document.write(
            // "\n <font color=\"white\"> Seconds Remaining:" + ((targetTime - currentTime) / 1000) + "</font>");
        }
    }

    document.onbeforeunload = function(){
        // localStorage.setItem('currentTime', currentTime);
        localStorage.removeItem(currentTime);
    }
    // ----------------------------------


    // Send new Code
    $("#send-new-code").click(function () {
        // alert("Working!");
        localStorage.clear();
        // $("#header-title").text("We have sent you a new code. Please enter the new code below.");
        
        // $.ajax({
        //     method: "POST",
        //     url: "PHPMailer/send-new-otp.php",
        //     // data: $('#otp-form').serialize(),
        //     // dataType: "text",
        //     success: function (response) {
        //         if (response == "We sent you a new Code.") {
        //             alert(response);
        //             $("#new-code-container").show();
        //             $("#new-code-message").text(response);
        //         }
        //     }
        // });
    });

    $("#new-signup").click(function () {
        localStorage.clear();
    });
    
    // -------------------------


    // Verify entered Code
    let otpCode = $('#otp-code').val();

    $('#submit').click(function (e) {
        e.preventDefault();
        // alert("Working!");

        if (expired == true) {
            // alert("Time is up");
            $('#code-expired').text("Code Expired! Please try sending a new code.");
        }
        else{

            $.ajax({
                method: "POST",
                url: "includes/verify-otp-inc.php",
                data: $('#otp-form').serialize(),
                dataType: "text",
                success: function (response) {
                    if (response == "Code Matched! Congrats!") {
                        // window.location = "http://localhost/tailwindDemo/loader";
                        // if (requestedNewCode) {
                        //     $("#header-title").html("<b>We have sent you a new code. Please enter the new code below.</b>");
                        // }
                        localStorage.clear();
                        window.location.replace('http://localhost/Capstone/index');
                    }
                    else if(response == "Code Did not match! Sorry!!") {
                        // $('#loading-message').hide();
                        // $('#loading-message').show();
                        $('#wrong-code').text(response);
                    }
                    // else if(response == "Code Expired!") {
                    //     $('#loading-message').text(response);
                    // }
                    // $('#loading-message').text(response);
    
    
                    // function redirect() {
                    //     window.location = "../index.php";
                    // }
                    // redirect();
                    // return;
                },
                error:function(xhr, status, error){
                    alert(xhr.responseText);
                    $('#loading-message').text(response);
                },
            });

        }
    })