<?php
	require('config/config.php');
	require('config/db.php');

if(isset($_GET['index'], $_GET['rating'])) {

    $quotes_id = (int)$_GET['index'];
    $rating = (int)$_GET['rating'];
    
    $query = "INSERT INTO quotes_rating (quotes_id, rating) VALUES ('$quotes_id','$rating')";

        
        if(mysqli_query($conn, $query)){
			header('Location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
