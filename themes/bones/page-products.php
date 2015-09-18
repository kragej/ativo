<?php
/*
 Template Name: Products Template
 *
*/
?>

<?php get_header(); ?>
			
			<div class="wrap-full banner-background cf" style="<?php if( get_field('background_banner')){ echo "background-image: url('". get_field('background_banner')."')"; } ?>">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="products-container cf">
					
						<h1><?php the_title(); ?> <span class="tagline"><?php the_field('tagline'); ?></span></h1>
					
						<?php if($_GET['ativo'] == "tilbud") : ?>
						<div class="price-table-column blue" style="display: block; margin: 0 auto 50px;">
							<div class="price-table-header slim">
								<span class="price-table-header-value"><h2>Ativo Medlemstilbud</h2></span>
							</div>
							<div class="price-table-price-row">
								<span class="price-value price-eksl">Månedspris: 350,- <span style="color: #7f7f7f; font-size: 22px; text-decoration: line-through;">450,-</span></span>
							</div>
							<div class="price-table-cell">
								<div class=""></div>
								<span class="price-table-cell-value">Vedligeholdelse + Fuld Service</span>
								<div class="price-table-cell-info">Alt fra pakken til 450,- her under, til en venlig pris :-)</div>
							</div>																
							<div class="price-table-cell">
								<div class=""></div>
								<span class="price-table-cell-value">TILMELD</span>
								<div class="price-table-cell-info">
								<?php echo do_shortcode("[stripeform serviceid='service350']"); ?>
								</div>
							</div>															
							<div class="price-table-footer"></div>
						</div>
						<?php endif; ?>
					
					  <?php 
							// check if any products are created
							if( have_rows('product') ):

								// loop through products
								while( have_rows('product') ): the_row(); ?>
									<div class="price-table-column <?php the_sub_field('product_color'); ?>">
										
										<div class="price-table-header slim">
											<?php if(get_sub_field('product_link')) { ?><a href="<?php the_sub_field('product_link'); ?>"><?php } ?>
											<span class="price-table-header-value"><h2><?php the_sub_field('product_name'); ?></h2></span>
											<?php if(get_sub_field('product_link')) { ?></a><?php } ?>
										</div>
										
										<div class="price-table-price-row">
											<?php if(get_sub_field('price_label') == 'from') { ?> <span class="price-value price-from price-eksl"><?php the_sub_field('product_price'); ?>,-</span><?php } ?>
											<?php if(get_sub_field('price_label') == 'more') { ?> <span class="price-readmore"><?php the_sub_field('product_price'); ?></span><?php } ?>
											<?php if(get_sub_field('price_label') == 'none') { ?> <span class="price-value price-eksl"><?php the_sub_field('product_price'); ?>,-</span><?php } ?>
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
												
												<div class="price-table-cell">
													<div class="<?php the_sub_field('class'); ?>"></div>
													<span class="price-table-cell-value"><?php the_sub_field('label'); ?></span>
													<div class="price-table-cell-info"><?php echo do_shortcode(get_sub_field('description')); ?></div>
												</div>
												
												
											<?php endwhile; ?>
										<?php endif; ?>
									
									<div class="price-table-footer">
										<?php if(get_sub_field('product_link')) { ?>
										<a href="<?php the_sub_field('product_link'); ?>">
											<span class="price-table-footer-value">Læs mere</span></a>
										</a><?php } ?>
									</div>
									
									</div>	

								<?php endwhile; ?>
							<?php endif; ?>
							
					</div>

				<?php endwhile; endif; ?>

			</div>
			
			<?php include (TEMPLATEPATH . '/contact-ribbon.php'); ?>
			
			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <?php // end article section ?>

								<footer class="article-footer cf">

								</footer>

							</article>

							<?php endwhile; endif; ?>

						</main>

						<!--
						<?php get_sidebar(); ?>
						-->
				</div>

			</div>

<?php get_footer(); ?>
