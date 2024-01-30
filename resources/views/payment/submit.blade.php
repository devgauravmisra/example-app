<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form for Payment</title>
    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
</head>
<body onload="payment()">
<?php

?>
    <form id="paymentForm" action="{{ route('form.submit') }}" method="POST">
        @csrf

     <input type="hidden" id="paymentSessionId" value="{{ $session }}">

    </form>
    <script>
        function submitForm() {
            //alert(dd(paymentSessionId);
            document.getElementById("paymentForm").submit();
        }
   
        function payment() {
            const cashfree = Cashfree({
                mode: "sandbox" //or production
            });
            let checkoutOptions = {
                paymentSessionId: document.getElementById("paymentSessionId").value,
                redirectTarget: "_self" //optional (_self or _blank)
            }
            cashfree.checkout(checkoutOptions)
        };
        payment();
    </script>
</body>
</html>
