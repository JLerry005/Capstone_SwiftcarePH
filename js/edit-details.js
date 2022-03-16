    // alert('Working!');



    get_details();
    disableForm();

    function disableForm() {
        document.getElementById("main-container").disabled = true;
    }
    function get_details() {
        $.ajax({
            method: "GET",
            url: "includes/get-listing-details-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show().fadeIn(300);
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                let fetchedData = JSON.parse(data);

                // function showToast() {

                //     var x = document.getElementById("success-toast");
                //     x.className = "show";
                //     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            
                // }

                (fetchedData);

                $("#hospital-name").val(fetchedData.hospital_name);
                $("#hospital-location").val(fetchedData.hospital_location);
                $("#hospital-description").val(fetchedData.hospital_description);
                $("#hospitalType").val(fetchedData.hospital_type);
                $("#website-link").val(fetchedData.website_link);
                $("#room-slot").val(fetchedData.room_slot);
                $("#bed-slot").val(fetchedData.bed_slot);

                // Checkbox
                let bedCheckBox = (fetchedData.bed);
                let roomCheckBox = (fetchedData.room);
                let requireDocs = (fetchedData.additional_docs);

                // Check if bedCheckBox has value
                if (bedCheckBox == "Bed") {
                    document.getElementById("hospital-bed").checked = true;
                }else if(bedCheckBox == ""){
                    document.getElementById("hospital-bed").checked = false;
                }

                // Check if roomCheckBox has value
                if (roomCheckBox == "Room") {
                    document.getElementById("hospital-room").checked = true;
                }else if(roomCheckBox == ""){
                    document.getElementById("hospital-room").checked = false;
                }

                // Check if additional docs has value
                if (requireDocs == "Yes") {
                    document.getElementById("require-documents").checked = true;
                }else if(requireDocs == "no"){
                    document.getElementById("require-documents").checked = false;
                }
            }
        });

        $("#image-gallery").html("");

        // Get Images
        $.ajax({
            method: "GET",
            url: "includes/get-hospital-images-inc.php",
            success: function (data, status) {

                let fetchedImages = JSON.parse(data);

                for(var i = 0; i < fetchedImages.length; i++) {
                    var obj = fetchedImages[i];
                    console.log(obj);                
                    $("#image-gallery").append('<a href="Capstone/'+(obj.image_dir)+'"> <img class="card-img" alt="..." src="Capstone/'+(obj.image_dir)+'" height="20%" width="20%"/>'+(obj.image_name)+'</a>');
                }

                // lightGallery(document.getElementById("#image-gallery"));
                let lg = document.getElementById('image-gallery');

                lg.addEventListener('onCloseAfter', function(){
                    // $('#modal-image').modal("show");
                }, false);
                lightGallery(lg);
            }
        });
    }

    function refreshDetails() {
        get_details();
    }





    