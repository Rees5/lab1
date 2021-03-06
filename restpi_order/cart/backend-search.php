<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "lab1");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM food WHERE food_name LIKE ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = '%'. $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo '
                    <div class="col-md-3 card" style="margin-top:12px;">
                            <div style="overflow:hidden;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background-color:white;  padding:16px; height:400px;" align="center">
                						<div class="flip-card">
                							<div class="flip-card-inner">
                								<div class="flip-card-front">
                									<img height="200" width="100%" src="'.$row["file_path"].'" class="img-ressponsive" /><br />
                								</div>
                								<div class="flip-card-back">
                									<h4 class="text-info">'.$row["food_name"].'</h4>
                									<p class="text-info">'.$row["food_description"].'</p>
                								</div>
                							</div>
                						</div><br />
                            	<h4 class="text-info">'.$row["food_name"].'</h4>
                            	<h4 class="text-danger">Ksh. '.$row["food_price"] .'</h4>
                            	<input type="text" name="quantity" id="quantity' . $row["food_id"] .'" class="form-control" value="1" />
                            	<input type="hidden" name="hidden_name" id="name'.$row["food_id"].'" value="'.$row["food_name"].'" />
                            	<input type="hidden" name="hidden_price" id="price'.$row["food_id"].'" value="'.$row["food_price"].'" />
                							<input type="hidden" name="hidden_description" id="price'.$row["food_id"].'" value="'.$row["food_description"].'" />
                            	<input type="button" name="add_to_cart" id="'.$row["food_id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
                            </div>
                        </div>
                		';
                }
            } else{
                echo "<p>No matching product found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
?>
