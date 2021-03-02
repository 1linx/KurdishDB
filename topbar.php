<?php/* Template Name: Top Container Box */?>

<?php get_template_part( 'entry' ); ?>


				<div class="topcontainer-box topcontainer-sb2">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
					<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>