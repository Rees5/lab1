<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=lab1", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM food ORDER BY food_id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["insert_food"]))
		{
			$form_data = array(
				':food_name'		=>	$_POST["food_name"],
				':food_description'		=>	$_POST["food_description"],
				':food_price'		=>	$_POST["food_price"]
			);
			$query = "
			INSERT INTO food
			(food_name, food_description, food_price) VALUES
			(:food_name, :food_description,:food_price)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function insert_order($data1)
	{
		foreach($data1 as $keys => $values)
		{

		}
		if(isset($_POST["insert_order"]))
		{

			$form_data = array(
				':food_quantity'		=>	$values["food_quantity"],
				':food_id'		=>	$values["food_id"],
				':customer'		=>	$values["customer"]
			);
			$query = "
			INSERT INTO order_table
			(food_id,food_quantity,customer) VALUES
			(:food_id, :food_quantity,:customer)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function fetch_single($id)
	{
		$query = "SELECT * FROM food WHERE food_id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['food_name'] = $row['food_name'];
				$data['food_description'] = $row['food_description'];
				$data['food_price'] = $row['food_price'];
			}
			return $data;
		}
	}
	function fetch_order($id)
	{
		$query = "SELECT * FROM order_table WHERE order_id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['food_id'] = $row['food_id'];
				$data['food_quantity'] = $row['food_quantity'];
				$data['customer'] = $row['customer'];
				$data['order_date'] = $row['order_date'];
			}
			return $data;
		}
	}
	function update()
	{
		if(isset($_POST["update_food"]))
		{
			$form_data = array(
				':food_name'		=>	$_POST["food_name"],
				':food_description'		=>	$_POST["food_description"],
				':food_price'		=>	$_POST["food_price"],
				':food_id'			=>	$_POST['food_id']
			);
			$query = "
			UPDATE food
			SET food_name = :food_name, food_description = :food_description,food_price = :food_price
			WHERE food_id = :food_id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM food WHERE food_id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete_order($id)
	{
		$query = "DELETE FROM order_table WHERE order_id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>
