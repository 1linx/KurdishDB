	<h3 class="containerh3titles"><?php comments_number(); ?></h3>
	<div id="commentsbox">
		<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	</div>
