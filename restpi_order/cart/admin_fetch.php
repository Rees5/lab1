<?php

//fetch_item.php

include('../config.php');

$query = "SELECT * FROM food ORDER BY date desc";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '
    <form action="../admin/update_form.php" method="post">
		<div class="col-md-3 card" style="margin-top:12px;">
            <div style="overflow:hidden;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background-color:white;  padding:16px; height:400px;" align="center">
						<div class="flip-card">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img height="200" width="100%" src="'.$row["file_path"].'" class="img-ressponsive" /><br />
								</div>
								<div class="flip-card-back">
									<h4 class="text-info">'.$row["food_name"].'</h4>
									<p class="text-info">Category: '.$row["category"].'</p>
									<p class="text-info">'.$row["description"].'</p>
								</div>
							</div>
						</div><br />
            	<h4 class="text-info">'.$row["food_name"].'</h4>
            	<h4 class="text-danger">Ksh. '.$row["price"] .'</h4>
            	<input type="hidden" name="hidden_name" id="name'.$row["fid"].'" value="'.$row["food_name"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["fid"].'" value="'.$row["price"].'" />
							<input type="hidden" name="hidden_description" id="price'.$row["fid"].'" value="'.$row["description"].'" />
            	<button type="submit" name="up_img" value="'.$row["fid"].'" style="margin-top:5px;" class="btn btn-success form-control">Edit Product</button>
            </div>
        </div>
    </form>
		';
	}
	echo $output;
}


?>
