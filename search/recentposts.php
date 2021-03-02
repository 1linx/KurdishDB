<?php/* Template Name: Recent Posts
      * 
      * https://www.google.com/search?ei=pEAkYICnMNKU1fAPu9Cf8Ao&q=wordpress+show+recent+posts&oq=wordpress+show+recent+posts&gs_lcp=CgZwc3ktYWIQAzICCAAyAggAMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjoHCAAQRxCwA1Dx5ZwKWJfynApgm_ucCmgBcAJ4AIABe4gBngeSAQQxMi4xmAEAoAEBqgEHZ3dzLXdpesgBCMABAQ&sclient=psy-ab&ved=0ahUKEwiAiYrbkuDuAhVSShUIHTvoB64Q4dUDCA0&uact=5
      * 
      * https://developer.wordpress.org/reference/functions/wp_get_recent_posts/
      * https://www.wpbeginner.com/wp-tutorials/how-to-display-recent-posts-in-wordpress/#:~:text=In%20your%20WordPress%20dashboard%2C%20go,posts%20you%20want%20to%20display.
      * https://wordpress.stackexchange.com/questions/36453/how-to-display-last-3-posts-recent-posts-in-a-static-page
      * */?>
		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer"></div>
			<div id="maincontainer" role="main">


<ul>
<?php
    $recent_posts = wp_get_recent_posts();
    foreach( $recent_posts as $recent ) {
        printf( '<li><a href="%1$s">%2$s</a></li>',
            esc_url( get_permalink( $recent['ID'] ) ),
            apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
        );
    }
?>
</ul>
			</div>
		</div>
		<?php get_footer(); ?>