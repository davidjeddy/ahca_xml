/**
 * Add a little logic to sum up all the `charge` inputs and populate 'total' with it.
 * Re-calc on any input change to fields with .charge
 * Do not allow manual input of 'total_charges'
 * @author David Eddy
 * @version 0.0.3
 * @since 0.0.3
 */
$(document).ready(function(){

	function sumCharges() {
    	console.log('fn sum()');

		var total = 0;
		$( ".charge" ).each( function(){
		  total += parseFloat( $( this ).val() ) || 0;
		});

		$("#records-total_charges").val(total);
		return true;
	};

	function resetForm(form) {
	    $("form#"+form).find('input:text, input:password, input:file, select, textarea').val('');
	    $("form#"+form).find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');

		return true;
	}



	// Calculate charges, ovrride any values in the total_charges field
	$('.charge, #records-total_charges').on('keyup', function(){
		sumCharges();
	});

	$("#records-country_id option").filter(function() {
	    return this.text == "United States"; 
	}).attr('selected', true);

	// JS reset of forms

	$(":reset").on('click', function() {
		console.log('JS form reset of form');

		// @referance: http://stackoverflow.com/questions/680241/resetting-a-multi-stage-form-with-jquery
		// @author Paolo Bergantino
		console.log($(this).closest('form').attr('id'));
		//resetForm($(this).closest('form').attr('id'));
	});
});