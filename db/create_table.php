<?php
//change this
$servername = "localhost";
$username = "root";
$password = "";
// do not change this
$dbname = "quotes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE quotes (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quotes VARCHAR(1200) NOT NULL,
author VARCHAR(100) NOT NULL
)";

$sql_2 = "CREATE TABLE quotes_rating (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quotes_id INT(11) NULL,
    rating INT(11) NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
