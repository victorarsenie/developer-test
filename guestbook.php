<?php require_once("classes/class_message.php");

	if (isset($_POST['delete'])) {
		Message::deleteMessage($_POST['message_id']);
	}

	if (isset($_POST['submit'])) {

		$content = mysqli_real_escape_string($connection, $_POST['content']);
		$author = mysqli_real_escape_string($connection, $_POST['author']);

		if (trim($author) == "") {
			$author = "Anonymous";
		}

		if (trim($content) == "") {
			$error = true;
		} else {
			Message::createMessage($content, $author);
		}
	}

	$all_messages = Message::getAllMessages();

	require_once("templates/header.php"); 
?>

	<div class="row">
		<div class="col-md-12"><h1>Guestbook</h1></div>
	</div>
	<?php 
	if ($all_messages) {
		while($message = mysqli_fetch_array($all_messages)) {
	?>
			<div class="message">
				<p><?=$message['content']?></p>
				<p><span>Posted by: <?=$message['author']?></span></p>

				<?php
				if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == "admin") {
				?>
					<form action="guestbook.php" method="post">
						<input type="submit" name="delete" value="Delete Message">
						<input type="hidden" name="message_id" value="'.$message['message_id'].'">
					</form>
				<?php
				}
				?>
			</div>
	<?php
		}
	}
	?>
		<form action="guestbook.php" method="post">
			<div class="row">
				<div class="col-md-12"><h2>Leave a message</h2></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><p>Name: </p></div><div class="col-sm-10"><input type="text" name="author"></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><p>Message*:</p></div><div class="col-sm-10"><textarea class="<?= $error == true ? "validation" : "" ?>" name="content"></textarea></div>
			</div>
			<input type="submit" name="submit" value="Submit">
		</form>
	
<?php require_once("templates/footer.php"); ?>