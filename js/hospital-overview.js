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

    // Get Booking Form
    getBookingForm();
    function getBookingForm() {
        let listingID = document.getElementById("listingID").value;

        $.ajax({
            method: "POST",
            url: "includes/booking-form-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                document.getElementById("booking-form-container").innerHTML = data;
            }
        });
    }


    $("#btnBookingNow").click(function () {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    // let date_picker = document.getElementById("date_picker").value;
    let time = document.getElementById("time").value;
    let phoneNumber = document.getElementById("phoneNumber").value;
    let concern = document.getElementById("concern").value;
    let specifyConcern = document.getElementById("specifyConcern").value;
    let hospitalName = document.getElementById("hospitalName").value;
    let reservationType = document.getElementById("reservationType").value;
    let listingID = document.getElementById("listingID").value;
    
    // console.log(datePicked, phoneNumber, concern, hospitalName, listingID);

        if (datePicked == today) {
            // alert("You can't choose the date today!");
            alertModalError().show();
            return;
        }else{
           $.ajax({
               method: "POST",
               url: "includes/user-booking-form-inc.php",
               data: {
                firstName:firstName,
                lastName:lastName,
                datePicked:datePicked,
                time:time,
                phoneNumber:phoneNumber,
                concern:concern,
                specifyConcern:specifyConcern,
                hospitalName:hospitalName,
                reservationType:reservationType,
                listingID:listingID
               },
               success: function (response) {
                   
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