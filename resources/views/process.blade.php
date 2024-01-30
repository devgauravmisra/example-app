<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment</title>
    <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
</head>
<body>
    <h4>Loading.....</h4>
    <input type="hidden" id="paymentSessionId" value="{{ $paymentSessionId }}">
    <script>
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
