<?php

//fetch_item.php

include('../config.php');

$query = "SELECT * FROM food ORDER BY food_id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '

		<div class="col-md-3 card" style="margin-top:12px;">
            <div style="overflow:hidden;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background-color:white;  padding:16px; height:400px;" align="center">
						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img height="200" width="100%" src="../assets/'.$row["file_path"].'" class="img-ressponsive" /><br />
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
	echo $output;
}


?>
