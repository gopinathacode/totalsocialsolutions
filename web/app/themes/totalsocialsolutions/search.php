<?php get_header(); ?>

<div class="inner-content">
    <div class="container">
        <div class="col-sm-12 col-xs-12">
			<div id="grid">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="grid-item col-xs-12 col-sm-4">
							<div <?php post_class(); ?>>
								<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

								<div class="postauthor">
									<p><?php _e("Posted by", 'studiopress'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'studiopress'); ?> <?php the_time('F j, Y'); ?> &middot; <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('Leave a Comment'), __('1 Comment'), __('% Comments')); ?></a>&nbsp;<?php edit_post_link(__('(Edit)'), '', ''); ?></p>
								</div>

							

								<div class="postmeta">
									<?php
                                $content = $post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                $content = wp_trim_words($content, 15, ' ...');
                                echo '<p>' . $content . '</p>';
                                ?>
                                <a class="btn btn-primary readmore" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-right"></i></a>              
								</div>

							</div>
						</div>

						<?php
					endwhile;
				else:
					?>

					<p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
				
			</div>
        <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
        </div>

    </div>
</div>

<?php get_footer(); ?>
