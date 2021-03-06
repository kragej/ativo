<?php
/*
 Template Name: Front Page Template
 *
*/
?>

<?php get_header(); ?>

			<div class="wrap-full banner-frontpage banner-background cf" style="<?php if( get_field('background_banner')){ echo "background-image: url('". get_field('background_banner')."')"; } ?>">
			
				<div class="tagline"><?php the_field('tagline'); ?></div>
			
			</div>
			
			<div class="wrap-full border-bottom cf">
				<div class="wrap cf">
					<h2 class="front-title">Nyeste Referencer</h2>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="cf">
							<?php 
							if( have_rows('references') ):
								while( have_rows('references') ): the_row(); ?>
									<a href="http://ativo.dk/referencer/">
										<div class="reference-box m-all t-1of2 d-1of2">
											<img src="<?php the_sub_field('screenshot'); ?>" />
											<h5><?php the_sub_field('title'); ?></h5>
										</div>	
									</a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					<?php endwhile; endif; ?>
				</div>
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

				</div>

			</div>
			

<?php get_footer(); ?>
