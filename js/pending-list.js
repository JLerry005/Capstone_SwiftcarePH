    let modal = document.getElementById("list-modal");
    let toggleModal = document.getElementById("list-card");
    let pendingListContainer = document.getElementById("pending-cards-container");

    toggleModal.onclick = function () {
        
        modal.toggle();
        $('#list-modal').modal("show");
    };

    function sample_func() {
        alert("Working!");
    }
    

    function loadPendingList(){
        alert("working!");
        $.ajax({
            method: "POST",
            url: "includes/pending-request-list.php",
            success: function (data) {
                $(pendingListContainer).val(data);
            }
        });
    }