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
    var numberOfDaysToAdd = 2;
    var dd = String(today.getDate()+numberOfDaysToAdd).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);

    // Lightgallery
    lightGallery(document.querySelector('.image-gallery'));

    function bookModal(){
        toggleModal('bookFormModal', true);
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