<?php
include 'db_conn.php';

$uploadDir = "./assets/"; // Directory where you want to store uploaded files

$prod_name = $_POST['prod_name'];
$prod_stock = $_POST['prod_stock'];
$prod_price = $_POST['prod_price'];
$prod_size = $_POST['prod_size'];
$prod_description = $_POST['prod_description'];
$prod_image = $uploadDir . basename($_FILES["prod_image"]["name"]);
// echo $first_name, $last_name, $middle_name, $address, $email, $phone;

$sql = "INSERT INTO product_details(prod_name, prod_stock, prod_size, prod_price, prod_description, prod_image) VALUES ('$prod_name', '$prod_stock', '$prod_price', '$prod_size','$prod_description', '$prod_image')";
if (move_uploaded_file($_FILES["prod_image"]["tmp_name"], $prod_image)) {
    // File successfully uploaded, now store the file path in the database
    $image = $prod_image;
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php#admin");
        exit();
    } else {
        echo "Could not insert record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>