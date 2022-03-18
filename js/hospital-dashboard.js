    // alert("Working!");
    
    // Get Skeleton Loader and Dashboard contents container.
    let skeletonLoader = document.getElementById("skeleton-loader");
    let dashboardContent = document.getElementById("dashboardContent").innerHTML;

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
                document.getElementById("content-container").innerHTML ="";
                document.getElementById("content-container").innerHTML =dashboardContent;
                $("#skeleton-loader").hide();

                let fetchedData = JSON.parse(data);
                console.log(fetchedData);

                $("#user-name").text(fetchedData.hospitalName);
            }
        });
    }

    // Dashboard Refresh Button
    function refreshDashboard() {
        show_dashboard();
    }
    
    // Show Edit Details When Dashboard Button is clicked.
    let detailsContent = document.getElementById("editDetailsContent").innerHTML;
    function show_details() {
        // Get Listing Data
        $.ajax({
            method: "GET",
            url: "includes/get-listing-details-inc.php",
            beforeSend: function () {
                $("#skeleton-loader").show();
            },
            success: function (data, status) {
                document.getElementById("content-container").innerHTML ="";
                document.getElementById("content-container").innerHTML =detailsContent;
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

                $("#imagesForm").submit(function(e) {
                    // e.preventDefault();
                    alert("Working!");
                });
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
                    console.log(obj);                
                    $("#image-gallery").append('<a href="'+(obj.image_dir)+'" class="xl:col-span-2 w-64 h-64 hover:scale-105 transition duration-200"> <img id="'+(obj.image_id)+'" class="card-img" alt="..." src="'+(obj.image_dir)+'"/>'+(obj.image_name)+'</a> ');
                }
                
                let lg = document.getElementById('image-gallery');
                lightGallery(lg);
            },
        });  
    }

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

    const fileInput = document.getElementById("images");
    const uploadButton = document.getElementById("uploadIMages");

    function uploadimages(event) {
        event.preventDefault();
        alert("Gumagana Yan!");
        const xhr = new XMLHttpRequest();
        const formData = new FormData();

        console.log(fileInput.files);
    }

    // $('#images-form').on('submit', function (event) {
    //     event.preventDefault();
    //     alert("Working!");

    //     $.ajax({
    //         url: 'includes/insert-hospital-images-inc.php',
    //         method: 'POST',
    //         data: new FormData(this),
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         success: function (response) {
    //             alert(response);
    //         }
    //     });
    // });

   

    // Refresh Button
    function refreshEditDetails() {
        show_details();
    }
    
    // Show Account When Dashboard Button is clicked.
    let accountContent = document.getElementById("accountContent").innerHTML;
    function show_account() {
        document.getElementById("content-container").innerHTML ="";
        document.getElementById("content-container").innerHTML =accountContent;

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
        let newPassword = document.getElementById("new-password");
        let passwordRepeatDiv = document.getElementById("repeat-password-div");
        let newPasswordRepeat = document.getElementById("new-password-repeat");
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
                if (statusTxt == "<p style='color:#17B978;'>Correct Password!</p>") {
                    $(verifyPasswordDiv).hide();
                    $(editPasswordDiv).fadeIn();
                }
                if (statusTxt == "<p style='color:#E84545;'>Wrong Password!</p>") {
                    // alert("Wrong Password!");
                        // END VERIFY PASSWORD
}         });
        });

  

        // CREATE NEW PASSWORD START
        newPassword.onkeyup = function () {
            if (newPassword.value.length >= 8) {
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
            let newPasswordValue = $('#new-password').val();
            // let newPasswordRepeat = $('#new-password-repeat').val();
            let saveChanges = $('#btnSaveChanges').val();
            // let resultToast = $('#result-toast');

            if (newPassword.value !== newPasswordRepeat.value) {
                alert("password did not match!");
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
                        alert("Failed!");
                    }
                });
            }
        });
    
        // CREATE NEW PASSWORD END        
    }

    function closeButton(){
        toggleModal('editPassModal', false);
    }

    function closeButtons(){
        toggleModal('popup-modal', false);
        show_account();
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

    


