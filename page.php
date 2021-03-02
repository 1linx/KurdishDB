		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer"></div>
			<div id="maincontainer" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="page" <?php post_class(); ?>>
					<header class="pagetitle">
						<h1 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h1>
					</header>
					<main itemprop="mainContentOfPage">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
						<?php the_content(); ?>
					</main>
				</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
		<?php get_footer(); ?>