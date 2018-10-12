<!-- used from https://codepen.io/arihamzah/pen/VebNXG
 -->
<!-- comments container -->
<?php function dumpData($data) { echo $data; }?>
<head>
  <link rel="stylesheet" href="<?php dumpData($view['assets']->getUrl('css/main.css'))?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<div class="comment_block">

	 <div class="create_new_comment">

		
	 	<div class="user_avatar">
	 		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/BillSKenney/73.jpg">
	 	</div><div class="input_comment">
	 		<input id="create_comment_input" type="text" placeholder="Join the conversation..">
	 	</div>

	 </div>


	 
	 <div class="new_comment">
		<?php dumpData($comments)?>
	 </div>


	 		
	 

</div>
<script type="text/javascript">
(function() {

	//FUNCTIONS
	function addComment() {

		var content = $("#create_comment_input").val();

		if (content == "") {
			return;
		}

		$.ajax({
		  url: "add/comment/"+content,
		}).done(function(data) {
		  	reloadComments();
		});
	}

	function reloadComments() {

		$.ajax({
		  url: "comments/reload",
		}).done(function(data) {
			
			$('.new_comment').empty();
			$('.new_comment').append(data);
		  	clearAddInput(); 
		  	bindEvents();
		});
	}

	function deleteComment(comment_id) {

		if (comment_id < 0) {
			return;
		}

		$.ajax({
		  url: "delete/comment/"+comment_id,
		}).done(function(data) {
		  	reloadComments();
		});
	}

	function addReaction(comment_id) {

		$.ajax({
		  url: "add/reaction/"+comment_id,
		}).done(function(data) { 
		  	reloadComments();
		});

	}


	function clearAddInput() {
		$("#create_comment_input").val("");
	}



	
	function bindEvents() {

		$(".input_comment").on("keypress",function(e){
			e.stopImmediatePropagation();
		if (e.keyCode == 13) {
			addComment();
			}

		})

		$(".delete").on("click",function(e){
			deleteComment(parseInt($(this).attr('data-id')));
		})

		$(".fa-thumbs-up").on("click",function(e) { 
			if (!($(this).hasClass('liked'))) {
				addReaction(parseInt($(this).attr('data-id')));
			}
		})

	}


	bindEvents();
	



})();
</script>
<!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kfriedson/73.jpg"> -->