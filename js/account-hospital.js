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
                $("#hospital-location").val(fetchedData.hospitalAddress);
                $("#hospital-email").val(fetchedData.email);
                $("#hospital-phoneNumber").val(fetchedData.phoneNumber);
            }
        });
    }

    