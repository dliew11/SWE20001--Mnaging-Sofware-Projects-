<?php
if (isset($_POST["export"])) 
{
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
    header("Content-Type: text/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=product_data.csv");
    $output = fopen("php://output", "w");
    fputcsv($output, array("ProductID", "ProductName", "Category", "Unit", "Price", "Stock", "ExpiryDate", "Active"));
    $query = "SELECT * FROM products";
    $result = mysqli_query($connect, $query);
    while ($row =  mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}

?>
