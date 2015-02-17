$(function() {

    /* plugin Menu Expander*/

    //Navigation Menu Slider
    $('#nav-expander').on('click',function(e){
        e.preventDefault();
        $('body').toggleClass('nav-expanded');
    });
    $('#nav-close').on('click',function(e){
        e.preventDefault();
        $('body').removeClass('nav-expanded');
    });


    // Initialize navgoco with default options
    $(".main-menu").navgoco({
        caret: '<span class="caret"></span>',
        accordion: false,
        openClass: 'open',
        save: true,
        cookie: {
            name: 'navgoco',
            expires: false,
            path: '/'
        },
        slide: {
            duration: 300,
            easing: 'swing'
        }
    });

    /* end plugin Menu Slider*/


    /**
     * Slider -> Loan amount calculator ( loan amount calculator for 10.000€ credit up to 150.000€; default value of credit is 25.000€ )
     * // has 1 handler
     */
    $( "#slider-range-min" ).slider({
        range: "min",
        value: 25000,
        min: 10000,
        max: 150000,
        step: 1000,
        slide: function( event, ui ) {
            $("#amount").html( ui.value + " &euro;" );
        }
    });
    $("#amount").html( $("#slider-range-min").slider("value") + " &euro;");


    /**
     *  Slider -> Loan duration calculator ( loan duration calculator for 6 Months credit loans up to 2 Years; has 1 handler )
    */

    var durationDefaultMin = 0.5;
    var durationDefaultMax = 5;

    $( "#slider-loan-duration" ).slider({
        range: "min",
        value: 2,
        min: durationDefaultMin,
        max: durationDefaultMax,
        step: 0.5,
        slide: function( event, ui ) {
            $( "#loan-duration" ).html(  ui.value + " Jahre" );
        }
    });
    $( "#loan-duration" ).html( $( "#slider-loan-duration" ).slider( "value") + " Jahre" );


    /**
     * Ranged Sum Slider ( filters projects between : 10.000€ - 150.000€; has 2 handlers )
     */

    var loanMinAmount = 10000;
    var loanMaxAmount = 150000;

    $( "#slider-range-amount" ).slider({
        range: true,
        min: loanMinAmount,
        max: loanMaxAmount,
        step: 100,
        values: [ loanMinAmount, loanMaxAmount ],
        slide: function( event, ui ) {
            $( "#amount" ).val(  ui.values[ 0 ] + " €" + " - " + ui.values[ 1 ].toString().replace('.', ',') + " €" );
        }
    });
    $( "#amount" ).val( $( "#slider-range-amount" ).slider( "values", 0 ) + " €" + " - " + $( "#slider-range-amount" ).slider( "values", 1 ) +
    " €" );


    /**
     * Ranged Interest Slider ( filters projects between : 1% - 16%; has 2 handlers )
     */

    var rateDefaultMin = 1;
    var rateDefaultMax = 16;

    $( "#slider-range-interest" ).slider({
        range: true,
        min: rateDefaultMin,
        max: rateDefaultMax,
        step: 1,
        values: [ rateDefaultMin, rateDefaultMax ],
        slide: function( event, ui ) {
            $( "#interest" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] + " %" );
        }
    });
    $( "#interest" ).val( $( "#slider-range-interest" ).slider( "values", 0 ) + " %" + " - " + $( "#slider-range-interest" ).slider( "values", 1 ) +
    " %" );


    /**
     * Ranged Duration Slider ( filters projects between : 0,5 - 5 Jahre; has 2 handlers )
     */

    var durationDefaultMin = 0.5;
    var durationDefaultMax = 5;

    $( "#slider-range-year" ).slider({
        range: true,
        min: durationDefaultMin,
        max: durationDefaultMax,
        step: 0.5,
        values: [ durationDefaultMin, durationDefaultMax ],
        slide: function( event, ui ) {
            $( "#years" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ].toString().replace('.', ',') + " Jahre" );
        }
    });
    $( "#years" ).val( $( "#slider-range-year" ).slider( "values", 0 ) + " Jahre" + " - " + $( "#slider-range-year" ).slider( "values", 1 ) +
    " Jahre" );

    /**
     * Adds the sidebar loan filter that appears only on small devices (width < 768px)
     */

    $('#filter-btn').click(function(e) {
        e.preventDefault();
        var elem = $('.row-offcanvas');
        if ( elem.hasClass('active') ) {
            elem.removeClass('active');
        } else {
            elem.addClass('active');
        }
        $('#filter-close').on('click',function(e){
            e.preventDefault();
            elem.removeClass('active');
        });

    });


});