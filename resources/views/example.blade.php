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
    <div class="row">
        <div class="col-md-4">
            <h3 style="margin-top: 50% !important; text-align: center;">Cashfree V3 Api Demo on Laravel Framework</h3>

        </div>
        <div class="col-md-4" style="float: right !important;">

            <div class="container" style="margin-top: 19% !important;margin-left: 25% !important;  padding: 7%; border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important;">

                <form action="{{ route('form.submit') }}" method="POST">
                @csrf

                    <div class="md-4">

                        <div class="col">

                            <div class="form-outline">
                                <label class="form-label" for="form6Example2">Amount</label>
                                <input type="text" id="form6Example2" name="orderamount" class="form-control"
                                    placeholder="Please enter Amount" required />

                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Order Note</label>
                                <input type="text" id="form6Example1" name="ordernote" class="form-control"
                                    placeholder="Please enter Order Note" required />

                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Customer name</label>

                                    <input type="text" id="form6Example2" name="customername" class="form-control"
                                        placeholder="Please enter Customer Name" required />
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example1">Customer Email</label>

                                    <input type="email" id="form6Example1" name="customeremail" class="form-control"
                                        placeholder="Please enter Customer Email" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Customer Phone</label>

                                    <input type="text" pattern="[789][0-9]{9}" name="cuatomerphone" id="form6Example2"
                                        placeholder="Please enter Customer Phone" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
                </form>
            </div>

        </div>
    </div>
    <!-- 2 column grid layout with text inputs for the first and last names -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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