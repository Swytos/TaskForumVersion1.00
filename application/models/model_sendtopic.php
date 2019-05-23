<?session_start();?>
<?php
class Model_Sendtopic extends Model
{
	public function sendtopic()
	{	
		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");
		//data
			$id = $_SESSION['session_id'];
			$topic_name = $_POST['topicname'];
			$topic_description = $_POST['topicdescription'];
		//get id user
			$id_user = $dbh->prepare("SELECT * FROM usertbl WHERE id = :id");
			$id_user->execute([':id'=>$id]);
			$result = $id_user->fetch(PDO::FETCH_ASSOC);
			$username = $result['username'];
		//insert query topic date
			$write_topic = 'INSERT INTO topics (id_user, topic, description) VALUES (:id, :topic, :description)';
			$query = $dbh->prepare($write_topic);
			$query->execute([':id' => $id,':topic' => $topic_name, ':description' => $topic_description]);
		//id_topic
			$id_topic = $dbh->prepare("SELECT * FROM topics WHERE topic = :topic");
			$id_topic->execute([':topic' => $topic_name]);
			$result_mas_id_topic = $id_topic->fetch(PDO::FETCH_ASSOC);
		//create mas
			$data = array(
				'topic_id'=> $result_mas_id_topic['id'],
				'user' => $username,
				'topic_name' => $_POST['topicname'],
				'topic_description' =>  $_POST['topicdescription'],
			);
		return $data;
	}
}
?>	