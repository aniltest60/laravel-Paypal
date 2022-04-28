<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}"></script>

</head>

<body>


    <a class="btn btn-primary" href="{{route('processPaypal')}}">Pay 100$</a>


    @if(\Session::has('error'))
    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
    {{ \Session::forget('error') }}
    @endif


    @if(\Session::has('success'))
    <div class="alert alert-success">{{ \Session::get('success') }}</div>
    {{ \Session::forget('success') }}
    @endif

</body>

</html>
<div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container"></div>
    </div>
</div>
<script
    src="https://www.paypal.com/sdk/js?client-id=Adu28KHjrNEWVVLZ8mBnCNCEnB3gMUy4BTbLiPZv5TFbmxlV1a7y-m_Q9rh2KMzlDGiCf35eVFdp9le3&enable-funding=venmo&currency=AUD"
    data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',

        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"AUD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');

          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>
