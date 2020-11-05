<?php if(!isset($_SESSION)) {session_start();}
?>

<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Tracking</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
        <style> @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

 body {
     font-family: 'Open Sans', serif
 }


 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }
</style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script type='text/javascript'></script>
</head>
<body>
<div class="container">
    <article class="card">


            <?php
            $ddate="Not Known";
            $sby="Not Known";
            $dphone="";

            $status="Not Placed";
            if(isset($_GET['q'])){
              include('../config.php');
              date_default_timezone_set('Africa/Nairobi');

              if($_SESSION['role']=='1'){
                $query = "SELECT * FROM orders where order_no='".$_GET['q']."' ORDER BY order_no DESC";
              } else{
                $query = "SELECT * FROM orders where order_no='".$_GET['q']."' and customer_id='".$_SESSION['user_email']."' ORDER BY order_no DESC";

              }
              $statement = $connect->prepare($query);

              if($statement->execute())
              {
                $total_price = 0;
                $result = $statement->fetchAll();
                foreach($result as $row)
                {

                  $cust="select * from customers where email ='".$row['customer_id']."'";
                  ?>
                  <header class="card-header"><b> My Orders / Tracking </b><span class="float-right"> <?php foreach (getData($cust) as $dat) {
                    echo "<b>Order By: </b>".$dat['fname'];
                  } ?></span></header>

                  <div class="card-body">
                  <?php
                  echo '<h6>Order ID: '.$_GET['q'].'</h6>';
                  $time = strtotime($row['date']);
                  $ddate=date("Y-m-d h:i A", strtotime('+60 minutes', $time));
                  $sby=$row['shippedBy'];
                  $sta=$row['status'];
                  $status=$sta;
                  if($sta == 'inorder'||$sta=='Placed'){
                    $a='';
                  } else if($sta == 'Processed'){
                    $a='1';
                  } else if($sta == 'Picked'){
                    $a='2';

                  } else if($sta == 'In Transit'){
                    $a='3';
                  } else if($sta == 'Delivered'){
                    $a='4';
                    $ddate="Delivered on ".date("Y-m-d h:i A", strtotime('+60 minutes',$time));
                  }
                  if($a=='1'){
                    $w='active';
                    $x='';
                    $y='';
                    $z='';
                  } else if($a=='2'){
                    $w='active';
                    $x='active';
                    $y='';
                    $z='';
                  } else if($a=='3'){
                    $w='active';
                    $x='active';
                    $y='active';
                    $z='';
                  } else if($a=='4'){
                    $w='active';
                    $x='active';
                    $y='active';
                    $z='active';
                } else {
                  $w='';
                  $x='';
                  $y='';
                  $z='';
                }

             ?>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $ddate; ?> </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> <?php echo $sby ?>, | <i class="fa fa-phone"></i> <?php echo $dphone ?> </div>
                    <div class="col"> <strong>Status:</strong> <br> <?php echo $status; ?> </div>
                </div>
            </article>
            <div class="track">
                <div class="step <?php echo $w ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Processed</span> </div>
                <div class="step <?php echo $x ?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Picked by courier</span> </div>
                <div class="step <?php echo $y ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step <?php echo $z ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Delivered</span> </div>
            </div>
            <hr>
            <p><strong>Items Ordered</strong></p><br>
            <ul class="row">

              <?php
              $re=unserialize($row['product_array']);
              foreach($re as $keys => $values)
              {
                $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);

               ?>
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <figcaption class="info align-self-center">
                            <p class="title"><?php echo $values["product_name"]; ?> <br> <?php echo $values["product_quantity"]; ?></p> <span class="text-muted"><?php echo "Ksh.".$values["product_price"] ?> </span>
                        </figcaption>
                    </figure>
                </li>
              <?php } ?>
            </ul>
            <hr>
            <a href="orderpage.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
          <?php }}} ?>
        </div>
    </article>
</div>

</body>
</html>
