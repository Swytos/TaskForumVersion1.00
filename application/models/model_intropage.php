<?php session_start()?>
<?php
class Model_Intropage
{
	public function Logout()
	{ 
		require_once("A:/OSPanel/domains/ReviewBookMVS/application/connection_db/connection.php");
		//mas topics
		$topic_infotmation = $dbh->prepare("SELECT topic, description, username, topics.id AS topic_id FROM topics LEFT JOIN usertbl ON topics.id_user = usertbl.id");
		$topic_infotmation->execute();
		$result = $topic_infotmation->fetchAll(PDO::FETCH_ASSOC);
		
		if (empty($_SESSION['session_id'])) 
		{
			header("location:login");
		}

		if(isset($_POST["logout"]))
		{
			session_start();
			unset($_SESSION['session_id']);
			session_destroy();
			header("location:login");
		}	
		return $result;
	}
	
}
	
		