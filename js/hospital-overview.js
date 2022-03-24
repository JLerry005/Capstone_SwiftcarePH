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

    var numberOfDaysToAdd = 2;

    var today = new Date();
    var dd = String(today.getDate()+numberOfDaysToAdd).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);

    



    // Lightgallery
    lightGallery(document.querySelector('.image-gallery'));
