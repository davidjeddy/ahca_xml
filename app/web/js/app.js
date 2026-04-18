/**
 * Add a little logic to sum up all the `charge` inputs and populate 'total' with it.
 * Re-calc on any input change to fields with .charge
 * Do not allow manual input of 'total_charges'
 * @author David Eddy
 * @version 0.0.3
 * @since 0.0.3
 */
$(document).ready(function(){

	var sumCharges = function() {
    	console.log('fn sum()');

		var total = 0;
		$( ".charge" ).each( function(){
		  total += parseFloat( $( this ).val() ) || 0;
		});

		$("#records-total_charges").val(total);
		return true;
	};

	// Calculate charges, ovrride any values in the total_charges field
	$('.charge, #records-total_charges').on('keyup', function(){
		sumCharges();
	});

	$("#records-country_id option").filter(function() {
	    return this.text == "United States"; 
	}).attr('selected', true);
});