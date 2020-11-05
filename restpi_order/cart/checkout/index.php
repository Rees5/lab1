<?php session_start();

$total_price = 0;
$total_item = 0; ?>
<!doctype html>
<html>

  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Checkout</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <style>
      body {
        background: #f5f5f5;
        background-image: url("../img/bg2.jpg");
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover;
        background-color: rgba(255,255,255, 0.6);
        background-blend-mode: lighten;
      }

      .rounded {
        border-radius: 1rem
      }

      .nav-pills .nav-link {
        color: #555
      }

      .nav-pills .nav-link.active {
        color: white
      }

      input[type="radio"] {
        margin-right: 5px
      }

      .bold {
        font-weight: bold
      }

    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script type='text/javascript'>
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })

    </script>
  </head>

  <body>
    <div class="container py-5">
      <!-- For demo purpose -->
      <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-left">
          <h1 class="display-5">e-Kula Checkout</h1>
        </div>
      </div> <!-- End -->
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card ">
            <div class="card-header">
              <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                <!-- Credit card form tabs -->
                <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                  <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                  <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                  <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Mobile Payment </a> </li>
                </ul>
              </div> <!-- End -->
              <!-- Credit card form content -->
              <div class="tab-content">
                <!-- credit card info-->
                <div id="credit-card" class="tab-pane fade show active pt-3">
                  <form role="form" action="process_checkout.php">
                    <div class="form-group"> <label for="username">
                        <h6>Card Owner</h6>
                      </label> <input type="text" name="username" placeholder="Card Owner Name" <?php if (isset($_SESSION['fname'])) {
                        echo 'value="'.$_SESSION['fname'].'"';
                      } ?> required class="form-control "> </div>
                    <div class="form-group"> <label for="cardNumber">
                        <h6>Card number</h6>
                      </label>
                      <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group"> <label><span class="hidden-xs">
                              <h6>Expiration Date</h6>
                            </span></label>
                          <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                            <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                          </label> <input type="text" required class="form-control"> </div>
                      </div>
                    </div>
                 </form>
                 <form role="form" action="process_checkout.php">
                    <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                      <br><p class="text-center">Or<p>
                       <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Pay On Delivery </button>
                    </div>
                  </form>

              </div> <!-- End -->
              <!-- Paypal info -->
              <div id="paypal" class="tab-pane fade pt-3">
                <h6 class="pb-2">Select your paypal account type</h6>
                <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
              </div> <!-- End -->
              <!-- bank transfer info -->
              <div id="net-banking" class="tab-pane fade pt-3">
                <div class="form-group "> <label for="Select Your Bank">
                    <h6>Select your Service Provider</h6>
                  </label> <select class="form-control" id="ccmonth">
                    <option value="" selected disabled>--Please select your Provider--</option>
                    <option>Safaricom - Mpesa</option>
                    <option>Airtel - Airtel Money</option>
                    <option>Telcom - T-Kash</option>
                  </select> </div>
                <div class="form-group">
                  <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed to Payment</button> </p>
                </div>
                <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
              </div> <!-- End -->
              <!-- End -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-25">
        <?php if (isset($_SESSION['user_name'])) {
          echo '<p class="text-right">'.$_SESSION["user_name"].'</p>';
        }  ?>
        <div class="container">
          <h4>Order Summary<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>
            <?php
              if (isset($_SESSION['shopping_cart'])) {
                echo " ".count($_SESSION['shopping_cart']);
              } else {
                echo " 0";
              } ?>
        </b></span></h4>
          <?php
          if(isset($_SESSION['shopping_cart'])){
          if(!empty($_SESSION["shopping_cart"]))
          {
          	foreach($_SESSION["shopping_cart"] as $keys => $values)
          	{
              echo '<p><a href="#">'.$values["product_name"].' </a> <span class="price float-right"> '.$values["product_price"].' X '.$values["product_quantity"].'</span></p>';
              $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
          		$total_item = $total_item + 1;
            }
            echo '<hr>';
            echo '<p>Total <span class="price" style="color:black"><b>Ksh '.number_format($total_price, 2).'</b></span></p>';
          }
        }else {
          echo '<p>No items ordered</p>';
        }
          ?>
          <div class="form-group">
            <p> <a href="../"><button type="button" class="btn btn-danger " ><i class="fas fa-undo  mr-2"></i> Continue Shopping</button></a> </p>
          </div>
        </div>
      </div>
    </div>

  </body>

</html>
