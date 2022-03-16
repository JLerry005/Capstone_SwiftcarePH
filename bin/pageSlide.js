

$(document).ready(function() {

    /*const nextButton = document.getElementById("btnNext");
    const email = document.getElementById("exampleInputEmail1");
    const password = document.getElementsByClassName('passwordInput');
    const repeatPassword = document.getElementsByClassName('repeatPasswordInput');
    const firstname = document.getElementsByClassName('firstnameInput');
    const lastname = document.getElementsByClassName('lastnameInput');

    email.addEventListener('keyup', (e) => {
        const value = e.currentTarget.value;
        if (value === "")
            if (value < 6) {
            nextButton.disabled = true;
        }
        else {
            nextButton.disabled = false;
        }
    });*/


    
    
    

    /*$('button[type="submit"]').attr('disabled', true);
    $('input.emailInput, input.passwordInput, input[type="text"]').on('keyup', function () {
        var email = $('input.emailInput').val();
        var password = $('input.passwordInput').val();
        var text = $('input[name="text"]').val();


        if(email !='' || password !='' || text !=''){
            $('button[type="submit"]').attr('disabled', false);
        }
        else{
            $('button[type="submit"]').attr('disabled', true);
        }
    });*/

    /*$('.emailContainer input').on('keyup', function(){
        let empty = false;

        $('.emailContainer input').each(function (){
            empty = $(this).val().length == 0;
        });

        if (empty)
            $('.nextButtonContainer input').attr('disabled', 'disabled');
        else
            $('.nextButtonContainer button').attr('disabled','false');
    });*/

    const nextButton = document.getElementById("btnNext");
    const email = document.getElementById("exampleInputEmail1");
    const password = document.getElementsByClassName('passwordInput');
    const repeatPassword = document.getElementsByClassName('repeatPasswordInput');
    const firstname = document.getElementsByClassName('firstnameInput');
    const lastname = document.getElementsByClassName('lastnameInput');
    const form = document.getElementsByClassName('signupForm');

    form.addEventListener()
    

    /*$('.btnNext').on('click', function(){
        $(".signupForm").fadeOut(300);
        //$('.signupForm').hide(1000); 
        $(".btnNext").fadeOut(300);
        //$('.btnNext').hide(1000);
        $(".phoneRow").fadeIn(300);
        //$('.phoneRow').show();
    });*/

});