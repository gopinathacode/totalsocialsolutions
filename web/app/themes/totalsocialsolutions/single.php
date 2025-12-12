<?php get_header(); ?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">

        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <?php
            if (function_exists('bcn_display')) {
                bcn_display();
            }
            ?>
        </div>

    </div>
</div>
<div class="inner-content">
    <div class="container">
        <div class="col-sm-12 col-xs-12">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="post">

                        <?php
                        if (has_post_thumbnail($post->ID)) {
                            $sliderImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            $sliderImg = $sliderImg[0];
                            //echo '<img src="' . $sliderImg . '" alt="banner" class="img-responsive" />';
                        }
                        ?>
                        <div class="cont-block">
                            <span class="blog-admin"><?php the_author_posts_link(); ?></span>
                           <!-- <span class="blog-date">
                                <?php //echo get_the_time('d M Y', $post->ID); ?>
                            </span> -->
                        </div>
                        <?php the_content(__("Read more", 'studiopress')); ?><div class="clear"></div>

                        <div class="postmeta">
                            <p><?php _e("", 'studiopress'); ?> <?php the_category(', ') ?></p>
                        </div>

                        <div class="clear"></div>

                        <div class="authorbox">
                            <p><?php echo get_avatar(get_the_author_email(), '64'); ?><strong><?php _e("", 'studiopress'); ?> <?php the_author(); ?></strong><br /><?php the_author_meta('description'); ?></p>
                            <div class="clear"></div>
                        </div>

                    </div>

                    <div class="postcomments">

                        <?php comments_template('', true); ?>

                    </div>

                    <?php
                endwhile;
            else:
                ?>

                <p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>
