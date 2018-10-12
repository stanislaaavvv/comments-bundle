<!-- used from https://codepen.io/arihamzah/pen/VebNXG
 -->
<!-- comments container -->
<head>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<div class="comment_block">

<!-- 
	Comments are structured in the following way:

	{ul} defines a new comment (singular)
	{li} defines a new reply to the comment {ul}

	example:

	<ul>
		<comment>
			
		</comment

			<li>
				<reply>

				</reply>
			</li>

			<li>
				<reply>

				</reply>
			</li>

			<li>
				<reply>

				</reply>
			</li>
	</ul>

 -->

 <!-- used by #{user} to create a new comment -->
 <div class="create_new_comment">

	<!-- current #{user} avatar -->
 	<div class="user_avatar">
 		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/BillSKenney/73.jpg">
 	</div><!-- the input field --><div class="input_comment">
 		<input type="text" placeholder="Join the conversation..">
 	</div>

 </div>


 <!-- new comment -->
 <div class="new_comment">

	<!-- build comment -->
 	<ul class="user_comment">

 		<!-- current #{user} avatar -->
	 	<div class="user_avatar">
	 		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/73.jpg">
	 	</div><!-- the comment body --><div class="comment_body">
	 		<p>Gastropub cardigan jean shorts, kogi Godard PBR&B lo-fi locavore. Organic chillwave vinyl Neutra. Bushwick Helvetica cred freegan, crucifix Godard craft beer deep v mixtape cornhole Truffaut master cleanse pour-over Odd Future beard. Portland polaroid iPhone.</p>
	 	</div>

	 	<!-- comments toolbar -->
	 	<div class="comment_toolbar">

	 		<!-- inc. date and time -->
	 		<div class="comment_details">
	 			<ul>
	 				<li><i class="fa fa-clock-o"></i> 13:94</li>
	 				<li><i class="fa fa-calendar"></i> 04/01/2015</li>
	 				<li><i class="fa fa-pencil"></i> <span class="user">John Smith</span></li>
	 			</ul>
	 		</div><!-- inc. share/reply and love --><div class="comment_tools">
	 			<ul>
	 			
	 				<li><i class="fa fa-edit fa-2x"></i></li>
	 				<li><i class="fa fa-trash fa-2x"></i></li>
	 				<li><i class="fa fa-reply fa-2x"></i></li>
	 				<li><i class="fa fa-thumbs-up fa-2x"></i></li>
	 			</ul>
	 		</div>

	 	</div>

	 	<!-- start user replies -->
	 	<li class="reply_body">
	 		
	 		<!-- current #{user} avatar -->
		 	<div class="user_avatar">
		 		<img src="https://s3.amazonaws.com/uifaces/faces/twitter/manugamero/73.jpg">
		 	</div><!-- the comment body --><div class="comment_body">
		 		<p>That's exactly what I was thinking!</p>
		 	</div>

		 	<!-- comments toolbar -->
		 	<div class="comment_toolbar">

		 		<!-- inc. date and time -->
		 		<div class="comment_details">
		 			<ul>
		 				<li><i class="fa fa-clock-o"></i> 14:52</li>
		 				<li><i class="fa fa-calendar"></i> 04/01/2015</li>
		 				<li><i class="fa fa-pencil"></i> <span class="user">Andrew Johnson</span></li>
		 			</ul>
		 		</div><!-- inc. share/reply and love --><div class="comment_tools">
		 			<ul>
		 				<li><i class="fa fa-share-alt"></i></li>
		 				<li><i class="fa fa-reply"></i></li>
		 				<li><i class="fa fa-heart love"><span class="love_amt"> 4</span></i></li>
		 			</ul>
		 		</div>

		 	</div>


	 	</li>

 	

 	</ul>

 </div>


	 		<!-- <img src="https://s3.amazonaws.com/uifaces/faces/twitter/kfriedson/73.jpg"> -->
	 

</div>