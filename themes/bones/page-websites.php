<?php
/*
 Template Name: Websites Template
 *

*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<section class="entry-content cf" itemprop="articleBody">
							
							
							<?php 
							// check if any products are created
							if( have_rows('product') ):

								// loop through products
								while( have_rows('product') ): the_row(); ?>
									<div class="price-table-column">
										
										<div class="price-table-header slim">
											<a href="<?php the_sub_field('product_link'); ?>">
											<span class="price-table-header-value"><h3><?php the_sub_field('product_name'); ?></h3></span>
											</a>
										</div>
										
										<div class="price-table-price-row <?php the_sub_field('product_color'); ?>">
											<?php if(get_sub_field('price_label') == 'from') { ?> <span class="price-text">Priser fra:</span><span class="price-value"><?php the_sub_field('product_price'); ?></span><?php } ?>
											<?php if(get_sub_field('price_label') == 'more') { ?> <span class="price-readmore">Læs Mere</span><?php } ?>
											<?php if(get_sub_field('price_label') == 'none') { ?> <span class="price-value"><?php the_sub_field('product_price'); ?></span><?php } ?>
										</div>
										
										<?php
										if( get_sub_field('product_description') ):
										?>
											<div class="price-table-description">
												<span><?php the_sub_field('product_description'); ?></span>
											</div>
										<?php endif; ?>
										
										<?php 
										// check if any product items exists
										if( have_rows('product_items') ):

											// loop through product items
											while( have_rows('product_items') ): the_row(); ?>
												
												<div class="price-table-cell <?php the_sub_field('class'); ?>">
													<span class="price-table-cell-value"><?php the_sub_field('label'); ?></span>
													<span class="price-table-cell-expand">+</span>
													<div class="price-table-cell-info"><?php the_sub_field('description'); ?></div>
												</div>
												
											<?php endwhile; ?>
										<?php endif; ?>
									
									</div>	

								<?php endwhile; ?>
							<?php endif; ?>
								
							</section>

						</article>

						<?php endwhile; endif; ?>

					</main>
				</div> <!-- #inner-content -->
			</div> <!-- #content -->
			
			<div id="guides-container">
				<div id="guides">
					<div class="guide">
						<img src="<?php bloginfo('template_directory'); ?>/library/images/website-icon.png" alt="Webshop - vi designer din online identitet" />
						<span class="guide-title">HJEMMESIDE</span>
						<span class="guide-description">Vi designer din online identitet</span>
					</div>
					<div class="guide">
						<img src="<?php bloginfo('template_directory'); ?>/library/images/webshop-icon.png" alt="Webshop - vi designer din online identitet" />
						<span class="guide-title">WEBSHOP</span>
						<span class="guide-description">Vi designer din online forretning</span>
					</div>
					<div class="guide">
						<img src="<?php bloginfo('template_directory'); ?>/library/images/app-icon.png" alt="Webshop - vi designer din online identitet" />
						<span class="guide-title">TRYKSAGER</span>
						<span class="guide-description">Vi designer dine tryksager</span>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
