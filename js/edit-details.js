    // alert('Working!');

    get_details();
    // disableForm();
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

                console.log (fetchedData);

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

                // if (document.getElementById("hospital-room").checked) {
                //     alert("hospital Room is checke!");
                // }
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
                    $("#image-gallery").append('<a href="'+(obj.image_dir)+'" class="xl:col-span-2 w-64 h-64 hover:scale-105 transition duration-200"> <img id="'+(obj.image_id)+'" class="card-img" alt="..." src="'+(obj.image_dir)+'"/>'+(obj.image_name)+'</a> ');
                }

                // lightGallery(document.getElementById("#image-gallery"));
                let lg = document.getElementById('image-gallery');

                // lg.addEventListener('onCloseAfter', function(){
                //     // $('#modal-image').modal("show");
                // }, false);
                lightGallery(lg);
            },
        });   
    }
    // Refresh Button
    function refreshDetails() {
        get_details();
    }

    $("#submit").click(function (e) {
        e.preventDefault();

        // alert("Working");
        let location = $('#hospital-location').val();
        let description = $('#hospital-description').val();
        let room = $('#hospital-room').val();
        let roomSlot = $('#room-slot').val();
        let bed = $('#hospital-bed').val();
        let bedSlot = $('#bed-slot').val();
        let refferal = $('#require-documents').val();
        let websiteLink = $('#website-link').val();

        $.ajax({
            type: 'POST',
            url: 'includes/add-listing-inc.php',
            data: {
                location:location,
                description:description,
                roomSlot:roomSlot,
                bedSlot:bedSlot,
                websiteLink:websiteLink,
                room:$('#hospital-room:checkbox:checked').val(),
                bed:$('#hospital-bed:checkbox:checked').val(),
                refferal:$('#require-documents:checkbox:checked').val()
            },
            beforeSend: function () {
                document.getElementById("main-container").classList.add('cursor-not-allowed', 'disable-form');
            },
            success: function(data) {
                var x = document.getElementById("success-toast");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            },
            complete: function () {
                document.getElementById("main-container").classList.remove('cursor-not-allowed', 'disable-form');
            }
        });
    });

    // Check if File if empty
    // $('input[type=file]').change(function(){
    //     if($('input[type=file]').val()==''){
    //         $('#submit-images').attr('disabled',true)
    //     } 
    //     else{
    //       $('#submit-images').attr('disabled',false);
    //     }
    // });

    $('#images:file').change(function(){
            if ($(this).val()) {
                $('#submit-images').attr('disabled',false);
                // or, as has been pointed out elsewhere:
                // $('input:submit').removeAttr('disabled'); 
            } 
        }
    );

        

   

    