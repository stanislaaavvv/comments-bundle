<li class="reply_body" id = {{ comment_id }} replicable-to-id= {{ id_to_reply }}>
	 		
	<!-- current #{user} avatar -->
	<div class="user_avatar">
		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/manugamero/73.jpg">
	</div><!-- the comment body --><div class="comment_body">
		<p>{{ comment_body }}</p>
	</div>

	<!-- comments toolbar -->
	<div class="comment_toolbar">

		<!-- inc. date and time -->
		<div class="comment_details">
			<ul>
				<li><i class="fa fa-calendar"></i> {{ created }}</li>
				<li><i class="fa fa-pencil"></i> <span class="user"> {{ creator_name }}</span></li>
			</ul>
		</div><!-- inc. share/reply and love --><div class="comment_tools">
		<ul>
		
			<li><i class="fa fa-edit fa-2x" {{ class_for_edit }}></i></li>
			<li><i class="fa fa-trash fa-2x" {{ class_for_delete }}></i></li>
			<li><i class="fa fa-thumbs-up fa-2x"></i></li>
		</ul>
	</div>


	</div>


</li>