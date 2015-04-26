<?php
/*
 Template Name: Front Page Template
 *

*/
?>

<?php get_header(); ?>

			<div class="wrap-full banner-background cf" style="<?php if( get_field('background_banner')){ echo "background-image: url('". get_field('background_banner')."')"; } ?>">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="products-container cf">
					
					<?php 
					// check if any products are created
					if( have_rows('product') ):

						// loop through products
						while( have_rows('product') ): the_row(); ?>
							<article class="price-table-column" itemscope itemtype="http://schema.org/Product">
								
								<div class="price-table-header">
									<a href="<?php the_sub_field('product_link'); ?>">
									<span class="price-table-header-value"><h3 itemprop="name"><?php the_sub_field('product_name'); ?></h3></span>
									</a>
								</div>
								
								<?php 
								// check if any product items exists
								if( have_rows('product_items') ):

									// loop through product items
									while( have_rows('product_items') ): the_row(); ?>
										
										<div class="price-table-cell <?php the_sub_field('class'); ?>">
											<span class="price-table-cell-value"><?php the_sub_field('label'); ?></span>
											<div class="price-table-cell-info"><?php the_sub_field('description'); ?></div>
										</div>
										
									<?php endwhile; ?>
								<?php endif; ?>
							
								<div class="price-table-footer">
									<?php if(get_sub_field('price_label') == 'from') { ?> <a href="<?php the_sub_field('product_link'); ?>" class="price-value price-from"><?php the_sub_field('product_price'); ?>,-</a><?php } ?>
									<?php if(get_sub_field('price_label') == 'more') { ?> <a href="<?php the_sub_field('product_link'); ?>" class="price-readmore">Læs Mere</a><?php } ?>
									<?php if(get_sub_field('price_label') == 'contact') { ?> <a href="<?php the_sub_field('product_link'); ?>" class="price-contact">Kontakt os</a><?php } ?>
									<?php if(get_sub_field('price_label') == 'none') { ?> <a href="<?php the_sub_field('product_link'); ?>" class="price-value"><?php the_sub_field('product_price'); ?>,-</a><?php } ?>
								</div>
							
							</article>	

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
