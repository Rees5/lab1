<?php
  require_once '../config.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
.img__wrap {
  position: relative;
  height: inherit;
  width: inherit;
}

.img__description {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(29, 106, 154, 0.72);
  color: #fff;
  visibility: hidden;
  opacity: 0;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description {
  visibility: visible;
  opacity: 1;
}
</style>
</head>
<body>
  <h2 style="text-align:center">Product Card</h2>
<?php

  $sql2="select * from food";
foreach(getData($sql2) as $row){?>

<div class="column">
<div class="card">
  <div class="img__wrap">
    <img class="img__img" height="200" width="300" src="../assets/<?php echo $row['file_path']; ?>" alt="Denim Jeans" style="width:100%">
    <div class="img__description_layer">
    <p class="img__description"><?php echo $row['description']; ?></p>
  </div>
  </div>
  <h1><?php echo $row['food_name']; ?></h1>
  <p class="price"><?php echo $row['price']; ?></p>

  <p><button>Add to Cart</button></p>
</div>

</div>
<?php } ?>
</body>
</html>
