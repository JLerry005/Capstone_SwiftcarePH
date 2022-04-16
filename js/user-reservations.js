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

    // Get Pending Count
    getPendingCount();
    function getPendingCount() {
        let pendingCount = document.getElementById("pending-count");

        $.ajax({
            method: 'GET',
            url: "includes/get-user-pending-count.php",
            data: {userID:userID},
            success: function (data) {
                pendingCount.innerHTML = data;
            }
        });
    }

    // Get Upcoming Count
    getUpcomingCount();
    function getUpcomingCount() {
        let upcomingCount = document.getElementById("upcoming-count");

        $.ajax({
            method: 'GET',
            url: "includes/get-user-upcoming-count.php",
            data: {userID:userID},
            success: function (data) {
                upcomingCount.innerHTML = data;
            }
        });
    }

    // Get history Count
    getHistoryCount();
    function getHistoryCount() {
        let historyCount = document.getElementById("history-count");

        $.ajax({
            method: 'GET',
            url: "includes/get-user-history-count.php",
            data: {userID:userID},
            success: function (data) {
                historyCount.innerHTML = data;
            }
        });
    }


    // ----------------------Show Pending Contents------------------------------

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
    }

    // View Referral Files
    function showImages(bookingIDData) {
        let bookingID = bookingIDData;
        modalBody.innerHTML = '';

        $.ajax({
            method: "GET",
            url: "includes/get-user-referral-images.php",
            data: {bookingID:bookingID},
            success: function (data) {
                modalBody.innerHTML = data;
            }
        });
    }

    function backToPendingDetails(backbuttonData) {
        toggleModal('full-details-modal', false);
        fullDetails(backbuttonData);
    }
    // ----------------------------------------------------------------------




    // -----------------------------Show upcoming Contents--------------------------------------------
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
            beforeSend: function () {
                upcomingCardsContainer.innerHTML = '<div class="col-span-12 animate-pulse text-xl text-center my-60">Please wait..</div>';
            },
            success: function (data) {
                upcomingCardsContainer.innerHTML = data;
            }
        });
    }

    // Dismiss Modal When Clicked outside
    // const upcomingDetailsModal = document.getElementById("upcoming-details-modal");
    // let mainContainer = document.querySelector("main-container");
    const btnCloseUpcomingModal = document.getElementById("upcoming-close-button");
    let upcomingModalbody = document.getElementById("upcoming-modal-body");

    btnCloseUpcomingModal.onclick = function () {
        upcomingModalbody.innerHTML = '';
        toggleModal('upcoming-details-modal', false);
    }

    // View Pending Reservation Full Details
    function upcomingFullDetails(data) {
        let bookingID = data;
        upcomingModalbody.innerHTML = '';
        toggleModal('upcoming-details-modal', true);

        $.ajax({
            method: "GET",
            url: "includes/user-full-upcoming-details.php",
            data: {bookingID:bookingID},
            beforeSend: function () {
                upcomingModalbody.innerHTML = '<div class="animate-pulse text-xl text-center my-14">Details are being loaded..</div>';
            },
            success: function (data) {
                upcomingModalbody.innerHTML = data;
            }
        });
    }

    // -----------------------------------------------------------


    // -----------------------------Show History Contents--------------------------------------------
    historyButton.onclick = function () {
        let historyCardsContainer = document.getElementById("completed-cards-container");

        $(menus).hide();
        $(upcomingContents).hide();
        $(pendingContents).hide();
        $(historyContents).fadeIn();

        // Get Upcoming List
        $.ajax({
            method: "GET",
            url: "includes/user-history-inc.php",
            data: {userID:userID},
            beforeSend: function () {
                historyCardsContainer.innerHTML = '<div class="col-span-12 animate-pulse text-xl text-center my-60">Please wait..</div>';
            },
            success: function (data) {
                historyCardsContainer.innerHTML = data;
            }
        });
    }

    const btnCloseHistoryModal = document.getElementById("history-close-button");
    let historyModalbody = document.getElementById("history-modal-body");

    btnCloseHistoryModal.onclick = function () {
        historyModalbody.innerHTML = '';
        toggleModal('history-details-modal', false);
    }

    // View Pending Reservation Full Details
    function historyFullDetails(dataBookingID, bookingType) {
        let bookingID = dataBookingID;
        let type = bookingType;

        console.log(bookingID);
        console.log(type);
        
        historyModalbody.innerHTML = '';
        toggleModal('history-details-modal', true);

        $.ajax({
            method: "GET",
            url: "includes/user-full-history-details.php",
            data: {bookingID:bookingID, type:type},
            beforeSend: function () {
                historyModalbody.innerHTML = '<div class="animate-pulse text-xl text-center my-14">Details are being loaded..</div>';
            },
            success: function (data) {
                historyModalbody.innerHTML = data;
            }
        });
    }

    // -----------------------------------------------------------