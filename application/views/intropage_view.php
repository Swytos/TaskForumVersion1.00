<script type="text/javascript">

	$(document).ready(function(){

		//добавляет форму для коментов
		$(document).on("click","input[name='addcomment']", function(){

			

			if (addcomment.getAttribute('data-topic-id')) {

				$("form[name='addcommentform']").css("display","block");
				$("input[name='addcomment']").css("display","none");

			} else {
				$('#sidebar2').html('');
				var error = '<p class="error" id="error">MESSAGE: Select topic!</p>';
				$(error).appendTo("#sidebar2");

			}
			
		});

		//добавляет форму для тем

		$(document).on("click","input[name='addtopic']", function(){

			$("form[name='addtopicform']").css("display","block");
			$("input[name='addtopic']").css("display","none");
		});

		// по клику отправляет запрос на файл send где тема записуется в базу и отправляется респонс с даными по теме 
		
		$(document).on("click","input[name='createtopic']", function(){
			$.ajax({
				url: 'sendtopic',
				type: 'POST',
				data: {
					'topicname': $("input[name='topicname']").val(),
					'topicdescription': $("textarea[name='topicdescription']").val()
				},
				success: function(data) {
					$(data).appendTo("#sidebar1");
				}
			});

			//настройка видимости форм

			$("form[name='addtopicform']").css("display","none");
			$("input[name='addtopic']").css("display","block");
			addtopicform.topicname.value = addtopicform.topicdescription.value ='';
		});

		//по клику отправляет запрос на файл где комент записуется в базу 

		$(document).on("click","input[name='createcomment']", function(){
			var id_topic = $(this).attr('data-topic-id');
			$.ajax({
				url: 'sendcomment',
				type: 'POST',
				data: {'commenttextarea': $("textarea[name='commenttextarea']").val(),
					   'id_topic': id_topic,
				},
				success: function(data) {
					$(data).appendTo("#sidebar2");
				}
			});
			//настройка видимости форм
			
			$("form[name='addcommentform']").css("display","none");
			$("input[name='addcomment']").css("display","block");
			addcommentform.commenttextarea.value ='';
		});
		//вызов коментариев
		$('body').on("click","a.topic_id", function(){
			$('#sidebar2').html('');

  			var id_topic = this.getAttribute('data-topic-id');

  			$.ajax({
  				url: 'comments',
  				type: 'POST',
  				data: {'id_topic': id_topic},
  				success: function(data) {

  					$("#error").css("display","none");
  					var messege = '<p class="error" id="messege">MESSAGE: Now you can add comment!</p>';
					$(messege).appendTo("#sidebar2");
  					$(data).appendTo("#sidebar2");
  					$("input[name='addcomment']").attr('data-topic-id', id_topic);
  					$("input[name='createcomment']").attr('data-topic-id', id_topic);

  				}
  			});
		});
		
	});
</script>

<!-- область хедера -->

<div class="grid-container-panel">
	<div>
		<center>
			<h2>Welcome, 
				<span><?php echo $_SESSION["session_username"]; ?>! </span>
			</h2>
		</center>	
			<form method="post" name="logoutform">
 				<p class="submit">
 					<input class="button" id="logout" name= "logout" type="submit" value="Log out">
 				</p>
 			</form>
	</div>
</div>
<div class="grid-container-sidebar">

	<!-- Область добавления тем -->

	<div>
		<center>
			<h2>
				<span>Guest book topics!</span>
			</h2>
		</center>
		<p>
			<h3 id="sidebar1"></h3>
			<p>

			<!-- вывод тем -->

			<?php foreach ($data as $user) {?>
			<hr>
			<p name="" align="left">
				Topic:
				<a href="#" class='topic_id' data-topic-id="<?php echo $user['topic_id']?>"> 
					<?php echo $user['topic']; ?>
				</a><br/>
				Description: <?php echo $user['description']; ?><br/>
				Author: <?php echo $user['username']; $topic = $user['topic']; ?><br/>	
			</p>
			<?}?>
				
		<!-- ______________________________________________________ -->

		<form method="post" name="addtopicform" style="display: none">
			<center>
				<p>
					<label>Topic name<br/>
						<input class="input" name="topicname" size="50" type="text" value="" >
					</label>
				</p>
			</center>
			<center>
				<p>
					<label>Topic description<br/>
						<textarea  cols="60" rows="5" name="topicdescription" ></textarea>
					</label>
				</p>
			</center>
				<p class="submit" >
					<input class="button" name= "createtopic" type="button" value="Create topic">
				</p>
		</form>
		<p class="submit">
			<input class="button" name= "addtopic" type="button" value="Add topic">
		</p>

	</div>

	<!-- Область коментирования  -->

	<div>
		<center>
			<h2>
				<span>Comment</span>
			</h2>
		</center>
		<p>
			<h3 id="sidebar2"></h3>
		<p>
		<form method="post" name="addcommentform" style="display:none">
			<center>
				<textarea  cols="60" rows="5" name="commenttextarea" ></textarea>
			</center>
			<p class="submit" >
				<input class="button" name= "createcomment" type="button" value="Create comment">
			</p>
		</form>
		<p class="submit" >
			<input class="button" id = "addcomment" name= "addcomment" type="button" value="Add comment">
		</p>
	</div>
</div>

