<?php function dumpText($data) { echo $data; }?>
<li class="reply_body" id=<?php dumpText($comment_id);?> replicable-to-id=<?php dumpText($id_to_reply);?>>
	 		
	<!-- current #{user} avatar -->
	<div class="user_avatar">
		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/manugamero/73.jpg">
	</div><!-- the comment body --><div class="comment_body">
		<p><?php dumpText($comment_body);?></p>
	</div>

	<!-- comments toolbar -->
	<div class="comment_toolbar">

		<!-- inc. date and time -->
		<div class="comment_details">
			<ul>
				<li><i class="fa fa-calendar"></i> <?php dumpText($created);?></li>
				<li><i class="fa fa-pencil"></i> <span class="user"> <?php dumpText($creator_name);?></span></li>
			</ul>
		</div><!-- inc. share/reply and love --><div class="comment_tools">
		<ul>
		
			<li><i class="fa fa-edit fa-2x  <?php dumpText($class_for_edit) ?>" data-id=<?php dumpText($comment_id) ?>></i></li>
			<li><i class="fa fa-trash fa-2x <?php dumpText($class_for_delete) ?>" data-id=<?php dumpText($comment_id) ?>></i></li>
			<li><i class="fa fa-thumbs-up fa-2x <?php dumpText($class_for_reaction) ?>"  data-id=<?php dumpText($comment_id) ?>></i></li>
		</ul>
	</div>


	</div>


</li>