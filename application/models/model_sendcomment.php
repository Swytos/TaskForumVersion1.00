<?session_start();?>
<?php
class Model_Sendcomment extends Model
{
	public function sendcomment()
	{	
		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");
		//data
		$id_user = $_SESSION['session_id'];
		$comment = $_POST['commenttextarea'];
		$id_topic = $_POST['id_topic'];
		$timestamp = date('Y-m-d h:i:s');
		//Insert data in base
		$write_comment = 'INSERT INTO comments (id_topic, id_user, comment, datatime) 
						  VALUES (:id_topic, :id_user, :comment, :datatime)';
		$query = $dbh->prepare($write_comment);
		//Qoury on base
		$query->execute([':id_topic' => $id_topic, 
						 ':id_user' => $id_user, 
						 ':comment' => $comment, 
						 ':datatime' => $timestamp]);
		//respons
		$comments = $dbh->prepare("SELECT username, datatime, comment, id_topic, id_user, comments.id AS id
								   FROM comments LEFT JOIN usertbl 
								   ON comments.id_user = usertbl.id WHERE comment  = :comment ");
		$comments->execute([':comment'=>$comment]);
		$data = $comments->fetchAll(PDO::FETCH_ASSOC);
		return $data;		
	}
}
?>