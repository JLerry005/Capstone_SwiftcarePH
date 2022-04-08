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
        validFirstName=/^[A-Za-z\s]+$/;
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
        validLastName=/^[A-Za-z\s]+$/;
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
        }
        else if (dateInput.value == '') {
            dateInput.classList.add('invalidInput');
            dateInputError.innerHTML="⚠️ Reservation date is required!";
            return false;
        }else{
            dateInputError.innerHTML="";
            dateInput.classList.remove('invalidInput');
            return true;
        }
    }

    // Validate Mobile Number
    function validateMobileNumber() {
        let mobileNumber = document.getElementById("phoneNumber");

        mobileNumberValue=mobileNumber.value.trim(); 
        validMobileNumber=/^[0-9]*$/;
        mobileNumberErr=document.getElementById('phoneNumber-error');

        if(mobileNumberValue==""){
            mobileNumber.classList.add('invalidInput');
            mobileNumberErr.innerHTML="⚠️ Mobile Number is required";
            return false;
        }
        else if(mobileNumberValue.length > 11 || mobileNumberValue.length < 10 ){
            mobileNumber.classList.add('invalidInput');
            mobileNumberErr.innerHTML="⚠️ Invalid Mobile number!";
            return false;
        }
        else if(!validMobileNumber.test(mobileNumberValue)){
            mobileNumber.classList.add('invalidInput');
            mobileNumberErr.innerHTML="⚠️ Invalid Mobile Number!";
            return false;
        }
        else{
          mobileNumberErr.innerHTML="";
          mobileNumber.classList.remove('invalidInput');
          return true;
        }
    }

    // Validate Email Address
    function validateEmail() {
        let emailInput = document.getElementById("emailAddress");

        emailAddressValue=emailInput.value.trim(); 
        validEmailAddress=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        emailAddressError=document.getElementById('emailAddress-error');

        if(emailAddressValue==""){
            emailInput.classList.add('invalidInput');
            emailAddressError.innerHTML="⚠️ Email Address is required!";
            return false;
        }
        else if(!validEmailAddress.test(emailAddressValue)){
            emailInput.classList.add('invalidInput');
            emailAddressError.innerHTML="⚠️ The Email Address you provided is invalid!";
            return false;
        }
        else{
            emailInput.classList.remove('invalidInput');
            emailAddressError.innerHTML="";
            return true;
        }  
    }

    // Validate Concern
    let concernInput = document.getElementById("concern");
    let specifyConcern = document.getElementById("specifyConcern");
    let concernInputError = document.getElementById("selecetConcern-error");
    let specifyConcernError = document.getElementById("specifyConcern-error");
    specifyConcernError.innerHTML="";
    specifyConcern.classList.add('disabled');
    // Enable and Disable Input
    $("#concern").change(function() {
        if ($(this).val() == "Covid") {
            specifyConcernError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
        }
        else if ($(this).val() == "Non-Covid") {
            specifyConcernError.innerHTML="Specify your concern here.";
            specifyConcern.classList.remove('disabled');
        }
    }).trigger("change");

    function validateConcern() {
        concernInputValue = concernInput.value;
        specifyConcernValue = specifyConcern.value;

        if (concernInputValue =='') {
            concernInput.classList.add('invalidInput');
            concernInputError.innerHTML="⚠️ Please select your Concern!";
            return false;
        }
        else if (concernInputValue == 'Covid') {
            specifyConcernError.innerHTML="";
            concernInputError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            concernInput.classList.remove('invalidInput');
            return true;
        }
        else if (concernInputValue == 'Non-Covid') {
            specifyConcern.classList.remove('disabled');

            if (specifyConcernValue == '') {
                specifyConcern.classList.add('invalidInput');
                specifyConcernError.innerHTML="⚠️ Please specify your concern!";
                return false;
            }
            else{
                specifyConcern.classList.remove('invalidInput');
                specifyConcernError.innerHTML="";
                return true;
            }
        }
    }
    // ------------------------------

    function validateReservationType() {
        let reservationType = document.getElementById("reservationType");
        let reservationTypeError = document.getElementById("reservationType-error");

        reservationTypeValue = reservationType.value;

        if (reservationTypeValue =='') {
            reservationType.classList.add('invalidInput');
            reservationTypeError.innerHTML="⚠️ Please select your Reservation Type!";
            return false;
        }else{
            reservationType.classList.remove('invalidInput');
            reservationTypeError.innerHTML="";
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
        
        let firstnameContainer = document.getElementById("firstnameContainer");
        firstnameContainer.innerHTML = firstName;

        let lastnameContainer = document.getElementById("lastnameContainer");
        lastnameContainer.innerHTML = lastName;

        let dateContainer = document.getElementById("dateContainer");
        dateContainer.innerHTML = date_picker;

        let timeContainer = document.getElementById("timeContainer");
        timeContainer.innerHTML = time;

        let phoneNuberContainer = document.getElementById("phoneNuberContainer");
        phoneNuberContainer.innerHTML = phoneNumber;

        let emailContainer = document.getElementById("emailContainer");
        emailContainer.innerHTML = email;

        let selectConcernContainer = document.getElementById("selectConcernContainer");
        selectConcernContainer.innerHTML = concern;

        let specifyConcernContainer = document.getElementById("specifyConcernContainer");
        specifyConcernContainer.innerHTML = specifyConcern;

        let hospitalNameContainer = document.getElementById("hospitalNameContainer");
        hospitalNameContainer.innerHTML = hospitalName;

        let reservationTypeContainer = document.getElementById("reservationTypeContainer");
        reservationTypeContainer.innerHTML = reservationType;

        if (!validateFirstname() || !validateLastname() || !invalidDate() || !validateMobileNumber() || !validateEmail() || !validateConcern() || !validateReservationType()) {
            return;
        }else{
            const btnSubmit = document.getElementById("submitButton");
            const btnCancel = document.getElementById("cancelButton");
            const reservationLoader = document.getElementById("reservation-loader");
            let referralValue = document.getElementById("referral-placeholder").value;
            // run if referral is not required
            if (!referralValue){
                $.ajax({
                    method: "POST",
                    url: "includes/get-booking-count-inc.php",
                    data: {userID:userID},
                    success: function (data) {
                        let pendingbookingsCount = parseInt(data);

                        // Check if pending reservations is == 5
                        if (pendingbookingsCount >= 5) {
                            alertModalError().show();
                            return;
                        }else {
                            toggleModal('reviewDetailsModal', true);

                            btnSubmit.onclick = function () {
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
                                    beforeSend: function () {
                                        btnSubmit.classList.add("disabled");
                                        btnCancel.classList.add("disabled");
                                        $(reservationLoader).show();
                                    },
                                    success: function (response) {
                                        toggleModal('reviewDetailsModal', false);
                                        $(reservationLoader).hide();
                                        window.location.replace('http://localhost/Capstone/reservation-success');
                                        return;
                                    }
                                }); 
                            }

                            btnCancel.onclick = function () {
                                toggleModal('reviewDetailsModal', false);
                            }
                        }
                    }
                });
            }

            // Run if referral is required
            else if (referralValue) {
                $.ajax({
                    method: "POST",
                    url: "includes/get-booking-count-inc.php",
                    data: {userID:userID},
                    success: function (data) {
                        let pendingbookingsCount = parseInt(data);

                        // Check if pending reservations is == 5
                        if (pendingbookingsCount >= 5) {
                            // alertModalError().show();
                            alert("Max Bookings Exceeded!");
                            return;
                        }else {
                            toggleModal('reviewDetailsModal', true);

                            btnSubmit.onclick = function () {
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
                                    beforeSend: function () {
                                        btnSubmit.classList.add("disabled");
                                        btnCancel.classList.add("disabled");
                                        $(reservationLoader).show();
                                    },
                                    success: function (response) {
                                        // Send image to server to process
                                        const fileInput = document.getElementById("referralFilesInput");

                                        let filePath = fileInput.value;
                                        // let filePath = document.getElementById("referralFilesInput");

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

                                            // Complete function
                                            xhr.addEventListener('readystatechange', function(e) {
                                                if( this.readyState === 4 ) {
                                                    $(reservationLoader).hide();                                                   
                                                    window.location.replace('http://localhost/Capstone/reservation-success');
                                                }
                                            });
                                        } 
                                        
                                        
                                    }
                                }); 
                            }

                            btnCancel.onclick = function () {
                                toggleModal('reviewDetailsModal', false);
                            }
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
    
    let selectConcernInfo = document.getElementById("select-concern-info");
    let roomSlotInfo = document.getElementById("room-slot-info");
    let referralSlotInfo = document.getElementById("referral-slot-info");
    let cityinfo = document.getElementById("city-info");
    
    tippy(selectConcernInfo, {
        content: "Leave to zero (0) if there are no slots for Bed.",
    });

    $("#getLocationButton").click(function(){
        toggleModal('reviewDetailsModal', true);
      });