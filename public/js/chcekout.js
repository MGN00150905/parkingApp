Stripe.setPublishableKey('pk_test_RU7SoAVTCTwnTFgwlqqBzmoj');

var $form = $('#checkout_form'); //payments.index

$form.submit(function(event){
	$('charge_error').addClass('hidden');
	Stripe.card.createToken({
		name: $('#name').val(),
		address: $('#address').val(),
	    number: $('#card_number').val(),
		exp_date: $('.ex_date').val(),
		cvc: $('#cvv').val()
	}, stripeResponseHandler);   //gets value of all input fields
});


