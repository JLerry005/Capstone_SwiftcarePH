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

                let fetchedData = JSON.parse(data);

                $("#user-name").text(fetchedData.hospitalName);
            }
        });
    }

    

    // Dashboard Refresh Button
    function refreshDashboard() {
        show_dashboard();
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

                let fetchedData = JSON.parse(data);

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
       
        // Get Images
        $("#image-gallery").html("");
        $.ajax({
            method: "GET",
            url: "includes/get-hospital-images-inc.php",
            success: function (data, status) {
                let fetchedImages = JSON.parse(data);

                for(var i = 0; i < fetchedImages.length; i++) {
                    var obj = fetchedImages[i];             
                    $("#image-gallery").append('<a href="Capstone/'+(obj.image_dir)+'" class="xl:col-span-2 w-40 h-40 hover:scale-105 transition duration-200"> <button onclick="deleteImage(id)" class="delete-button" style="display:none;"><i class="bi bi-trash-fill"></i> Delete</button>  <img id="'+(obj.image_id)+'" class="card-img" alt="..." src="Capstone/'+(obj.image_dir)+'"/></a>');
                }

                $("#edit-images").click(function () {
                    $(".delete-button").toggle();
                });

                function deleteImage(id) {
                    alert("Delete this image?");
                }
                // $("#145").hide();
                // $("#144").hide();
                // $("#143").hide();
                
                let lg = document.getElementById('image-gallery');
                lightGallery(lg);
            },
        });  
    }

    // Upload Images
    const fileInput = document.getElementById("fileInput");
    const uploadButton = document.getElementById("upload");

    uploadButton.addEventListener("click", function () {
        $.ajax({
            method: "GET",
            url: "includes/get-image-count-inc.php",
            success: function (data, status) {
                let imageCountFromDB = parseInt(data);

                if (imageCountFromDB > 10) {
                    document.getElementById("upload-messasge").innerHTML = "";
                    document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Max. Upload exceeded!";
                    show_details();
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
                    }
                    else if(finalLength > 10) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Max. of 10 images per upload only!";
                        show_details();
                    }
                    else if (totalUploads > 10) {
                        document.getElementById("upload-messasge").innerHTML = "";
                        $("#upload-messasge").show();
                        document.getElementById("upload-messasge").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> You've reached the max. number of uploads! Delete some images if you want to upload more.";
                        show_details();
                    }
                    else{
                        // While image is being uploaded
                        document.getElementById("fileInput").classList.add('disable-button');
                        document.getElementById("upload").classList.add('disable-button');
                        $("#upload-loader").show();

                        // Send image to server to process
                        xhr.open("post", "includes/insert-hospital-images-inc.php");
                        xhr.send(formData);

                        // Complete function
                        xhr.upload.addEventListener("load",function (e) {
                            document.getElementById("fileInput").classList.remove('disable-button');
                            document.getElementById("upload").classList.remove('disable-button');
                            $("#upload-loader").hide();
                            var x = document.getElementById("upload-success-toast");
                            x.className = "show";
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            show_details();
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
            // alert("hehexd");
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
        
        // Toggle User Password
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

        // Toggle User Password
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

        // Toggle User Password
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
        toggleModal('popup-modal', false);
    }



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

    


