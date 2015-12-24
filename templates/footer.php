				</div>
			</div>
		<footer>
			<div class="container">
				<p>&copy; Victor Arsenie <?= date("Y") ?></p>
			</div>
		</footer>
	</div>
</body>
</html>
<?php 
	if (isset($connection)) { 
		mysqli_close($connection);
	    unset($connection); 
  	} 
 ?>