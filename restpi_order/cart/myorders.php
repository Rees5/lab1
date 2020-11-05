<?php session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta name='viewport' content='width=device-width, initial-scale=1'>

<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

    <title>Orders</title>
  </head>
  <body>

    </div>

    </nav>
    <div class="container">
      <a>	<?php if (isset($_SESSION['fname'])) {
          echo 'Logged in as '.$_SESSION["fname"].'';
        } else {
          echo 'Youre not loggen in';
        }  ?></a>
        <div class="row">
            <h2 class="text-center">Order History</h2>
        </div>

        <div class="row">

            <div class="col-md-12">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Date ordered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php  include('../config.php');

                      $query = "SELECT * FROM orders where customer_id='".$_SESSION['email']."' ORDER BY order_no DESC";

                      $statement = $connect->prepare($query);

                      if($statement->execute())
                      {
                        $total_price = 0;
                      	$result = $statement->fetchAll();
                      	foreach($result as $row)
                      	{
                          ?>
                      <tr>
                        <td><?php echo $row['order_no'] ?></td>
                        <td>
                          <?php
                            $re=unserialize($row['product_array']);
                            foreach($re as $keys => $values)
                          	{
                              echo '<li>'.$values["product_name"].'- '.$values["product_quantity"] .' X '. $values["product_price"].' </li>';
                              $total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
                            }
                           ?>
                        </td>
                        <td><?php if($row['status']=='inorder'){echo "Still in Cart" ;} else{ echo $row['status'];} ?></td>
                        <td><?php echo $total_price ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><a href="orderstat.php?q=<?php echo $row['order_no']; ?>">Track</a></td>
                      </tr>
                    <?php }} ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function () {
      $('#example').DataTable({
          "processing": true,
          "info": true,
          "stateSave": true,

      });
  });

</script>
  </body>
</html>
