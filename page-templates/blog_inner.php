<?php $news = new WP_Query(array('post_type' => 'post', 'post__not_in' => array($exclude_id), 'paged' => get_query_var('paged') ?: 1, 'cat' => $_GET['tag'], 's' => ($_GET['search']),'sentence'=>1)); ?>
<?php if ($news->found_posts > 0) { ?>
	<ul class="posts">
		<?php if ($news->have_posts()) : while ($news->have_posts()) : $news->the_post(); ?>
				<li>
					<div class="post">
						<a href="<?php the_permalink(); ?>" class="post__pic">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
						</a>
						<div class="mt-10">
							<span class="color-muted lh-155"><?php echo get_the_date(); ?></span>
						</div>
						<div class="post__title mt-10">
							<h5>
								<a href="<?php the_permalink(); ?>" class="color-white truncate">
									<?php the_title(); ?>
								</a>
								<span class="hover-decor">
									<img src="<?php bloginfo('template_directory'); ?>/assets/images/content/hover-decor.svg" alt="" />
								</span>
							</h5>
						</div>
						<div class="mt-10 color-white lh-155 truncate">
							<p>
								<?php echo truncate(get_field('short_text'), 100); ?>
							</p>
						</div>
					</div>
				</li>

			<?php endwhile; ?>
		<?php endif; ?>
		<li class="post-empty"></li>
		<li class="post-empty"></li>
	</ul>
	<?php if ($news->max_num_pages > 1) { ?>
		<div class="pagination mt-45 sm-max:mt-35">
			<div class="pagination__holder" data-pagination>
				<?php //the_posts_pagination();
				$big = 999999999; // need an unlikely integer
				$pretext = '<span class="pagination__prev">
												<svg class="icon-arrow">
													<use xlink:href="#icon-arrow"></use>
												</svg>
												<span class="desktop">
													Previous
												</span>
												<span class="mob">
													Newer Articles
												</span>
											</span>';
				$posttext = '<span class="pagination__next">
												<span class="desktop">
													Next
												</span>
												<span class="mob">
													Older Articles
												</span>
												<svg class="icon-arrow">
													<use xlink:href="#icon-arrow"></use>
												</svg>
											</span>';
				$html = paginate_links(array(
					'base' => str_replace($big, '%#%', get_pagenum_link($big)),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'prev_next' => true,
					'prev_text'    => $pretext,
					'next_text'    => $posttext,
					'total' => $news->max_num_pages,
					'type' => 'list'
				));
				$pre_deco = $pretext;
				$post_deco = $posttext;
				$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
				if (1 === $paged) {
					$html = $pre_deco . $html;
				}
				if ($news->max_num_pages ==  $paged) {
					$html = $html . $post_deco;
				}
				echo $html;
				?>
			</div>
		</div>
	<?php } ?>
<?php } else { ?>
	<div class="text-center">
		<h4>
			We are preparing articles for you.
			<span class="block">We'll add them as soon as possible 😉</span>
		</h4>
	</div>
<?php } ?>
