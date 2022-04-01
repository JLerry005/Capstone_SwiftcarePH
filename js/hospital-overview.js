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

    // Run Validate Functions
    function validateInputs() {

        // return validateFirstname() && validateLastname() && invalidDate();

        // if (validateFirstname() && validateLastname() && invalidDate()) {
        //     return true;
        // }else{
        //     return false;
        // }
    }

    // Validate Firstname
    function validateFirstname() {
        let firstName = document.getElementById("firstName"); 

        firstNameValue=firstName.value.trim(); 
        validFirstName=/^[A-Za-z]+$/;
        firstNameError=document.getElementById("firstName-error");

        if(firstNameValue==""){
            firstName.classList.add('invalidInput');
            firstNameError.innerHTML="⚠️ Firstname is required!";
            return false;
        }
        else if(!validFirstName.test(firstNameValue)){
            firstName.classList.add('invalidInput');
            firstNameError.innerHTML="⚠️ Firstname must not contain any Numbers or Special Characters!";
            return false;
        }
        else{
            firstNameError.innerHTML="";
            firstName.classList.remove('invalidInput');
            return true;   
        }
    }

    // Validate Lastname
    function validateLastname() {
        let lastName = document.getElementById("lastName"); 

        lastNameValue=lastName.value.trim(); 
        validLastName=/^[A-Za-z]+$/;
        lastNameError=document.getElementById("lastName-error");

        if(firstNameValue==""){
            lastName.classList.add('invalidInput');
            lastNameError.innerHTML="⚠️ Firstname is required!";
            return false;
        }
        else if(!validLastName.test(lastNameValue)){
            lastName.classList.add('invalidInput');
            lastNameError.innerHTML="⚠️ Lastname must not contain any Numbers or Special Characters!";
            return false;
        }
        else{
            lastNameError.innerHTML="";
            lastName.classList.remove('invalidInput');
            return true;   
        }
    }

    // if picked date is invalid
    function invalidDate() {
        let dateInput = document.getElementById("date_picker"); 
        let dateInputError = document.getElementById("dateInput-error"); 

        if (datePicked == today) {
            dateInput.classList.add('invalidInput');
            dateInputError.innerHTML="⚠️ You can't choose the Date today!";
            return false;
        }else{
            dateInputError.innerHTML="";
            dateInput.classList.remove('invalidInput');
            return true;
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
        
        if (!validateFirstname() || !validateLastname() || !invalidDate()) {
            return;
        }else{
            // Run if referral is required
            if (referralValue) {
                $.ajax({
                    method: "POST",
                    url: "includes/get-booking-count-inc.php",
                    data: {userID:userID},
                    success: function (data) {
                        let pendingbookingsCount = parseInt(data);

                        console.log(pendingbookingsCount);

                        // Check if pending reservations is == 5
                        if (pendingbookingsCount >= 5) {
                            // alertModalError().show();
                            alert("Max Bookings Exceeded!");
                            return;
                        }else {
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
                                    alert("Success!");
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
                        }
                    }
                });            
            }

            // run if referral is not required
            else{
                $.ajax({
                    method: "POST",
                    url: "includes/get-booking-count-inc.php",
                    data: {userID:userID},
                    success: function (data) {
                        let pendingbookingsCount = parseInt(data);

                        alert("Success!");

                        // Check if pending reservations is == 5
                        if (pendingbookingsCount >= 5) {
                            alertModalError().show();
                            return;
                        }else {
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
                                    alert("Success");
                                }
                            }); 
                        }
                    }
                }); 
            }
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