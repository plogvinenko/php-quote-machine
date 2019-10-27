<?php

	require('../config/config.php');
	require('../config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$quotes = mysqli_real_escape_string($conn, $_POST['quotes']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);

		$query = "INSERT INTO quotes(quotes, author) VALUES('$quotes', '$author')";

		if(mysqli_query($conn, $query)){
			
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<?php include('inc/header.php'); ?>
	<div class="container">
	<div class="well" style="width: 100%">
		<h1>Add Quote</h1>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">				
			<div class="form-group">
				<label>Add Quote</label>
				<textarea name="quotes" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Add Autor</label>
				<textarea name="author" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
	</div>

<?php
	// Check For Submit
	if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM quotes WHERE id = {$delete_id}";

		if(mysqli_query($conn, $query)){
			
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	

	// Create Query
	$query = "SELECT * FROM quotes ";

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

	
		<div class="container">
		<?php foreach($posts as $post) : ?>
			<div class="well" style="width: 100%">
				<p><?php echo $post['quotes']; ?></p>	
				<p style="text-align:right">- <?php echo $post['author']; ?></p>
				<hr>
				<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				</form>

				<a href="<?php echo ROOT_URL; ?>/admin/editquote.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>
			</div>
			<?php endforeach; ?>
		</div>
<?php include('inc/footer.php'); ?>