    // START TABS CONTENT FUNCTION

    function openCity(evt, admin) {

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        
        document.getElementById(admin).style.display = "block";
        evt.currentTarget.className += " active";
    }
    
    // END TABS CONTENT FUNCTION

    // START APPROVED REQUEST

    let spinner = document.getElementById("spinner");
    let pendingCardsContainer = document.getElementById("pending-cards-container");
    
    load_pending_cards();
    
    // window.setInterval(function() {
    //     load_pending_cards();
    //  }, 1000);

    // Function to load all pending cards.
    function load_pending_cards() {
        $.ajax({
            method: "POST",
            url: "includes/load-pending-list-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $('#pending-cards-container').show();
                $('#pending').html(data);
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }

    // Load Pending Cards full details.
    function showFullDetails(pending_id) {
        $('#pending-modal').modal("show");

        $.post("includes/pending-modal-inc.php",{pending_id:pending_id},
            function (data, status){
                let pendingID = JSON.parse(data);
                let hospitalName = (pendingID.pendingName);
                let currentID = (pendingID.pendingID);

                // let image_dir = (pendingID.image_dir);

                // Pass image_dir to get_image_dir function
                get_image_dir(currentID);

                // $("#images-container").html('<img src="'+image_dir+'" Height="100" width="100"></img>');

                $('#hospital-name').text(hospitalName);
                $('#modal-pending-id').text(pendingID.pendingID);
                $('#modal-pending-type').text(pendingID.pendingType);
                $('#modal-pending-address').text(pendingID.pendingAddress);
                $('#modal-pending-representative').text(pendingID.pendingRepresentativeName);
                $('#modal-pending-supervisor').text(pendingID.pendingSupervisorName);
                $('#modal-pending-phone').text(pendingID.pendingPhoneNumber);
                $('#modal-pending-designation').text(pendingID.pendingDesignation);
                $('#modal-pending-email').text(pendingID.pendingEmail);
                $('#modal-pending-password').text(pendingID.pendingPassword);
                $('#modal-pending-timestamp').text(pendingID.pendingTimestamp);
            });
    }

    function showImages(){
        $('#pending-modal').modal("hide");
        $('#modal-image').modal("show");
    }

    function backToPending() {
        $('#modal-image').modal("hide");
        $('#pending-modal').modal("show");
    }

    function hide_modal_images() {
        $('#modal-image').modal("hide");
    }
    
    // Show Images
    function get_image_dir(current_id){

        $("#attachments-gallery").html("");
        $.post("includes/get-image-inc.php", {current_id:current_id},
        function(data, status) {

            let fetchedData = JSON.parse(data);

            for(var i = 0; i < fetchedData.length; i++) {
                var obj = fetchedData[i];
            
                // console.log(obj.image_dir);
                // let image_directory = (obj.image_dir);
                // $("#images-container").append('<img src="'+(obj.image_dir)+'" height="100" width="100"></img>');
                $("#attachments-gallery").append('<a class="col-xl-3 mx-2 my-2 uploaded-hospital-images" onclick="hide_modal_images()" href="'+(obj.image_dir)+'"> <img class="card-img" alt="..." src="'+(obj.image_dir)+'" height="10%" width="10%"/>'+(obj.imageName)+'</a>');
            }
            let lg = document.getElementById('attachments-gallery');
            lg.addEventListener('onCloseAfter', function(){
                $('#modal-image').modal("show");
            }, false);
            lightGallery(lg);
        });
    }  

    // Accept Pending request
    function acceptPending() {
        let requestID = $('#modal-pending-id').text();
        let name = $('#hospital-name').text();
        let type = $('#modal-pending-type').text();
        let address = $('#modal-pending-address').text();
        let representative = $('#modal-pending-representative').text();
        let supervisor = $('#modal-pending-supervisor').text();
        let phone = $('#modal-pending-phone').text();
        let designation = $('#modal-pending-designation').text();
        let email = $('#modal-pending-email').text();
        let password = $('#modal-pending-password').text();
        let timestamp = $('#modal-pending-timestamp').text();

        $('#pending-modal').modal("hide");
        $('#modal-accept').modal("show");

        // Accept pending registration request
        $('#accept-modal-yes').click(function () {
            alert("The card will be transfer into Approved Section.");
            // alert("working!");
            $.post("includes/accept-request-inc.php", {
                requestID:requestID,
                name:name,
                type:type,
                address:address,
                representative:representative,
                supervisor:supervisor,
                phone:phone,
                designation:designation,
                email:email,
                password:password,
                timestamp:timestamp
            },
                function (data, status) {
                    // let pendingID = JSON.parse(data);
                    $('#modal-accept').modal("hide");
                    location.reload()
                    load_pending_cards();
                });
        });

        $('#accept-modal-cancel').click(function () {
            $('#modal-accept').modal("hide");
            $('#pending-modal').modal("show");
        });
    }

    // Reject Pending Request.
    function rejectPending() {
        let requestID = $('#modal-pending-id').text();
        let name = $('#hospital-name').text();
        let type = $('#modal-pending-type').text();
        let address = $('#modal-pending-address').text();
        let representative = $('#modal-pending-representative').text();
        let supervisor = $('#modal-pending-supervisor').text();
        let phone = $('#modal-pending-phone').text();
        let designation = $('#modal-pending-designation').text();
        let email = $('#modal-pending-email').text();
        let password = $('#modal-pending-password').text();
        let timestamp = $('#modal-pending-timestamp').text();

        $('#pending-modal').modal("hide");
        $('#modal-reject').modal("show");

        $('#reject-modal-cancel').click(function () {
            $('#modal-reject').modal("hide");
            $('#pending-modal').modal("show");
        });

        $("#reject-modal-yes").click(function () {
            // alert("Working!");
            $.post("includes/reject-request-inc.php",{
                requestID:requestID,
                name:name,
                type:type,
                address:address,
                representative:representative,
                supervisor:supervisor,
                phone:phone,
                designation:designation,
                email:email,
                password:password,
                timestamp:timestamp
            }, function (data, status) {
                // let pendingID = JSON.parse(data);
                $('#modal-reject').modal("hide");
                alert("The card will be transfer into Rejected Section.");
                location.reload();
                load_pending_cards();
            });
        });
    }

    // // END PENDING REQUEST

    // ==========================================================

    // // START APPROVED REQUEST
    
    load_approved_cards();
    
    function load_approved_cards() {
        $.ajax({
            method: "POST",
            url: "includes/load-approved-list-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $('#approved-cards-container').hide();
                $('#approved').html(data);
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }
   
    function approvedFullDetails(ID) {
        $('#approved-modal').modal("show");

        $.post("includes/approved-modal-inc.php",{ID:ID},
            function (data, status){
                let ID = JSON.parse(data);
                let approvedHospital = (ID.hospitalName);
           
                $('#approved-hospital-name').text(approvedHospital);
                $('#modal-approved-id').text(ID.ID);
                $('#modal-approved-type').text(ID.hospitalType);
                $('#modal-approved-address').text(ID.hospitalAddress);
                $('#modal-approved-representative').text(ID.representativeName);
                $('#modal-approved-supervisor').text(ID.supervisorName);
                $('#modal-approved-phone').text(ID.phoneNumber);
                $('#modal-approved-designation').text(ID.designation);
                $('#modal-approved-email').text(ID.email);
                $('#modal-approved-timestamp').text(ID.timestamp);
            });
    }

    // function undoApproved() {
    //     let requestID = $('#modal-approved-id').text();
    //     let name = $('#approved-hospital-name').text();
    //     let type = $('#modal-approved-type').text();
    //     let address = $('#modal-approved-address').text();
    //     let representative = $('#modal-approved-representative').text();
    //     let supervisor = $('#modal-approved-supervisor').text();
    //     let phone = $('#modal-approved-phone').text();
    //     let designation = $('#modal-approved-designation').text();
    //     let email = $('#modal-approved-email').text();
    //     let timestamp = $('#modal-approved-timestamp').text();

    //     $('#approved-modal').modal("hide");
    //     $('#modal-undo-approved').modal("show");

    //     // Accept pending registration request
    //     $('#undo-modal-yes-approved').click(function(){
    //         // alert("working!");
    //         $.post("includes/undo-approved-inc.php", {
    //             requestID:requestID,
    //             name:name,
    //             type:type,
    //             address:address,
    //             representative:representative,
    //             supervisor:supervisor,
    //             phone:phone,
    //             designation:designation,
    //             email:email,
    //             timestamp:timestamp,
    //         },
            
    //         function (data, status) {
    //             // let pendingID = JSON.parse(data);
                
    //             $('#modal-undo-approved').modal("hide");
    //             alert("The card will be back into Pending Section.");
    //             location.reload()
    //             load_approved_cards();
    //         });

    //     });

    //     $('#undo-modal-cancel-approve').click(function () {
    //         $('#modal-undo-approved').modal("hide");
    //         $('#approved-modal').modal("show");
    //     });
    // }

    

    // // END APPROVED REQUEST

    // // ==========================================================
    
    // // START REJECTED REQUEST

    load_rejected_cards();
    
    function load_rejected_cards() {
        $.ajax({
            method: "POST",
            url: "includes/load-rejected-list-inc.php",
            beforeSend: function () {
                $(spinner).show();
            },
            success: function (data) {
                $('#rejected').html(data);               
                $('#rejected-cards-container').hide;
            },
            complete: function (data) {
                $(spinner).hide();
            },
        });
    }

    function rejectedFullDetails(ID) {
        $('#rejected-modal').modal("show");

        $.post("includes/rejected-modal-inc.php",{ID:ID},
            function (data, status){
                let ID = JSON.parse(data);
                let rejectedHospitalname = (ID.rejectedName);
                
                $('#rejected-hospital-name').text(rejectedHospitalname);
                $('#modal-rejected-id').text(ID.ID);
                $('#modal-rejected-type').text(ID.rejectedType);
                $('#modal-rejected-address').text(ID.rejectedAddress);
                $('#modal-rejected-representative').text(ID.representativeName);
                $('#modal-rejected-supervisor').text(ID. rejectedSupervisor );
                $('#modal-rejected-phone').text(ID.rejectedphoneNumber);
                $('#modal-rejected-designation').text(ID.rejectedDesignation);
                $('#modal-rejected-email').text(ID.rejectedEmail);
                $('#modal-rejected-timestamp').text(ID.rejectTimestamp);
            });
    }

    // function undoRejected() {
    //     let requestID = $('#modal-rejected-id').text();
    //     let name = $('#rejected-hospital-name').text();
    //     let type = $('#modal-rejected-type').text();
    //     let address = $('#modal-rejected-address').text();
    //     let representative = $('#modal-rejected-representative').text();
    //     let supervisor = $('#modal-rejected-supervisor').text();
    //     let phone = $('#modal-rejected-phone').text();
    //     let designation = $('#modal-rejected-designation').text();
    //     let email = $('#modal-rejected-email').text();
    //     let timestamp = $('#modal-rejected-timestamp').text();

    //     $('#rejected-modal').modal("hide");
    //     $('#modal-undo-rejected').modal("show");

    //     // Accept pending registration request
    //     $('#undo-modal-yes-rejected').click(function () {
    //         // alert("working!");
    //         $.post("includes/undo-rejected-inc.php", {
    //             requestID:requestID,
    //             name:name,
    //             type:type,
    //             address:address,
    //             representative:representative,
    //             supervisor:supervisor,
    //             phone:phone,
    //             designation:designation,
    //             email:email,
    //             timestamp:timestamp,
    //         },
    //             function (data, status) {
    //                 // let pendingID = JSON.parse(data);
                    
    //                 $('#modal-undo-rejected').modal("hide");
    //                 location.reload()
    //                 load_approved_cards();
    //             });
    //     });

    //     $('#undo-modal-cancel').click(function () {
    //         $('#modal-undo-rejected').modal("hide");
    //         $('#rejected-modal').modal("show");
    //     });
    // }
   
    // END REJECTED REQUEST
