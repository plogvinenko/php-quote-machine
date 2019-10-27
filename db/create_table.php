<?php
//change this
$servername = "localhost";
$username = "root";
$password = "";
// do not change this
$dbname = "mygag";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE mygags (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gag VARCHAR(800) NOT NULL
)";

$sql_2 = "CREATE TABLE mygag_rating (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    gags INT(11) NULL,
    rating INT(11) NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>