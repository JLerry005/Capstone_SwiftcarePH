    // alert("Working!");
    
    // Get Skeleton Loader and Dashboard contents container.
    let skeletonLoader = document.getElementById("skeleton-loader");

    // Hide Skeleton Loader
    $("#skeleton-loader").hide();
    
    // Load Dashbord First
    show_dashboard();

    // Show Dashboard When Dashboard Button is clicked.
    function show_dashboard(){
        $.ajax({
            method: "GET",
            url: "includes/reservations-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show();
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                $(".tab-contents").hide();
                $('#dashboardContent').show();
                window.scrollTo(0, 0);

                let fetchedData = JSON.parse(data);

                $("#user-name").text(fetchedData.hospitalName);
            }
        });
    }

    // Show Pending List
    showPendingReservations();
    function showPendingReservations() {
        let pendingListContainer = document.getElementById("pending-cards-container");
        let listingID = document.getElementById("listingID").value;

        pendingListContainer.innerHTML = "";
        $.ajax({
            method: "POST",
            url: "includes/pending-reservations-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                pendingListContainer.innerHTML = data;
            }
        });
    }

    // Filter Pending Reservations
    const btnPendingCovid = document.getElementById("btn-pendingCovid");
    const btnPendingNonCovid = document.getElementById("btn-pendingNonCovid");

    // Filter Covid
    btnPendingCovid.onclick = function () {
        let pendingListContainer = document.getElementById("pending-cards-container");
        let listingID = document.getElementById("listingID").value;

        pendingListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-pending-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                pendingListContainer.innerHTML = data;
            }
        });
    }

    // Filter Non Covid
    btnPendingNonCovid.onclick = function () {
        let pendingListContainer = document.getElementById("pending-cards-container");
        let listingID = document.getElementById("listingID").value;

        pendingListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-pending-non-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                pendingListContainer.innerHTML = data;
            }
        });
    }

    // Show All
    const btnShowAllPending = document.getElementById("btn-show-all-pending");

    btnShowAllPending.onclick = function () {
        showPendingReservations();
    }

    moveToCompleted();
    function moveToCompleted() {
        let listingID = document.getElementById("listingID").value;

        $.ajax({
            method: "POST",
            url: "includes/move-to-completed-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                showCompletedReservations();
                showUpcomingReservations();
            }
        });
    }

    moveToExpired();
    function moveToExpired() {
        let listingID = document.getElementById("listingID").value;

        $.ajax({
            method: "POST",
            url: "includes/move-to-expired-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                showPendingReservations();
            }
        });
    }

    // Show Upcoming List
    showUpcomingReservations();
    function showUpcomingReservations() {
        let upcomingListContainer = document.getElementById("upcoming-cards-container");
        let listingID = document.getElementById("listingID").value;

        upcomingListContainer.innerHTML = "";
        $.ajax({
            method: "POST",
            url: "includes/upcoming-reservations-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                upcomingListContainer.innerHTML = data;
            }
        });
    }

    // Search From Upcoming Reservations
    let searchInput = document.getElementById("inp-search-upcoming");
    let upcomingContainer = document.getElementById("upcoming-cards-container");

    searchInput.onkeyup = function () {
        let searchInputVal = document.getElementById("inp-search-upcoming").value;

        if (searchInputVal !="") {
            $.ajax({
                type: "GET",
                url: "includes/search-upcoming-reservations.php",
                data: {searchInputVal:searchInputVal},
                success: function (data) {
                    upcomingContainer.innerHTML = data;
                    // console.log(data);
                }
            });
        }else{
            upcomingContainer.innerHTML = "";
            showUpcomingReservations();
        }
    }

    // Filter Upcoming Reservations
    const btnUpcomingCovid = document.getElementById("btn-upcomingCovid");
    const btnUpcomingNonCovid = document.getElementById("btn-upcomingNonCovid");

    // Filter Covid
    btnUpcomingCovid.onclick = function () {
        let upcomingListContainer = document.getElementById("upcoming-cards-container");
        let listingID = document.getElementById("listingID").value;

        upcomingListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-upcoming-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                upcomingListContainer.innerHTML = data;
            }
        });
    }

    // Filter Non Covid
    btnUpcomingNonCovid.onclick = function () {
        let upcomingListContainer = document.getElementById("upcoming-cards-container");
        let listingID = document.getElementById("listingID").value;

        upcomingListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-upcoming-non-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                upcomingListContainer.innerHTML = data;
            }
        });
    }

    // Show All
    const btnShowAllUpcoming = document.getElementById("btn-show-all-upcoming");

    btnShowAllUpcoming.onclick = function () {
        showUpcomingReservations();
    }
    
    // Show Completed List
    showCompletedReservations();
    function showCompletedReservations() {
        let completedListContainer = document.getElementById("completed-cards-container");
        let listingID = document.getElementById("listingID").value;

        completedListContainer.innerHTML = "";
        $.ajax({
            method: "POST",
            url: "includes/completed-reservations-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                completedListContainer.innerHTML = data;
            }
        });
    }

    // Filter Completed Reservations
    const btnCompletedCovid = document.getElementById("btn-completedCovid");
    const btnCompletedNonCovid = document.getElementById("btn-completedNonCovid");
    const btnCompletedSuccessful = document.getElementById("btn-completedSuccessful");
    const btnCompletedUnsuccessful = document.getElementById("btn-completedUnsuccessful");

    // Filter Covid
    btnCompletedCovid.onclick = function () {
        let completedListContainer = document.getElementById("completed-cards-container");
        let listingID = document.getElementById("listingID").value;

        completedListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-completed-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                completedListContainer.innerHTML = data;
            }
        });
    }

    // Filter Non Covid
    btnCompletedNonCovid.onclick = function () {
        let completedListContainer = document.getElementById("completed-cards-container");
        let listingID = document.getElementById("listingID").value;

        completedListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-completed-non-covid.php",
            data: {listingID:listingID},
            success: function (data) {
                completedListContainer.innerHTML = data;
            }
        });
    }

    // Filter Covid
    btnCompletedSuccessful.onclick = function () {
        let completedListContainer = document.getElementById("completed-cards-container");
        let listingID = document.getElementById("listingID").value;

        completedListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-completed-success.php",
            data: {listingID:listingID},
            success: function (data) {
                completedListContainer.innerHTML = data;
            }
        });
    }

    // Filter Non Covid
    btnCompletedUnsuccessful.onclick = function () {
        let completedListContainer = document.getElementById("completed-cards-container");
        let listingID = document.getElementById("listingID").value;

        completedListContainer.innerHTML = "";
        $.ajax({
            method: "GET",
            url: "includes/get-completed-unsuccess.php",
            data: {listingID:listingID},
            success: function (data) {
                completedListContainer.innerHTML = data;
            }
        });
    }

    // Show All
    const btnShowAllCompleted = document.getElementById("btn-show-all-completed");

    btnShowAllCompleted.onclick = function () {
        showCompletedReservations();
    }

    showAllRejectedExpired()
    function showAllRejectedExpired() {
        let rejectedContainer = document.getElementById("rejected-cards-container");
        let listingID = document.getElementById("listingID").value;

        rejectedContainer.innerHTML = "";
        $.ajax({
            method: "POST",
            url: "includes/rejected-reservations-inc.php",
            data: {listingID:listingID},
            success: function (data) {
                rejectedContainer.innerHTML = data;
            }
        });
    }

    // get pending count
    getPendingCount();
    function getPendingCount() {
        let pendingCountContainer = document.getElementById("pendingCountContainer");
        let listingID = document.getElementById("listingID").value;
        $.ajax({
            method: "GET",
            url: "includes/get-pending-reservations-count.php",
            data: {listingID:listingID},
            success: function (data) {
                pendingCountContainer.innerHTML = data;
            }
        });
    }

    // get upcoming count
    getUpcomingCount();
    function getUpcomingCount() {
        let upcomingCountContainer = document.getElementById("upcomingCountContainer");
        let listingID = document.getElementById("listingID").value;
        $.ajax({
            method: "GET",
            url: "includes/get-upcoming-reservations-count.php",
            data: {listingID:listingID},
            success: function (data) {
                upcomingCountContainer.innerHTML = data;
            }
        });
    }

    // get completed count
    getCompletedCount();
    function getCompletedCount() {
        let completedCountContainer = document.getElementById("completedCountContainer");
        let listingID = document.getElementById("listingID").value;
        $.ajax({
            method: "GET",
            url: "includes/get-completed-reservations-count.php",
            data: {listingID:listingID},
            success: function (data) {
                completedCountContainer.innerHTML = data;
            }
        });
    }

    // Toggle the Pending Container
    function togglePending() {
        $("#pending-cards-container").toggle(340);
        $(".pending-icon").toggleClass("ri-arrow-up-s-line ri-arrow-down-s-line");  

        // let toggleButton = document.getElementById("btn-toggle-pending");
        // if (toggleButton.innerHTML === "Show Less ∧ "){
        //     toggleButton.innerHTML = "Show Full ∨";
        // } else {
        //     toggleButton.innerHTML = "Show Less ∧";
        // }
    }

    // Toggle the Upcoming Container
    function toggleUpcoming(){
        $("#upcoming-cards-container").toggle(340);
        $(".upcoming-icon").toggleClass("ri-arrow-up-s-line ri-arrow-down-s-line");  
    }

    // Toggle the History Container
    function toggleHistory(){
        $("#completed-cards-container").toggle(340);
        $(".history-icon").toggleClass("ri-arrow-up-s-line ri-arrow-down-s-line");  
    }

    // Toggle the Upcoming Container
    function toggleRejected(){
        $("#rejected-cards-container").toggle(340);
        $(".rejected-icon").toggleClass("ri-arrow-up-s-line ri-arrow-down-s-line");  
    }

    // Dashboard Refresh Button
    function refreshDashboard() {
        show_dashboard();
        showPendingReservations();
        moveToCompleted();
        showUpcomingReservations();
        showCompletedReservations();
        getPendingCount();
        getUpcomingCount();
        getCompletedCount();
    }
    
    function show_details() {
        // Get Listing Data
        $.ajax({
            method: "GET",
            url: "includes/get-listing-details-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show();
            },
            success: function (data, status) {
                $("#skeleton-loader").hide();
                $(".tab-contents").hide();
                $("#editDetailsContent").show();
                window.scrollTo(0, 0);

                let fetchedData = JSON.parse(data);

                $("#hospital-name").val(fetchedData.hospital_name);
                $("#hospital-location").val(fetchedData.hospital_location);
                $("#hospital-description").val(fetchedData.hospital_description);
                $("#hospital-city").val(fetchedData.hospital_city);
                $("#hospitalType").val(fetchedData.hospital_type);
                $("#website-link").val(fetchedData.website_link);
                $("#room-slot").val(fetchedData.room_slot);
                $("#bed-slot").val(fetchedData.bed_slot);

                // Checkbox
                let requireDocs = (fetchedData.additional_docs);

                // Check if additional docs has value
                if (requireDocs == "Yes") {
                    document.getElementById("require-documents").checked = true;
                }else if(requireDocs == "no"){
                    document.getElementById("require-documents").checked = false;
                }
            }
        });
       
        // Get Images
        $.ajax({
            method: "GET",
            url: "includes/get-hospital-images-inc.php",
            success: function (data, status) {
                let fetchedImages = JSON.parse(data);

                // if (fetchedImages.length == 0) {
                //     $("#no-images-message").html('<p class="text-slate-500 text-lg text-center"><i class="bi bi-emoji-frown-fill"></i> No Images found!</p>');
                // }

                $("#image-gallery").html("");
                for(var i = 0; i < fetchedImages.length; i++) {
                    var obj = fetchedImages[i];             
                    $("#image-gallery").append('<a href="Capstone/'+(obj.image_dir)+'" class="relative fetched-image xl:col-span-1 rounded-lg border-solid bg-gray-900 border-2 border-gray-900 hover:scale-105 transition duration-200"><img id="'+(obj.image_id)+'" class="card-img w-full h-48 rounded-md" alt="..." src="Capstone/'+(obj.image_dir)+'"/></a>');
                    // $("$image-gallery").append('<button id="'+(obj.image_id)+'" class="p-2 rounded bg-red-500 text-white absolut z-10">Delete</button>');
                }
                let lg = document.getElementById('image-gallery');
                lightGallery(lg);

            }
        });   
      
    }

    // Hospital Room Slot | Show and Hide Function
    $(document).ready(function () {
        $('#hospital-room').change(function () {
            if (!this.checked) 
                $('#room-slot').fadeOut();
            else 
                $('#room-slot').fadeIn();
        });
    });

    // Hospital Bed Slot | Show and Hide Function
    $(document).ready(function () {
        $('#hospital-bed').change(function () {
            if (!this.checked) 
                $('#bed-slot').fadeOut();
            else 
                $('#bed-slot').fadeIn();
        });
    });



    // Get Updated Image list for edit images modal
    function getUpdatedImages() {
        $("#image-modal-body").html("");
        $.ajax({
            method: "GET",
            url: "includes/get-hospital-images-inc.php",
            success: function (data, status) {
                let fetchedImages = JSON.parse(data);

                if (fetchedImages.length == 0) {
                    $("#image-modal-body").html('<p class="col-span-6 text-slate-400 text-lg text-center"><i class="bi bi-emoji-frown-fill"></i> No Images found!</p>');
                }
                else{
                    for (let i = 0; i < fetchedImages.length; i++) {
                        let data = fetchedImages[i];
                        let imageId = (data.image_id);
                        let imageDir = (data.image_dir);
                        
                        let imageContainer = $('<div class="p-5 rounded-md bg-Yellow col-span-1"><button class="p-2 rounded-md bg-red-500 text-white">Delete</button><img src="Capstone/'+(data.image_dir)+'" /></div>');
                        imageContainer.find('button').on('click', () => deleteImage(imageId));
                        $('#image-modal-body').append(imageContainer); 
                        
                        function deleteImage(imageId) {
                            toggleModal('editImagesModal', false);
                            toggleModal('confirm-delete', true);
    
                            $("#btn-confirm-delete").click(function () {
                                $.ajax({
                                    type: 'POST',
                                    url: 'includes/delete-hospital-image-inc.php',
                                    data: {imageId:imageId, imageDir:imageDir},
                                    success: function(data, textStatus, xhr) {
                                        toggleModal('confirm-delete', false);
                                        show_details();
                                        toggleModal('editImagesModal', true);
                                        
                                        // location.reload();
                                    }
                                });
                            });   
                        }       
                    }
                } 
            }
        });
    }


    // Show Edit Images Modal
    $("#edit-images").click(function () {
        $("#image-modal-body").html("");
        toggleModal('editImagesModal', true);
        
        $.ajax({
            method: "GET",
            url: "includes/get-hospital-images-inc.php",
            success: function (data, status) {
                let fetchedImages = JSON.parse(data);

                if (fetchedImages.length == 0) {
                    $("#image-modal-body").html('<p class="col-span-6 text-slate-400 text-lg text-center"><i class="bi bi-emoji-frown-fill"></i> No Images found!</p>');
                }
                else{
                    for (let i = 0; i < fetchedImages.length; i++) {
                        let data = fetchedImages[i];
                        let imageId = (data.image_id);
                        let imageDir = (data.image_dir);
    
                        let imageContainer = $('<div class="p-5 rounded-md bg-Yellow col-span-1"><button class="p-2 rounded-md bg-red-500 text-white">Delete</button><img src="Capstone/'+(data.image_dir)+'" /></div>');
                        imageContainer.find('button').on('click', () => deleteImage(imageId));
                        $('#image-modal-body').append(imageContainer); 
                        
                        function deleteImage(imageId) {
                            toggleModal('editImagesModal', false);
                            toggleModal('confirm-delete', true);
    
                            $("#btn-confirm-delete").click(function () {
                                $.ajax({
                                    type: 'POST',
                                    url: 'includes/delete-hospital-image-inc.php',
                                    data: {imageId:imageId, imageDir:imageDir},
                                    success: function(data, textStatus, xhr) {
                                        show_details();
                                        getUpdatedImages();
                                        toggleModal('confirm-delete', false);
                                        
                                        toggleModal('editImagesModal', true);
                                        
                                        // location.reload();
                                    }
                                });
                            });   
                        }       
                    }
                }  
            }
        });
    });

    // Cancel Delete
    function cancelDelete() {
        toggleModal('confirm-delete', false);
        toggleModal('editImagesModal', true);
    }
    // Close Edit Images Modal
    function buttonClose(){
        toggleModal('editImagesModal', false);
    }

    // Upload Images
    const fileInput = document.getElementById("fileInput");
    const uploadButton = document.getElementById("upload");

    uploadButton.addEventListener("click", function () {
     
        let filePath = fileInput.value;
        // Allowing file type
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        
        $.ajax({
            method: "GET",
            url: "includes/get-image-count-inc.php",
            success: function (data, status) {
                let imageCountFromDB = parseInt(data);

                if (imageCountFromDB > 10) {
                    document.getElementById("upload-messasge").innerHTML = "";
                    document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Max. Upload exceeded!";
                    show_details();
                    return false;
                }else{
                    const xhr = new XMLHttpRequest();
                    const formData = new FormData();
                    
                    for (let file of fileInput.files) {
                        formData.append("images[]", file);
                    }

                    let length = $(fileInput).get(0).files.length;
                    let finalLength = parseInt(length);

                    let totalUploads = finalLength + imageCountFromDB;

                    if (finalLength < 1) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Please select an image first!";
                        show_details();
                        return false;
                    }
                    else if (!allowedExtensions.exec(filePath)) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Invalid File Format!";
                        fileInput.value = '';
                        show_details();
                        return false;
                    }
                    else if(finalLength > 10) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Max. of 10 images per upload only!";
                        show_details();
                        return false;
                    }
                    else if (totalUploads > 10) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> You've reached the max. number of uploads! Delete some images if you want to upload more.";
                        show_details();
                        return false;
                    }
                    else{
                        // Send image to server to process
                        xhr.open("post", "includes/insert-hospital-images-inc.php");
                        xhr.send(formData);

                        // While image is being uploaded
                        document.getElementById("fileInput").classList.add('disable-button');
                        document.getElementById("upload").classList.add('disable-button');
                        $("#upload-loader").show();

                        // Complete function
                        xhr.addEventListener('readystatechange', function(e) {
                            if( this.readyState === 4 ) {
                                document.getElementById("fileInput").classList.remove('disable-button');
                                document.getElementById("upload").classList.remove('disable-button');
                                $("#upload-loader").hide();
                                fileInput.value = '';
                                $("#upload-messasge").hide();

                                var x = document.getElementById("upload-success-toast");
                                x.className = "show";
                                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                                show_details();
                            }
                        });
                    }
                }
            }
        });
    });

    // Submit Listing Details Changes
    function submitDetails(event) {
        event.preventDefault();
        let location = $('#hospital-location').val();
        let description = $('#hospital-description').val();
        let city = $('#hospital-city').val();
        let room = $('#hospital-room').val();
        let roomSlot = $('#room-slot').val();
        let bed = $('#hospital-bed').val();
        let bedSlot = $('#bed-slot').val();
        let refferal = $('#require-documents').val();
        let websiteLink = $('#website-link').val();
        // let hospitalCity = $('hospital-city').val();

        $.ajax({
            type: 'POST',
            url: 'includes/add-listing-inc.php',
            data: {
                location:location,
                description:description,
                city:city,
                roomSlot:roomSlot,
                bedSlot:bedSlot,
                websiteLink:websiteLink,
                hospitalCity:$('#hospital-city option:selected').val(),
                room:$('#hospital-room:checkbox:checked').val(),
                bed:$('#hospital-bed:checkbox:checked').val(),
                refferal:$('#require-documents:checkbox:checked').val()
            },
            beforeSend: function () {
            },
            success: function(data) {
                var x = document.getElementById("success-toast");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                // show_details(); 
            }
        });
    }

    // Refresh Button
    function refreshEditDetails() {
        show_details();
    }
    
    // Show Account When Dashboard Button is clicked.
    // let accountContent = document.getElementById("accountContent").innerHTML;
    function show_account() {
        window.scrollTo(0, 0);
        // document.getElementById("content-container").innerHTML ="";
        // document.getElementById("content-container").innerHTML =accountContent;

        get_account_details();
        function get_account_details() {
            $.ajax({
                method: "GET",
                url: "includes/get-account-details-inc.php",
                beforeSend: function () {
                    $("#skeleton-loader").show();
                },
                success: function (data, status) {
                    $("#skeleton-loader").hide();
                    $(".tab-contents").hide();
                    $("#accountContent").show();
                    let fetchedData = JSON.parse(data);

                    $("#account-hospital-name").val(fetchedData.hospitalName);
                    $("#hospital-email").val(fetchedData.email);
                    $("#hospital-phoneNumber").val(fetchedData.phoneNumber); 
                    $("#account-hospital-location").val(fetchedData.hospitalAddress);
                    $("#hospital-representative").val(fetchedData.representativeName);
                    $("#hospital-designation").val(fetchedData.designation);
                    $("#hospital-supervisor").val(fetchedData.supervisorName);
                }
            });
        }

    }

    // $("#myModal").modal("show");
    // $('#myModal').on('hidden.bs.modal', function () {
    //     $('#myModal form')[0].reset();
    //     });

    function ShowModal() {
        toggleModal('editPassModal', true);

        let btnEditPassword = document.getElementById("btn-edit-password");
        let verifyPasswordDiv = document.getElementById("verifyPassword-div");
        let editPasswordDiv = document.getElementById("editPassword-div");
        let btnEditPasswordNext = $('#btnEditPasswordNext');
        let newPassword = document.getElementById("newPassword");
        let passwordRepeatDiv = document.getElementById("repeat-password-div");
        let newPasswordRepeat = document.getElementById("newPasswordRepeat");
        let btnSaveChanges = document.getElementById("btnSaveChanges");
        let editModal = document.getElementById("editPassModal");

        // START VERIFY PASSWORD

        $('#btnEditPasswordNext').click( function (event) {
            event.preventDefault();
            
            let btnEditPasswordNext = $('#btnEditPasswordNext').val();
            let hospitalPassword = $('#hospitalPassword').val();
    
            $("#resultMessage").load("includes/hospitalVerifyPassword-inc.php", {
                hospitalPassword: hospitalPassword,
                btnEditPasswordNext: btnEditPasswordNext,
            }, function (statusTxt) {
                if (statusTxt == "<p style='color:#17B978;'> Correct Password!</p>") {
                    $(verifyPasswordDiv).hide();
                    $(editPasswordDiv).fadeIn();
                }
                if (statusTxt == "<p class='bi bi-x-circle-fill' style='color:#E84545;'> Wrong Password!</p>") {
}         });
        });

        // END VERIFY PASSWORD

        // CREATE NEW PASSWORD START

        newPassword.onkeyup = function () {
            if (newPassword.value.length >= 8) {
                $('#passMatchWarning').show();
                $(passwordRepeatDiv).fadeIn();
                btnSaveChanges.disabled = false;
            }
            else{
                $(passwordRepeatDiv).hide();
                btnSaveChanges.disabled = true;
            }
        }

        btnSaveChanges.disabled = true;
        newPasswordRepeat.onkeyup = function () {
            if (newPasswordRepeat.value.length >= 8) {
                btnSaveChanges.disabled = false;
            }

            else{
                btnSaveChanges.disabled = true;
            }
        }

        $('#edit-new-password-form').submit(function (event) {
            event.preventDefault();
            
            let newPasswordValue = $('#newPassword').val();
            // let newPasswordRepeat = $('#new-password-repeat').val();
            let saveChanges = $('#btnSaveChanges').val();
            // let resultToast = $('#result-toast');
            let passMatchWarning = document.getElementById("passMatchWarning");

            if (newPassword.value != newPasswordRepeat.value) {
                // alert("password did not match!");
                $('#passMatchWarning').removeClass("passwordWarningMatched");
                $('#passMatchWarning').addClass("passwordWarningNotMatched");
                $('#passMatchWarning').text("Password doesn't match!")
            }

            else{
                toggleModal('editPassModal', false);
                $('#result-modal').load("includes/insert-new-password-hospital-inc.php", {
                    newPasswordValue: newPasswordValue,
                    saveChanges: saveChanges,
                }, function(statusTxt) {
                    if (statusTxt == "<p style='color:#17B978;'>Successfully Changed!</p>") {

                        toggleModal('popup-modal', true);
                    }
                    if (statusTxt == "STMT FAILED!") {
                        $(editPasswordDiv).fadeIn();
                    }
                });
            }
        });
    
        // CREATE NEW PASSWORD END 
        
        // Toggle Verify Password
        $("#verifyTogglePass").click(function() {
            $(this).toggleClass("bi-eye bi-eye-slash");
            hospitalPassword = $(this).parent().find("input.hospitalPassword");

            if (hospitalPassword.attr("type") == "password") {
                hospitalPassword.attr("type", "text");
            } 
            
            else {
                hospitalPassword.attr("type", "password");
            }
        });

        // Toggle New Password
        $("#newTogglePass").click(function() {
            $(this).toggleClass("bi-eye bi-eye-slash");
            newPasswordToggle = $(this).parent().find("input.newPassword");

            if (newPasswordToggle.attr("type") == "password") {
                newPasswordToggle.attr("type", "text");
            } 
            
            else {
                newPasswordToggle.attr("type", "password");
            }
        });

        // Toggle Repeat Password
        $("#repeatTogglePass").click(function() {
            $(this).toggleClass("bi-eye bi-eye-slash");
            newPasswordRepeatToggle = $(this).parent().find("input.newPasswordRepeat");

            if (newPasswordRepeatToggle.attr("type") == "password") {
                newPasswordRepeatToggle.attr("type", "text");
            } 
            
            else {
                newPasswordRepeatToggle.attr("type", "password");
            }
        });
    }

    function closeButton(){
        toggleModal('editPassModal', false);
    }

    function closeButtons(){
        location.reload();
        // show_account();
        toggleModal('popup-modal', false);
    }

    let bedSlotInfo = document.getElementById("bed-slot-info");
    let roomSlotInfo = document.getElementById("room-slot-info");
    let referralSlotInfo = document.getElementById("referral-slot-info");
    let cityinfo = document.getElementById("city-info");
    tippy(bedSlotInfo, {
        content: "Leave to zero (0) if there are no slots for Bed.",
    });

    tippy(roomSlotInfo, {
        content: "Leave to zero (0) if there are no slots for Room.",
    });

    tippy(referralSlotInfo, {
        content: "This will require the patient to submit a copy of the related documents upon filling-up the booking form.",
    });

    tippy(cityinfo, {
        content: "Select which city you belong so users can find your listing more easily.",
    });



    // Scroll to veiw

    function anchor_to_pending() {
        document.getElementById("pending-contents").scrollIntoView();
    }

    function anchor_to_upcoming() {
        document.getElementById("upcoming-contents").scrollIntoView();
    }

    function anchor_to_history() {
        document.getElementById("history-contents").scrollIntoView();
    }

    // Components Design
    let navButtons = document.querySelectorAll('.nav-btn');
    let dashboardBtn = document.getElementById("btn-dashboard");

    dashboardBtn.classList.add('button-active');
    dashboardBtn.classList.add('text-dark');

    navButtons.forEach(button => {
        button.addEventListener('click', function () {
            navButtons.forEach(btn => btn.classList.remove('button-active', 'text-dark'));
            this.classList.add('button-active');
            this.classList.add('text-dark');
        });
    });

    const mobileButton = document.querySelector('.mobile-menu-button');
    const sidebar = document.querySelector('.sidebar-container');
    let contentsContainer = document.querySelector('.content-container');

    mobileButton.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");

        contentsContainer.addEventListener("click", () => {
            sidebar.classList.add("-translate-x-full");
        });

    });

    


