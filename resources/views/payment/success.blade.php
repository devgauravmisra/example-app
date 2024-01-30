<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>V3 API</title>
</head>

<body style="background-color: #6933d3; color:white !important;">
    <?php 

   $orderid = $_REQUEST['order_id'];
   $url = "https://sandbox.cashfree.com/pg/orders/$orderid/payments";

   $ch = curl_init();

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "$url");
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2000);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Accept: application/json',
        'x-api-version: 2022-09-01',
        'Content-Type: application/json',
        'x-client-id: 13764729ed596674a0f96e06f3746731',
        'x-client-secret:1f4ee1fd095fcd3cfa702f0c91389c8adca03b5a'
    )
   );

   $results = curl_exec($ch);
   $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);
   $resps= json_decode($results, true);
?>


    <?php if($resps[0]['payment_status'] != 'SUCCESS'){?>
    <div class="alert" role="alert">
        <h3 style='text-align:center !important;margin-top:50px;'>Payment Failed
            <br>Order Id: <?php echo $orderid;?>
            <?php dd($resps);?>
    </div>

    <?php }else{?>


    <div class="alert" role="alert">
        <h3 style='text-align:center !important;margin-top:50px;'>Payment Successful
            <br>Order Id: <?php echo $orderid; ?>
            <?php dd($resps);?>
           <?php } ?>
            
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>