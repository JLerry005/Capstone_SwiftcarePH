    // Google Maps ----------------------------------------------------------------
    const btnGetLocation =document.getElementById("getLocationButton");
    tippy(btnGetLocation, {
        content: "Get my current location",
    });

    let coordinates;
    btnGetLocation.onclick = function (event) {
        event.preventDefault();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(console.log, console.log("Error"));

            // alert("Lat:"++)


        } else { 
            alert("Geolocation is not supported by this browser.");
        }
    }


    let stringLat;
    let stringLng;
    getLatLong();
    function getLatLong() {
        let listingID = document.getElementById("listingID").value;

        $.ajax({
            method: "GET",
            url: "includes/get-hospital-location.php",
            data: {listingID:listingID},
            success: function (data) {
                let fetchedData = JSON.parse(data);
                let stringLat = fetchedData.lat;
                let stringLng = fetchedData.lng;

                initMap(stringLat, stringLng)

                // document.getElementById("lat").value = stringLat;
                // document.getElementById("lng").value = stringLng;
                // hospitalLat = parseFloat(stringLat);
                // hospitalLng = parseFloat(stringLng);

                // console.log("Your Lat: "+hospitalLat);
                // console.log("Your Long: "+hospitalLng);
                // console.log(stringCoords);
            }
        });
    }

    function initMap(myLat, myLng) {

        let finalLat = parseFloat(myLat);
        let finalLng = parseFloat(myLng);

        console.log(finalLat);
        console.log(finalLng);

        let lat = 14.5764;
        let lng = 121.0851;

        let pointB = {
            lat: finalLat,
            lng: finalLng
        }

        var pointA = {
            lat: lat,
            lng: lng
            },

            myOptions = {
                zoom: 7,
                center: pointB,
                // componentRestrictions: { country: ["ph"] },
                // fields: ["address_components", "geometry", "icon", "name"],
                // types: ["address"]
            },

            map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),

            // Instantiate a directions service.
            directionsService = new google.maps.DirectionsService,
            directionsDisplay = new google.maps.DirectionsRenderer({
                map: map,
                draggable: true,

                // panel: document.getElementById("panel")
            }),

            markerA = new google.maps.Marker({
                position: pointA,
                title: "point A",
                label: "A",
                map: map,
                draggable: true
            }),

            markerB = new google.maps.Marker({
                position: pointB,
                title: "point B",
                label: "B",
                map: map,
            });

        // get places auto-complete when user type in location-text-box
        var input = /** @type {HTMLInputElement} */
            (
            document.getElementById('user-location'));
            
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        // var infowindow = new google.maps.InfoWindow();
            
        // Event listener for Directions Dragging
        directionsDisplay.addListener("directions_changed", () => {
            const directions = directionsDisplay.getDirections();

            if (directions) {
                computeTotalDistance(directions);
            }
        });

        geocodePosition(markerA.getPosition());

        // add dragend Event Listener to Marker -- Not Working
        google.maps.event.addListener(markerA, 'dragend', function () {
            map.setCenter(markerA.getPosition());
            geocodePosition(markerA.getPosition());

            // Hide Previous Marker
            markerA.setVisible(false);
            markerB.setVisible(false);

            pointA.lat = markerA.getPosition().lat();
            pointA.lng = markerA.getPosition().lng();

            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
        });

        // Add click event listener to map
        google.maps.event.addListener(map, 'click', function(event) {
            markerA.setPosition(event.latLng);
            map.setCenter(markerA.getPosition());
            geocodePosition(markerA.getPosition());

            // Hide Previous Marker
            markerA.setVisible(false);
            markerB.setVisible(false);

            pointA.lat = markerA.getPosition().lat();
            pointA.lng = markerA.getPosition().lng();

            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
        });
            
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            // Hide Previous Marker
            markerA.setVisible(false);
            markerB.setVisible(false);

            var enteredLoc = autocomplete.getPlace();
            
            // var from_address = enteredLoc.formatted_address;
            // // $('#origin').val(from_address);
            // document.getElementById("destination").value = from_address;
            if (!enteredLoc.geometry) {
                return;
            }
            
            // If the place has a geometry, then present it on a map.
            if (enteredLoc.geometry.viewport) {
                map.fitBounds(enteredLoc.geometry.viewport);
            } 
            else {
                map.setCenter(enteredLoc.geometry.location);
                map.setZoom(17); // Why 17? Because it looks good.
            }

            markerA.setPosition(enteredLoc.geometry.location);
            pointA.lat = markerA.getPosition().lat();
            pointA.lng = markerA.getPosition().lng();

            console.log(pointA);

            calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB, markerA);

            // document.getElementById("lat").value = marker.getPosition().lat();
            // document.getElementById("lng").value = marker.getPosition().lng();

            var address = '';
            if (enteredLoc.address_components) {
                address = [
                    (enteredLoc.address_components[0] && enteredLoc.address_components[0].short_name || ''), (enteredLoc.address_components[1] && enteredLoc.address_components[1].short_name || ''), (enteredLoc.address_components[2] && enteredLoc.address_components[2].short_name || '')
                ].join(' ');
            }
            
        });
        
        // Show Driving hours and Distance in km
        function computeTotalDistance(result) {
            let total = 0;
            let duration;
            const myroute = result.routes[0];

            if (!myroute) {
                return;
            }

            for (let i = 0; i < myroute.legs.length; i++) {
                total += myroute.legs[i].distance.value;
                duration = myroute.legs[i].duration.text;
            }

            total = total / 1000;
            document.getElementById("distance-container").innerHTML = total + " km";
            document.getElementById("duration-container").innerHTML = duration;

        }

        // Marker Position
        function geocodePosition(pos) {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                    latLng: pos
                },
                function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        document.getElementById("user-location").value = results[0].formatted_address;
                    }else{
                        //
                    }
                }
            );
        }

        // display directions
        function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination, markerA) {
            directionsService.route({
                origin: origin,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            }, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    // let durationContainer = document.getElementById("duration-container");
                    // durationContainer.innerHTML = response.routes[0].legs[0].duration.text;
                    // directionsService.distance(response);
                    // directionsService.duration(response);

                } else {
                    // window.alert('Directions request failed due to ' + status);
                }
            });
        }
    }

    window.addEventListener('load', (event) => {
        initialize();
    });

    function initialize() {
        initMap();
    }

    // ------------------------------------------------------------------------------------------


    const btnBurgerButton = document.getElementById("hamburger-button");
    const sidebar = document.querySelector('.mobileMenu');
    const closeMenu = document.getElementById("btn-close-menu");
    let contentsContainer = document.querySelector('.main-container');

    btnBurgerButton.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
    });

    closeMenu.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
    });


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
    // let concernInput = document.getElementById("concern");
    // let specifyConcern = document.getElementById("specifyConcern");
    // let specifyConcernCovid = document.getElementById("specifyConcernCovid");
    // let concernInputError = document.getElementById("selecetConcern-error");
    // let specifyConcernError = document.getElementById("specifyConcern-error");

    // specifyConcernError.innerHTML="";
    // specifyConcernCovid.classList.add('disabled');
    // $(specifyConcern).hide();
    
    // Enable and Disable Input
    // $("#concern").change(function() {
    //     if ($(this).val() == "Covid") {
    //         specifyConcernError.innerHTML="";
    //         $(specifyConcern).hide();
    //         specifyConcernCovid.classList.remove('disabled');
    //         $(specifyConcernCovid).show();
    //         specifyConcernError.innerHTML="Specify your concern here.";
    //     }
        // else if ($(this).val() == "Covid - Severe") {
        //     specifyConcernError.innerHTML="";
        //     $(specifyConcern).hide();
        //     specifyConcernCovid.classList.remove('disabled');
        //     $(specifyConcernCovid).show();
        //     specifyConcernError.innerHTML="Specify your concern here.";
        // }
        // else if ($(this).val() == "Covid - Asymptomatic") {
        //     specifyConcernError.innerHTML="";
        //     $(specifyConcern).hide();
        //     specifyConcernCovid.classList.remove('disabled');
        //     $(specifyConcernCovid).show();
        //     specifyConcernError.innerHTML="Specify your concern here.";

        // }
    //     else if ($(this).val() == "Non - Covid") {
    //         specifyConcernError.innerHTML="Specify your concern here.";
    //         $(specifyConcern).show();
    //         $(specifyConcernCovid).hide();
    //     }
    // }).trigger("change");

     // Validate Concern
     let concernInput = document.getElementById("concern");
     let specifyConcern = document.getElementById("specifyConcern");
     let concernInputError = document.getElementById("selecetConcern-error");
     let specifyConcernError = document.getElementById("specifyConcern-error");
     specifyConcernError.innerHTML="";
     specifyConcern.classList.add('disabled');
     let hiddenvariable = document.getElementById("hidden-variable");
     // Enable and Disable Input
     $("#concern").change(function() {
         if ($(this).val() == "Asymptomatic") {
            specifyConcern.value = '';
            specifyConcernError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            hiddenvariable.value = "Covid";
            console.log(hiddenvariable.value);
         }
         else if ($(this).val() == "Mild-to-moderate") {
            specifyConcernError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            hiddenvariable.value = "Covid";
            console.log(hiddenvariable.value);
        }
        else if ($(this).val() == "Severe") {
            specifyConcernError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            hiddenvariable.value = "Covid";
            console.log(hiddenvariable.value);
        }
        else if ($(this).val() == "Critical") {
            specifyConcernError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            hiddenvariable.value = "Covid";
            console.log(hiddenvariable.value);
        }
         else if ($(this).val() == "Non-Covid") {
             specifyConcernError.innerHTML="Specify your concern here.";
             specifyConcern.classList.remove('disabled');
             hiddenvariable.value = "Non-Covid";
             console.log(hiddenvariable.value);
            
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

        else if (concernInputValue == 'Asymptomatic') {
            specifyConcernError.innerHTML="";
            concernInputError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            concernInput.classList.remove('invalidInput');
            return true;
        }

        else if (concernInputValue == 'Mild-to-moderate') {
            specifyConcernError.innerHTML="";
            concernInputError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            concernInput.classList.remove('invalidInput');
            return true;
        }

        else if (concernInputValue == 'Severe') {
            specifyConcernError.innerHTML="";
            concernInputError.innerHTML="";
            specifyConcern.classList.add('disabled');
            specifyConcern.classList.remove('invalidInput');
            concernInput.classList.remove('invalidInput');
            return true;
        }

        else if (concernInputValue == 'Critical') {
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

    // Validate Images
    function validateImages() {
        // Send image to server to process
        const fileInput = document.getElementById("referralFilesInput");

        let filePath = fileInput.value;
        // let filePath = document.getElementById("referralFilesInput");

        const xhr = new XMLHttpRequest();
        const formData = new FormData();

        // Allowing file type
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

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
        }
        else{
            // reservationType.classList.remove('invalidInput');
            // reservationTypeError.innerHTML="";
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
        let severity  = document.getElementById("hidden-variable").value;
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
        selectConcernContainer.innerHTML = hiddenvariable.value+' - '+concern;

        let specifyConcernContainer = document.getElementById("specifyConcernContainer");
        specifyConcernContainer.innerHTML = specifyConcern;

        let hospitalNameContainer = document.getElementById("hospitalNameContainer");
        hospitalNameContainer.innerHTML = hospitalName;

        let reservationTypeContainer = document.getElementById("reservationTypeContainer");
        reservationTypeContainer.innerHTML = reservationType;

        let referralValue = document.getElementById("referral-placeholder").value;
        if (referralValue) {
            if (!validateImages()) {
                return;
            } 
        }
        if (!validateFirstname() || !validateLastname() || !invalidDate() || !validateMobileNumber() || !validateEmail() || !validateConcern() || !validateReservationType()) {
            return;
        }else{
            const btnSubmit = document.getElementById("submitButton");
            const btnCancel = document.getElementById("cancelButton");
            const bookingModalBody = document.getElementById("booking-modal-body");
            const reservationLoader = document.getElementById("reservation-loader");
            
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
                                        severity:severity,
                                        specifyConcern:specifyConcern,
                                        hospitalName:hospitalName,
                                        reservationType:reservationType,
                                        listingID:listingID,
                                        userID:userID
                                    },
                                    beforeSend: function () {
                                        btnSubmit.classList.add("disabled");
                                        btnCancel.classList.add("disabled");
                                        bookingModalBody.classList.add("disabled-blurred");
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
                                    severity:severity,
                                    specifyConcern:specifyConcern,
                                    hospitalName:hospitalName,
                                    reservationType:reservationType,
                                    listingID:listingID,
                                    userID:userID
                                    },
                                    beforeSend: function () {
                                        btnSubmit.classList.add("disabled");
                                        btnCancel.classList.add("disabled");
                                        bookingModalBody.classList.add("disabled-blurred");
                                        $(reservationLoader).show();
                                    },
                                    success: function (response) {
                                        // Send image to server to process
                                        const fileInput = document.getElementById("referralFilesInput");

                                        // let filePath = fileInput.value;
                                        // let filePath = document.getElementById("referralFilesInput");

                                        // Allowing file type
                                        // let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

                                        const xhr = new XMLHttpRequest();
                                        const formData = new FormData();

                                        for (let file of fileInput.files) {
                                            formData.append("images[]", file);
                                        }

                                        // if upload is valid
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