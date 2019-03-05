@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"> 
</head>

<body>
    

    <div class="container">  
        <div class="row">
            <div class="col-md-3">
              
            </div>
            <div class="col-md-4">

                    <img class="img-rounded" style="width:360px;" src = "{{ asset('img/stripe.jpeg') }}">


                    <div class="panel-body">
                      <form action="/api/pay" method="post" id="payment-form">
                          
                            <div class="form-row">
                              <label for="card-element">
                                Credit or debit card
                              </label>
                              <div class="panel-body">
                              <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                              </div>

                              <!-- Used to display Element errors. -->
                              <div id="card-errors" role="alert"></div>
                            </div>
                            </div>

                            <button class="btn btn-default">Submit Payment</button>
                          
                       </form>

                    <a href = "{{route('payments.index')}}" class = "btn btn-default">Back</a>
                    </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

            <script type="text/javascript">

            var stripe = Stripe('pk_test_Ulg5Z8eY3NSJk2TtlmaAsMnU');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                  // Add your base input styles here. For example:
                  fontSize: '16px',
                  color: "#32325d",
                }
              };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');



              card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                  displayError.textContent = event.error.message;
                } else {
                  displayError.textContent = '';
                }
              });

                 // Create a token or display an error when the form is submitted.
                //var token="";
                //var form ="";
                var form = document.getElementById('payment-form');
                form.addEventListener('submit', function(event) {
                  event.preventDefault();

                  stripe.createToken(card).then(function(result) {
                    if (result.error) {
                      // Inform the customer that there was an error.
                      var errorElement = document.getElementById('card-errors');
                      errorElement.textContent = result.error.message;
                    } else {
                      // Send the token to your server.
                      stripeTokenHandler(result.token);
                    }
                  });
                });


                  function stripeTokenHandler(token) {

                    //console.log(token);  
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('payment-form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    //Submit the form
                    form.submit();
                    }

</script>
</body>

</html>
@endsection