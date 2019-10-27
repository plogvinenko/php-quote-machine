<?php
	require('config/config.php');
	require('config/db.php');

	// Create Query
	$query = 'SELECT quotes.id, quotes.quotes, quotes.author, AVG(quotes_rating.rating) AS rating
			  FROM quotes
			  LEFT JOIN quotes_rating
			  ON quotes.id = quotes_rating.quotes_id
			  GROUP BY quotes.id';

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<?php foreach($posts as $post) : ?>
			<div class="well" style="width: 100%">
				<p><?php echo $post['quotes']; ?></p>
				<p style="text-align:right">- <?php echo $post['author']; ?></p>
				<p>Rating: <?php echo round($post['rating']); ?>/5 <span style="color: #ffd900" class="fa fa-star "></p>
			</div>
		<?php endforeach; ?>
	</div>
<?php include('inc/footer.php'); ?>