/**
 * Created by juliengrima on 14/05/2017.
 */

jQuery(document).ready(function($) {

    //FONTION CASE A COCHER
    // initialisation des listbox (select)
    selecteur();

    //COLORPICKER
    colorpicker();

    //DATEPICKER
    datepicker();

});

// ********************************************************************
// *                    material select
// ********************************************************************


function selecteur() {

    $(document).ready(function () {
        $('select').material_select();
    });
}

// ********************************************************************
// *                    COLORPICKER
// ********************************************************************

function colorpicker(){
    $('#colorpicker').colorpicker({
        format: 'hex',
        color: '#128f3c'
    });

    // $( "#color tr td" ).click(function() {
    //     var color = $( '#colorpicker' ).val();
    //     $( '#colorpicker' ).css( 'background', color );
    // });
}

// ********************************************************************
// *                    COLORPICKER
// ********************************************************************

function datepicker(){

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});

}
