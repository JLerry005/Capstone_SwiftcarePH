
    
    let editPasswordForm = document.getElementById("editPasswordForm");
    let userPassword = document.getElementById("userPassword").val;
    let userNewPassword = document.getElementById("userNewPassword");
    let btnEditPasswordNext = document.getElementById("btnEditPasswordNext");
    let btnEditPasswordSave = document.getElementById("btnEditPasswordSave");

    $('#btnEditPasswordSave').hide();
    $('.container').hide();
    // $(userNewPassword).hide();

    // btnEditPasswordNext.onclick = function (e) {
    //     $.ajax({
    //         // type: "method",
    //         url: "../Capstone/includes/edit-userPassword-inc.php",
    //         type: "POST",
    //         data: "userPassword",
    //         success: function (response) {
    //             if(response){
    //                 alert("Right Password!");
    //             }
    //             else{
    //                 alert("LEft Password");
    //             }
    //         }
    //     });
    //     e.preventDefault();  
    // }

    // $('#editPasswordForm').submit( function (e) {
    //     $.ajax({
    //         // type: "method",
    //         url: "../Capstone/includes/edit-userPassword-inc.php",
    //         type: "POST",
    //         data: $('#editPasswordForm').serialize(),
    //         success: function (response) {


    //             // console.log(data);
    //             // if (data == 'No') {
    //             //     alert('Wrong Password!'); 
    //             // }
    //             // else{
    //             //     alert("Correct Password!")
    //             // }
    //         }
    //     });
    //     e.preventDefault();
    // });


    $('.copy-code').tooltip();

    $('.copy-code').on('click', function () {
        var span = $(this).find('.copy-icon');
        span.toggleClass('bi-clipboard-plus bi-clipboard-check');
        $(this).tooltip('hide');
    });

    // $('#save').click(function (e) {
    //    e.preventDefault();
    //    alert('Hello!'); 
    // });

    // Verify Old Password - Ajax
    $('#editPasswordForm').submit(function (e) {
        e.preventDefault();
        let userPassword = $('#userPassword').val();
        let btnEditPasswordNext = $('#btnEditPasswordNext').val();

        $('.resultMessage').load("../includes/userVerifyPassword-inc.php", {
            userPassword: userPassword,
            btnEditPasswordNext: btnEditPasswordNext
        });
    });

    // $('.container').hide();  



    

    

    



