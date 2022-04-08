// alert("Working!");

    // Here the buttons function of pending booking details
    const btnAccept = document.getElementById("btn-accept");
    const btnReject = document.getElementById("btn-reject");

    // Booking Data
    let firstname = document.getElementById("firstname").innerHTML;
    let lastname = document.getElementById("lastname").innerHTML;
    let date = document.getElementById("date").innerHTML;
    let time = document.getElementById("time").innerHTML;
    let contactNumber = document.getElementById("contact-number").innerHTML;
    let emailAdd = document.getElementById("email-add").innerHTML;
    let patientConcern = document.getElementById("patient-concern").innerHTML;
    let specifyConcern = document.getElementById("specify-concern").innerHTML;
    let reservationType = document.getElementById("reservation-type").innerHTML;
    let timeStamp = document.getElementById("time-stamp").innerHTML;

    let userID = document.getElementById("userID").value;
    let listingID = document.getElementById("listingID").value;
    let bookingID = document.getElementById("bookingID").value;
    let hospitalName = document.getElementById("hospitalName").value;
  
    // Accept Button
    btnAccept.onclick = function () {
        toggleModal('AcceptModal', true);
        const btnContinue = document.getElementById("btnContinueAccept");
        const btnCancel = document.getElementById("btnCancelAccept");


        btnContinue.onclick = function () {
            // Insert to upcomingreservations
            $.ajax({
                method: "POST",
                url: "includes/accept-booking-inc.php",
                data: {
                    firstname:firstname,
                    lastname:lastname,
                    date:date,
                    time:time,
                    contactNumber:contactNumber,
                    emailAdd:emailAdd,
                    patientConcern:patientConcern,
                    specifyConcern:specifyConcern,
                    reservationType:reservationType,
                    timeStamp:timeStamp,
                    userID:userID,
                    listingID:listingID,
                    bookingID:bookingID,
                    hospitalName:hospitalName
                },
                success: function () {
                    toggleModal('AcceptModal', false);
                    window.location.replace('http://localhost/Capstone/hospital-dashboard');
                }
            });
        }

        btnCancel.onclick = function () {
            toggleModal('AcceptModal', false);
        }
    }

    

    // Reject Button
    btnReject.onclick = function () {
        toggleModal('rejectModal', true);
        const btnContinue = document.getElementById("btnContinueReject");
        const btnCancel = document.getElementById("btnCancelReject");
  
        btnContinue.onclick = function () {
            // Insert to upcomingreservations
            $.ajax({
                method: "POST",
                url: "includes/reject-booking-inc.php",
                data: {
                    firstname:firstname,
                    lastname:lastname,
                    date:date,
                    time:time,
                    contactNumber:contactNumber,
                    emailAdd:emailAdd,
                    patientConcern:patientConcern,
                    specifyConcern:specifyConcern,
                    reservationType:reservationType,
                    timeStamp:timeStamp,
                    userID:userID,
                    bookingID:bookingID,
                    listingID:listingID,
                },
                success: function () {
                    toggleModal('rejectModal', false);
                    // window.location.replace('http://localhost/Capstone/hospital-dashboard');
                }
            });
        }

        btnCancel.onclick = function () {
            toggleModal('rejectModal', false);
        }
    }