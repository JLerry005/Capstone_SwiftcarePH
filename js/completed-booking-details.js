    // alert("Working!");

    const btnAddRemarks = document.getElementById("btn-add-remarks");

    const btnArrived = document.getElementById("btn-arrived");
    const btnDidNotArrive = document.getElementById("btn-did-not-arrive");
    const btnSave = document.getElementById("btn-save");
    const btnCancel = document.getElementById("btn-cancel");

    // Toggle Modal
    btnAddRemarks.onclick = function () {
        toggleModal('add-remarks-modal', true);
    }

    // Add Disabled to save button
    btnSave.classList.add('disabled');

    let remarksData;

    btnArrived.onclick = function () {
        btnSave.classList.remove('disabled');
        remarksData = '';
        remarksData = "Successful";

        console.log(remarksData);
    }

    btnDidNotArrive.onclick = function () {
        btnSave.classList.remove('disabled');
        remarksData = '';
        remarksData = "Unsuccessful";

        console.log(remarksData);
    }
    
    // Close Modal
    const closeRemarksModal = document.getElementById("btn-close-remarks");
    closeRemarksModal.onclick = function () {
        toggleModal('add-remarks-modal', false);
    }

    // Cancel Modal
    const btnCancelRemarks = document.getElementById("btn-cancel");
    btnCancelRemarks.onclick = function () {
        toggleModal('add-remarks-modal', false);
    }
    
    // Components Design
    let remarksButtons = document.querySelectorAll('.select-remarks');
    let dashboardBtn = document.getElementById("btn-dashboard");

    remarksButtons.forEach(button => {
        button.addEventListener('click', function () {
            remarksButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    let bookingID = document.getElementById("bookingID").value;
    btnSave.onclick = function () {
        $.ajax({
            method: "POST",
            url: "includes/add-remarks-inc.php",
            data: {bookingID:bookingID,remarksData:remarksData},
            success: function (data) {
                window.location.replace('http://localhost/Capstone/completed-booking-details?bookingID='+(bookingID)+'');
            }
        });
    }