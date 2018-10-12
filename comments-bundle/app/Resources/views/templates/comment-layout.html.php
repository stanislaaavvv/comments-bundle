<?php if (!function_exists('dumpInfo')) {function dumpInfo($data) { echo $data; } }?>
<ul class="user_comment" id=<?php dumpInfo($comment_id) ?>>

 		<!-- current #{user} avatar -->
	 	<div class="user_avatar">
	 		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/73.jpg">
	 	</div><!-- the comment body --><div class="comment_body">
	 		<p><?php dumpInfo($comment_body) ?></p>
	 	</div>

	 	<!-- comments toolbar -->
	 	<div class="comment_toolbar">

	 		<!-- inc. date and time -->
	 		<div class="comment_details">
	 			<ul>
	 				<li><i class="fa fa-calendar"></i> <?php dumpInfo($created) ?></li>
	 				<li><i class="fa fa-pencil"></i> <span class="user"> <?php dumpInfo($creator_name) ?></span></li>
	 			</ul>
	 		</div><!-- inc. share/reply and love --><div class="comment_tools">
	 			<ul>
	 			
	 				<li><i class="fa fa-edit fa-2x edit  <?php dumpInfo($class_for_edit) ?>" data-id=<?php dumpInfo($comment_id) ?>></i></li>
	 				<li><i class="fa fa-trash fa-2x delete <?php dumpInfo($class_for_delete) ?>" data-id=<?php dumpInfo($comment_id) ?>></i></li>
	 				<li><i class="fa fa-reply fa-2x"></i></li>
	 				<li><i class="fa fa-thumbs-up fa-2x <?php dumpInfo($class_for_reaction) ?>"  data-id=<?php dumpInfo($comment_id) ?>></i></li>
	 			</ul>
	 		</div>

	 	</div>
	 	<?php dumpInfo($replies) ?>
</ul>