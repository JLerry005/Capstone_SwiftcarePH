    // alert('Working!');

    get_details();
    function get_details() {
        $.ajax({
            method: "GET",
            url: "includes/get-account-details-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show().fadeIn(300);
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                let fetchedData = JSON.parse(data);

                console.log(fetchedData);

                $("#hospital-name").val(fetchedData.hospitalName);
                $("#hospital-email").val(fetchedData.email);
                $("#hospital-phoneNumber").val(fetchedData.phoneNumber); 

                $("#hospital-location").val(fetchedData.hospitalAddress);
                $("#hospital-representative").val(fetchedData.representativeName);
                $("#hospital-designation").val(fetchedData.designation);
                $("#hospital-supervisor").val(fetchedData.supervisorName);
            }
        });
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("btn-editPassword");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }