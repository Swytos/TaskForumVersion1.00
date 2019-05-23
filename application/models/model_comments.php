<?session_start();?>
<?php
class Model_Comments
{
	public function comments() {

		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");

		$id_topic = $_POST['id_topic'];

		$comments = $dbh->prepare("SELECT username, datatime, comment, id_topic, id_user, comments.id AS id
								   FROM comments LEFT JOIN usertbl 
								   ON comments.id_user = usertbl.id WHERE id_topic = :id_topic");
		$comments->execute([':id_topic'=>$id_topic]);
		$result = $comments->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}