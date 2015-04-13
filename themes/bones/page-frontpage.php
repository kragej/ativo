<?php
/*
 Template Name: Front Page Template
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
							
							<div class="price-table-column">
								<div class="price-table-header">
									<span class="price-table-header-value">HJEMMESIDE</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-footer">
									<span class="price-text">Priser fra:</span>
									<span class="price-value">3.500,-</span>
								</div>
							</div>
							
							<div class="price-table-column">
								<div class="price-table-header">
									<span class="price-table-header-value">WEBSHOP</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-footer">
									<span class="price-text">Priser fra:</span>
									<span class="price-value">3.500,-</span>
								</div>
							</div>
							
							<div class="price-table-column">
								<div class="price-table-header">
									<span class="price-table-header-value">SERVICES</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-footer">
									<span class="price-text">Priser fra:</span>
									<span class="price-value">3.500,-</span>
								</div>
							</div>
							
							<div class="price-table-column">
								<div class="price-table-header">
									<span class="price-table-header-value">APPS</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-cell">
									<span class="price-table-cell-value">Nemt, personligt</span>
								</div>
								<div class="price-table-footer">
									<span class="price-text">Priser fra:</span>
									<span class="price-value">3.500,-</span>
								</div>
							</div>
							
								
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
