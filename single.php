		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer"></div>
			<div id="maincontainer" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="page" <?php post_class(); ?>>
					<header class="pagetitle">
						<h1 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h1>
					</header>
					<main itemprop="mainContentOfPost">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
						<?php the_content(); ?>
					</main>
					<?php echo do_shortcode( '[metadata element=”date,author,sticky,views,custom_fields”]' ); ?>
				</article>
				<?php endwhile; endif; ?>
			</div>
			<div id="downloadscontainer">
				<?php echo do_shortcode( '[download-attachments title="Attachments" style="none" display_icon="1" display_user="1" display_empty="1" display_option_none="<div id=tagbox>No attachments.</div>"]' ); ?>
			</div>
			<div id="tagscontainer">
				<?php get_template_part( 'entry-tags' ); ?>
			</div>
			<div id="commentscontainer">
				<?php get_template_part( 'entry-comments' ); ?>
			</div>
		</div>
		<?php get_footer(); ?>