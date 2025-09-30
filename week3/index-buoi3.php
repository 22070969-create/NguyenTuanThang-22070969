<?php
include "connection.php";
?>

<html lang="en">
<head>
    <title>Laptop Shop Management (Alt)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-lg-6">
        <h2>Laptop Data Form</h2>
        <form action="" name="form1" method="post">
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" placeholder="Enter model" name="model">
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" placeholder="Enter brand" name="brand">
            </div>
            <div class="form-group">
                <label for="storage">Storage:</label>
                <input type="text" class="form-control" id="storage" placeholder="Enter Storage" name="storage">
            </div>
            <div class="form-group">
                <label for="ram">RAM:</label>
                <input type="text" class="form-control" id="ram" placeholder="Enter RAM" name="ram">
            </div>
            <div class="form-group">
                <label for="cpu">CPU:</label>
                <input type="text" class="form-control" id="cpu" placeholder="Enter CPU" name="cpu">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
            </div>
            <button type="submit" name="insert" class="btn btn-primary">Insert</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

<div class="col-lg-12">
    <h2>Laptops List (Alt)</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Model</th>
            <th>Brand</th>
            <th>Storage</th>
            <th>RAM</th>
            <th>CPU</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($link)) {
            $res=mysqli_query($link,"SELECT * FROM laptops_alt");
            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["model"]."</td>";
                echo "<td>".$row["brand"]."</td>";
                echo "<td>".$row["storage"]."</td>";
                echo "<td>".$row["ram"]."</td>";
                echo "<td>".$row["cpu"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["price"]."</td>";
                echo "<td><a href='edit.php?id=".$row["id"]."'><button type='button' class='btn btn-success'>Edit</button></a></td>";
                echo "<td><a href='delete.php?id=".$row["id"]."'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>

<?php

if(isset($_POST["insert"]))
{
    mysqli_query($link,"INSERT INTO laptops_alt (model,brand,storage,ram,cpu,quantity,price) VALUES ('$_POST[model]' ,'$_POST[brand]','$_POST[storage]','$_POST[ram]','$_POST[cpu]','$_POST[quantity]','$_POST[price]')");
   ?>
    <script type="text/javascript">
    window.location.href=window.location.href;
    </script>
    <?php
}


if(isset($_POST["delete"]))
{
    mysqli_query($link,"DELETE FROM laptops_alt WHERE model='$_POST[model]'");
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}


if(isset($_POST["update"]))
{
    mysqli_query($link,"UPDATE laptops_alt SET brand='$_POST[brand]', storage='$_POST[storage]', ram='$_POST[ram]', cpu='$_POST[cpu]', quantity='$_POST[quantity]', price='$_POST[price]' WHERE model='$_POST[model]'");
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
?>
</html>
