		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer">
				<?php if ( is_active_sidebar( 'section_topcontainer' ) ) : ?>
				<!-- #Notice Section (#topcontainer) Widget -->
				<?php dynamic_sidebar( 'section_topcontainer' ); ?>
				<!-- #Notice Section (#topcontainer) Widget -->
				<?php endif; ?>
			</div>
			<div id="maincontainer" role="main">
				<div id="searchbarcontainer">
					<div id="tagsearchcloud">
						<?php if ( is_active_sidebar( 'homepage_abovesearchbar' ) ) : ?>
								<?php dynamic_sidebar( 'homepage_abovesearchbar' ); ?>
						<?php endif; ?>
					</div>
					<div class="s009">
						<form>
							<div class="inner-form">
								<div class="basic-search">
									<div class="input-field">
										<input id="search" type="text" placeholder="Search.." />
										<div class="icon-wrap">
											<svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
												<path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
											</svg>
										</div>
									</div>
									<div id="tag-search">
									</div>
									<div>
									<ul id="tag-results"></ul>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<article id="page">
					<main itemprop="mainContentOfPage">
						<div style="background-color:#F9FCFF; min-height:100px; padding: 50px; margin: 50px 0px;">
							<header class="pagetitle">
								<h3 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h3>
							</header>
							<p>Test result.</p>
						</div>
						<div style="background-color:#F9FCFF; min-height:100px; padding: 50px; margin: 50px 0px;">
							<header class="pagetitle">
								<h3 class="entry-title" itemprop="pagetitle"><?php the_title(); ?></h3>
							</header>
							<p>Test result.</p>
						</div>
					</main>
				</article>
			</div>
		</div>
		<?php get_footer(); ?>