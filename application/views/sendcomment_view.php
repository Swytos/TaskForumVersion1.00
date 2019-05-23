<div class='grid-container-comment'>
<?php foreach ($data as $key){?>
	<div>
		<p align='left' data-user-id = "<?php echo $key['id_user'];?>"
						data-topic-id = "<?php echo $key['id_topic'];?>" 
						data-comment-id = "<?php echo $key['id'];?>">

			Comment: <?php echo $key['comment'];?> <br />
			Author: <?php echo $key['username'];?> <br />
			Time: <?php echo $key['datatime']?> <br />
			<a href = "#">Leave comment</a>
		</p>
	</div>
<?}?>
</div>