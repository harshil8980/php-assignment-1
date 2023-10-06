<?php
$conn = new mysqli("172.31.22.43", "Harshil200552678", "8ULt4paW0J", "Harshil200552678");
//Connecting to database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

if (isset($_POST["submit"])) {
    //variable creation
    $size = $_POST["pizzaSize"];
    $sauce = $_POST["pizzaname"];
    $dip = $_POST["dip"];
    $name = $_POST["name"];
    $number = $_POST["Phone_number"];
    $gmail = $_POST["g-mail"];

    
    $toppings = isset($_POST["TOPPING"]) ? $_POST["TOPPING"] : [];
    $topping = implode(",", $toppings);
//query to insert the date
    $query = "INSERT INTO pizza_the_store VALUES ('$size', '$topping', '$sauce', '$dip', '$name', '$number', '$gmail')";
//to display information
    if (mysqli_query($conn, $query)) {
        echo "<h1>Order information</h1>";
        echo "<script>alert('Data successfully inserted');</script>";
        echo "<h2>Pizza information</h2>";
        echo "<h4>Size: $size</h4>";
        echo "<h4>Sauce: $sauce</h4>";
        echo "<h4>Dip: $dip</h4>";
        echo "<h4>Toppings: $topping</h4>";
        echo "<h2>Personal information</h2>";
        echo "<h4>Name: $name</h4>";
        echo "<h4>Number: $number</h4>";
        echo "<h4>Gmail: $gmail</h4>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
