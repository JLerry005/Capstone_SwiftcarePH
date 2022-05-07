// external js: isotope.pkgd.js

$(document).ready(function() {

    //--------------Pending Reservations - Isotope Sorting-------------//
    // init Isotope
    var $grid = $('.grid-pending-reservations').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        masonry: {
            columnWidth: 200
          },
        getSortData: {
            //date: '.date parseInt',
            dateSubmitted: '[pr-data-ticks-date-submitted]',
            reservationDate: '[pr-data-ticks-reservation-date]',
            patientName: '.pr-patient-name',
            //category: '[data-category]',
            /*date: function(dateElement) {
                var weight = $(dateElement).find('.date').text();
                return parseFloat( date.replace( /[\(\)]/g, '') );
              },*/

            name: function (element) {
                return $(element).text();
            }
        }
    });

    /*$('.filter button').on("click", function (){
        var value = $(this).attr('data-name');
            $grid.isotope({
                filter: value
            });
    });*/

    /*$('.sort button').on("click", function (){
        var value = $(this).attr('data-name');
        $grid.isotope({
            sortBy: value
        });
    });*/

    /*$('.sort').on('click', 'button', function (){
        var sortValue = $(this).attr('data-sort-value');
        $grid.isotope({
            sortBy: sortValue
        });
        //$(this).addClass('active');
    });*/

    // Sort By: Date Submitted
    $('.pr-sort-date-submitted').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Reservation Date
    $('.pr-sort-reservation-date').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Patient Name
    $('.pr-sort-patient-name').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });
    //----------------------------------------------------------------------//
    
    //Button Check and Active !Important
    /*$('.btn-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $( this ).addClass('is-checked');
        });
      });*/
      

    //--------------Approved Reservations - Isotope Sorting-------------//
    // init Isotope
    var $gridAR = $('.grid-approved-reservations').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        masonry: {
            columnWidth: 200
          },
        getSortData: {
            dateSubmitted: '[ar-data-ticks-date-submitted]',
            reservationDate: '[ar-data-ticks-reservation-date]',
            patientName: '.ar-patient-name',
        }
    });

    // Sort By: Date Submitted
    $('.ar-sort-date-submitted').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridAR.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Reservation Date
    $('.ar-sort-reservation-date').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridAR.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Patient Name
    $('.ar-sort-patient-name').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridAR.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });
    //----------------------------------------------------------------------//


    //--------------Reservations History - Isotope Sorting-------------//
    // init Isotope
    var $gridRH = $('.grid-reservations-history').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        masonry: {
            columnWidth: 200
          },
        getSortData: {
            dateSubmitted: '[rh-data-ticks-date-submitted]',
            reservationDate: '[rh-data-ticks-reservation-date]',
            patientName: '.rh-patient-name',
        }
    });

    $('.filters-button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $gridRH.isotope({ filter: filterValue });
      });

    // Sort By: Date Submitted
    $('.rh-sort-date-submitted').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridRH.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Reservation Date
    $('.rh-sort-reservation-date').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridRH.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });

    // Sort By: Patient Name
    $('.rh-sort-patient-name').on( 'click', 'button', function() {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        /* pass it to isotope */
        $gridRH.isotope({ sortBy: sortValue, sortAscending: isAscending });

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.bootstrapIcon');
        span.toggleClass('bi-chevron-up bi-chevron-down');

    });


    $('.filters-button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          $( this ).addClass('is-checked');
        });
      });
    //----------------------------------------------------------------------//

    // -----------------lightGallery--------------------------------//
    
    lightGallery(document.querySelector('.gallery'));

    //------------------------------------------------------------------//

      $('.btn-edit-slot').on('click', function () {
        $(".slot-type-radio").prop("disabled", false);
      });

    //Back To Top Button//
    var btn = $('#buttons');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });

    // -----------------Form Validation--------------------------------//
    // Example starter JavaScript for disabling form submissions if there are invalid fields

    $('.btnNext').hide();

    (function () {
        'use strict'
    
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
    
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
    
            form.classList.add('was-validated')
            }, false)
        })
    })()
    // -------------------------------------------------// 

});


    