<?php
	require('config/config.php');
	require('config/db.php');

	// Create Query
	$query = 'SELECT * FROM quotes ORDER BY RAND() LIMIT 1';
    
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
<div class="container-fluid">
	<div class="well">	
	<div>
	<?php foreach($posts as $post) : ?>
			
				<p style="text-align:center">"<?php echo $post['quotes']; ?>"</p>
				<br>
				<p style="text-align:right">- <?php echo $post['author']; ?></p>
				
			
		<?php endforeach; ?>

	</div>	
		<div class="buttons">
			<div class="row">
				<div class="col-xs-6">
					<a class="btn btn-default btn-transparent_l" title="SHARE ON TWITTER" target="_blank " href="https://twitter.com/intent/tweet?text=<?php echo $post['quotes']; echo " -"; echo $post['author']; ?>">
					SHARE
					</a>
				</div>
				
				
               <div class="col-xs-6">
				   <input type="button"  class="btn btn-default btn-transparent" title="NEXT QUOTE" name='submitAdd' value='NEXT' onclick='window.location.reload(true);'>
				</div>
			</div>
		</div>
		<h2 style="text-align: center;"> Rate it:</h2>
		<div class="rating" >
		
		<?php foreach(range(1, 5) as $rating): ?>
		<a class="rate"  href="rate.php?index=<?php echo $post['id']; ?>&rating=<?php echo $rating; ?>"><span id="rate_<?php echo $rating; ?>" class="fa fa-star "></span></a>
		<?php endforeach; ?>
		</div>
      
		
		</div>
	</div>
<?php include('inc/footer.php'); ?>
