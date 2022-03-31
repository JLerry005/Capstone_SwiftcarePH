    // alert("Working!");
    const btnGetLocation =document.getElementById("getLocationButton");
    tippy(btnGetLocation, {
        content: "Get my current location",
    });

    let coordinates;
    btnGetLocation.onclick = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(console.log, console.log("Error"));

            // alert("Lat:"++)
        } else { 
            alert("Geolocation is not supported by this browser.");
        }
    }

    // flatpickr("input[type=datetime-local]", {});

    // var today = new Date();
    // var dd = String(today.getDate()).padStart(2, '0');
    // var mm = String(today.getMonth() + 1).padStart(2, '0');
    // var yyyy = today.getFullYear();

    // today = yyyy + '-' + mm + '-' + dd;
    // $('#date_picker').attr('min',today);




    // Date
    var today = new Date();
    // var numberOfDaysToAdd = parseInt(parts[0], 10);
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);

    // Check the date user picked
    let datePicked;
    $(function() {
        $("#date_picker").on("change",function(){
            datePicked = $(this).val();
            // alert(datePicked);
        });
    });

    // Anchor to booking form
    function anchor_to_form() {
        document.getElementById("booking-form-login-container").scrollIntoView();
    }

    // Get Booking Form
    getBookingForm();

    function getBookingForm() {
        let userID = document.getElementById("user-id-placeholder");
        let formContainer = document.getElementById("booking-form-container");
        let loginForBooking = document.getElementById("login-for-booking");

        if (userID) {
            formContainer.style.display = "block";
            loginForBooking.style.display = "none";
        }else{
            formContainer.style.display = "none";
            loginForBooking.style.display = "block";
        }
    }
    
    $("#btnBookingNow").click(function () {
        let firstName = document.getElementById("firstName").value;
        let lastName = document.getElementById("lastName").value;
        let date_picker = document.getElementById("date_picker").value;
        let time = document.getElementById("time").value;
        let phoneNumber = document.getElementById("phoneNumber").value;
        let email = document.getElementById("emailAddress").value;
        let concern = document.getElementById("concern").value;
        let specifyConcern = document.getElementById("specifyConcern").value;
        let hospitalName = document.getElementById("hospitalName").value;
        let reservationType = document.getElementById("reservationType").value;
        let listingID = document.getElementById("listingID").value;
        let userID = document.getElementById("user-id-placeholder").value;
        
        let referralValue = document.getElementById("referral-placeholder");

    // console.log(datePicked, phoneNumber, concern, hospitalName, listingID);

        // if picked date is invalid
        if (datePicked == today) {
            alertModalError().show();
            return;
        }
        
        // Run if referral is required
        else if (referralValue) {

            // Insert Details
            $.ajax({
                method: "POST",
                url: "includes/user-booking-form-inc.php",
                data: {
                firstName:firstName,
                lastName:lastName,
                date_picker:date_picker,
                time:time,
                phoneNumber:phoneNumber,
                email:email,
                concern:concern,
                specifyConcern:specifyConcern,
                hospitalName:hospitalName,
                reservationType:reservationType,
                listingID:listingID,
                userID:userID
                },
                success: function (response) {
                // window.location.href = "../index/success.php";
                    // Send image to server to process
                    const fileInput = document.getElementById("referralFilesInput");

                    let filePath = fileInput.value;
                    // Allowing file type
                    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                    const xhr = new XMLHttpRequest();
                    const formData = new FormData();

                    for (let file of fileInput.files) {
                        formData.append("images[]", file);
                    }   

                    let length = $(fileInput).get(0).files.length;
                    let finalLength = parseInt(length);

                    if (finalLength < 1) {  // If no files are selected
                        alert("Choose your file first!");
                        return false;
                    }
                    else if (!allowedExtensions.exec(filePath)) {  // if file type is not allowed
                        alert("File type not allowed!");
                        return false;
                    }
                    else if(finalLength > 10) {  // if max upload exceeded
                        alert("10 uploads lang!");
                        return false;
                    }else{   // if upload is valid
                        xhr.open("post", "includes/insert-referral-images.php");
                        xhr.send(formData);
                    }  
                }
            });     

            // While image is being uploaded
            // document.getElementById("fileInput").classList.add('disable-button');
            // document.getElementById("upload").classList.add('disable-button');
            // $("#upload-loader").show();

            // Complete function
            // xhr.addEventListener('readystatechange', function(e) {
            //     if( this.readyState === 4 ) {
            //         // document.getElementById("fileInput").classList.remove('disable-button');
            //         // document.getElementById("upload").classList.remove('disable-button');
            //         // $("#upload-loader").hide();
            //         // fileInput.value = '';
            //         // $("#upload-messasge").hide();

            //         // var x = document.getElementById("upload-success-toast");
            //         // x.className = "show";
            //         // setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            //         // show_details();
            //     }
            // });
        }

        // run if referral is not required
        else{
            $.ajax({
                method: "POST",
                url: "includes/user-booking-form-inc.php",
                data: {
                firstName:firstName,
                lastName:lastName,
                date_picker:date_picker,
                time:time,
                phoneNumber:phoneNumber,
                email:email,
                concern:concern,
                specifyConcern:specifyConcern,
                hospitalName:hospitalName,
                reservationType:reservationType,
                listingID:listingID,
                userID:userID
                },
                success: function (response) {
                // window.location.href = "../index/success.php";
                alert("Success!");
                }
            });
        }
    });



    // Lightgallery
    lightGallery(document.querySelector('.image-gallery'));

    // Show Alert Message Modal
    function alertModalError(){
        toggleModal('alertModal', true);
    }

    // Hide Alert Message Modal
    function btnClose(){
        toggleModal('alertModal', false);
    }

    // Enable and Disable Input
    $("#concern").change(function() {
        if ($(this).val() == "Covid") {
          $("#specifyConcern").attr("disabled", "disabled");
          document.getElementById("specifyConcern").required = false;
        } else {
          $("#specifyConcern").removeAttr("disabled");
          document.getElementById("specifyConcern").required = true;
        }
    }).trigger("change");
    
      let selectConcernInfo = document.getElementById("select-concern-info");
      let roomSlotInfo = document.getElementById("room-slot-info");
      let referralSlotInfo = document.getElementById("referral-slot-info");
      let cityinfo = document.getElementById("city-info");
      
      tippy(selectConcernInfo, {
          content: "Leave to zero (0) if there are no slots for Bed.",
      });