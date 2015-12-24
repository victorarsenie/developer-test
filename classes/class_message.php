<?php
	require_once ("./db.php");

	class Message {
		public $message_id;
		public $content;
		public $author;
		public $deleted;

		public static function getAllMessages() {
			global $connection;

			$sql = "SELECT * from tbl_messages WHERE deleted = 0";
	        $result = mysqli_query($connection, $sql);

	        return $result;
		}

		public static function deleteMessage($message_id) {
			global $connection;

			$sql = "UPDATE tbl_messages SET deleted = 1 WHERE message_id = $message_id LIMIT 1";
	        $result = mysqli_query($connection, $sql);
		}

		public static function createMessage($content, $author) {
			global $connection;

			$sql = "INSERT INTO tbl_messages (content, author) VALUES ('$content', '$author')";
	        mysqli_query($connection, $sql);
		}
	}
?>