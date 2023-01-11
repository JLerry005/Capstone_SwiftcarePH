    // Skeleton Loader
    $("#skeleton-loader").hide();

    get_contents();
    function get_contents() {
        $.ajax({
            method: "GET",
            url: "includes/reservations-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show().fadeIn(300);
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                let fetchedData = JSON.parse(data);

                console.log(fetchedData);

                $("#user-name").text(fetchedData.hospitalName);
                // $("#password").val(fetchedData.password);
            }
        });
    }