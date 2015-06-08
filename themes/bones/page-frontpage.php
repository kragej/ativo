<?php
/*
 Template Name: Front Page Template
 *

*/
?>

<?php get_header(); ?>

			<div class="wrap-full banner-frontpage banner-background cf" style="<?php if( get_field('background_banner')){ echo "background-image: url('". get_field('background_banner')."')"; } ?>">
			
				<div class="tagline">Vi gør dit projekt til virkelighed</div>
			
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
