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
            success: function (data) {
                pendingCardsContainer.innerHTML = data;
            }
        });
    }

    // View Pending Reservation Full Details
    function fullDetails(bookingID) {
        console.log(bookingID);

        window.location.replace('http://localhost/Capstone/user-pending-reservation-details?bookingID='+(bookingID)+'');
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