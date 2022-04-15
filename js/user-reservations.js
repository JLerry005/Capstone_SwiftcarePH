// alert ("Working na!");

    const contentsContainer = document.getElementById("contents-container");

    // USer ID
    let userID = document.getElementById("userID").value;

    // Contents
    let menus = document.getElementById("main-menus");
    let pendingContents = document.getElementById("pending-contents");
    let upcomingContents = document.getElementById("upcoming-contents");
    let historyContents = document.getElementById("history-contents");

    // Menu Buttons
    const pendingButton = document.getElementById("pending-button");
    const upcomingButton = document.getElementById("upcoming-button");
    const historyButton = document.getElementById("history-button");

    // back to menu button
    const backToMenu = document.querySelectorAll('.btn-back-to-menu');

    function back() {
        $(pendingContents).hide();
        $(upcomingContents).hide();
        $(historyContents).hide();
        $(menus).fadeIn();
    }

    // Load Main Menus First
    showMainMenu();
    function showMainMenu() {
        $(menus).fadeIn();
    }

    // Show Pending Contents
    pendingButton.onclick = function () {
        let pendingCardsContainer = document.getElementById("pending-cards-container");

        $(menus).hide();
        $(upcomingContents).hide();
        $(historyContents).hide();
        $(pendingContents).fadeIn();

        // Get Pending List
        $.ajax({
            method: "GET",
            url: "includes/user-pending-inc.php",
            data: {userID:userID},
            beforeSend: function () {
                pendingCardsContainer.innerHTML = '<div class="col-span-12 animate-pulse text-xl text-center my-60">Please wait..</div>';
            },
            success: function (data) {
                pendingCardsContainer.innerHTML = data;
            }
        });
    }

    // Dismiss Modal When Clicked outside
    const fullDetailsModal = document.getElementById("full-details-modal");
    // let mainContainer = document.querySelector("main-container");
    const closeModalButton = document.getElementById("cancelButton");
    let modalBody = document.getElementById("details-modal-body");

    closeModalButton.onclick = function () {
        modalBody.innerHTML = '';
        toggleModal('full-details-modal', false);
    }

    // View Pending Reservation Full Details
    function fullDetails(data) {
        let bookingID = data;
        modalBody.innerHTML = '';
        toggleModal('full-details-modal', true);

        $.ajax({
            method: "GET",
            url: "includes/user-full-pending-details.php",
            data: {bookingID:bookingID},
            beforeSend: function () {
                modalBody.innerHTML = '<div class="animate-pulse text-xl text-center my-14">Details are being loaded..</div>';
            },
            success: function (data) {
                modalBody.innerHTML = data;
            }
        });

        // window.location.replace('http://localhost/Capstone/user-pending-reservation-details?bookingID='+(bookingID)+'');
    }

    // Show upcoming Contents
    upcomingButton.onclick = function () {
        let upcomingCardsContainer = document.getElementById("upcoming-cards-container");

        $(menus).hide();
        $(pendingContents).hide();
        $(historyContents).hide();
        $(upcomingContents).fadeIn();

        // Get Upcoming List
        $.ajax({
            method: "GET",
            url: "includes/user-upcoming-inc.php",
            data: {userID:userID},
            success: function (data) {
                upcomingCardsContainer.innerHTML = data;
            }
        });
    }

    // Show History Contents
    historyButton.onclick = function () {
        $(menus).hide();
        $(upcomingContents).hide();
        $(pendingContents).hide();
        $(historyContents).fadeIn();
    }