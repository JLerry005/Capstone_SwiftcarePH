    // alert("Working!");

   

    // document.getElementById("content-container").innerHTML = show_dashboard();
    document.getElementById("content-container").innerHTML = show_details();

    function show_dashboard() {
        $("#content-container").load("pages/reservations.php");
    }  

    function show_details() {
        $("#content-container").load("pages/edit-details.php");
    }

    function show_account() {
        $("#content-container").load("pages/account.php");
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

    


