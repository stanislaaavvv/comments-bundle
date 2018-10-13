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


	 
	 <div class="new_comment" data-offset="5">
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
			$('.new_comment').attr("data-offset","99999");
		  	reloadComments();

		});
	}

	function reloadComments() {

		var offset = $('.new_comment').attr("data-offset")

		$.ajax({
		  url: "comments/reload/"+offset,
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

	function editComment(comment_id,content) {

		if (comment_id < 0) {
			return;
		}

		if (content == "") {
			return;
		}

		$.ajax({
		  url: "edit/comment/"+comment_id+"/"+content,
		}).done(function(data) { 
		  	reloadComments();
		});
	}

	function addReply(content,reply_to_id) {

		if (reply_to_id < 0) {
			return;
		}

		if (content == "") {
			return;
		}

		$.ajax({
		  url: "reply/"+content+"/"+reply_to_id,
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

		$(".fa-edit").on("click",function(e){

			var comment_id = $(this).attr('data-id');
			var p          = $("#" + comment_id + "> .comment_body > p");

			$("p[contenteditable='true']").removeAttr('contenteditable');
			$(".editable").removeClass("editable");
			p.attr("contenteditable","true");
			p.focus();
			p.parent(".comment_body").addClass("editable");

			$(".editable").on("keypress",function(e){
				e.stopImmediatePropagation();
				if (e.keyCode == 13) {
					var comment_id = parseInt($(this).parent('.user_comment').attr("id"));
					if (isNaN(comment_id)) {
						comment_id = parseInt($(this).parent('.reply_body').attr("id"));
					}
					var content    = $(this).children('p').html();
					
					editComment(comment_id,content);
				}

			})
		})

		$(".fa-reply").on("click",function(e) {

			if ($("#reply_now").length != 0) {
				return;
			}

			var main_comment = $(this).closest('.user_comment');
			var reply_html   = '<li id="reply_now" class="reply_body"><div class="user_avatar"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/manugamero/73.jpg"></div><div class="comment_body"><p class="reply_text" data-id="'+ main_comment.attr("id")+'"contenteditable="true"></p></div></li>';
			
			main_comment.append(reply_html);
			$(".reply_text").focus();

			$(".reply_text").on("keypress",function(e){
				e.stopImmediatePropagation();
				if (e.keyCode == 13) {
					var comment_id = parseInt($(this).attr('data-id'));
					var content    = $(this).html();
					addReply(content,comment_id);
				}

			})
			
		})

		


	}


	$(window).on("scroll", function(e) {
		var scrollHeight   = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		
		if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
			
			if (parseInt($('.user_comment').length) == parseInt($('.new_comment').attr("data-offset"))) {
				var newoffset      = parseInt($('.new_comment').attr("data-offset")) + 5;
			    $('.new_comment').attr("data-offset",newoffset.toString());
			    reloadComments();
			}
			
		   
		}
	});

	bindEvents();
	



})();
</script>
<!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kfriedson/73.jpg"> -->