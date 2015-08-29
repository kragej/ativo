<?php
/*
 Template Name: References Template
 *

*/
?>

<?php get_header(); ?>
			
			<div class="wrap cf">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="products-container cf">
					
					<?php 
							// check if any products are created
							if( have_rows('references') ):

								// loop through products
								while( have_rows('references') ): the_row(); ?>
									<div class="reference-box m-all t-1of2 d-1of2">
										
										<img src="<?php the_sub_field('screenshot'); ?>" />
										
										<h3><?php the_sub_field('title'); ?></h3>
										
										<p class="reference-description">
											<?php the_sub_field('description'); ?>
										</p>
										
										<p><a href="<?php the_sub_field('url'); ?>" target="_blank">Bes&oslash;g <?php the_sub_field('title'); ?></a></p>
									
									</div>	

								<?php endwhile; ?>
							<?php endif; ?>
						
					</div>

				<?php endwhile; endif; ?>

			</div>
			
			<div id="content" style="display: none;"> <!-- hidden for now -->

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">

									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>

								</header> <?php // end article header ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

								<?php comments_template(); ?>

							</article>

							<?php endwhile; endif; ?>

						</main>

						<!--
						<?php get_sidebar(); ?>
						-->
				</div>

			</div>

<?php get_footer(); ?>
