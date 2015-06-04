//set offcanvas loan request menu height

function resizeOffcanvasHeight() {
    $('#sidebar-loan-menu')
        .children('.offcanvas-loan-menu')
        .height($(window).height());
}

/*  accordion handling on dashboard */

function collapseOnResize(){
    // only for desktop
    if ($(document).width() > 991) {
        // get all link inside class lg-no-collapse
        $('.lg-no-collapse').each(function(){
            // if has data-toggle=collapse
            if ( $(this).attr('data-toggle') == 'collapse' ) {
                // remove data-toggle collapse
                $(this).attr('data-toggle', '');
                // change url to javascrit:void(0)
                $(this).attr('href', 'javascript:void(0);');
            }
        });
        // make sure that all are displayed on desktop
        $('.panel-collapse').collapse('show');
    } else {
        // get all links inside class lg-no-collapse
        $('.lg-no-collapse').each(function(){
            // if has data-toggle != collapse
            if ( $(this).attr('data-toggle') != 'collapse' ) {
                // add data-toggle collapse
                $(this).attr('data-toggle', 'collapse');
                // get the id to regenerate url hashtag
                var newId = $(this).attr('id').replace('a-', '#');
                // apply new href
                $(this).attr('href', newId);
            }
        });
    }
}

$(function() {

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
     * Toggle loan filter on mobile and tablet
     */

    $('#filter-btn').click(function(e) {
        e.preventDefault();
        $('#filter-section').slideToggle('slow');
    });

    /**
     * activate tooltip
     */

    $('[data-toggle="tooltip"]').tooltip();

    /**
     * activate dashboard accordion
     */

    $(window).load(function() {
        setTimeout(collapseOnResize, 500);
    });
    $(window).resize(function() {
        collapseOnResize();
    });


    /* borrower and lender payment details tab dropdown*/
    $('#mobile-tab > li > ul > li > a:first').tab('show');
    $('#desktop-tab > li > ul > li > a:first').tab('show');
    var firstTabContent = $('#desktop-tab > li > ul> li > a:first').html();
    $('.tabber .tab-select-label').html(firstTabContent);
    $('#desktop-tab > li > ul > li > a, #mobile-tab > li > ul > li > a').click(function(){
        var newContent = $(this).html();
        $('.tabber .tab-select-label').html(newContent);
    });


});