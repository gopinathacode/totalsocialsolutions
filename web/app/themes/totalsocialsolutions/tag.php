<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));

$Url = get_option('home') . '/service';

if ($current_url == $Url) {
    //$url = get_option('home') . '/services';
    header('Location:' . get_option('home') . '/services');
    exit;
}

get_header();
?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">

        <h3><?php echo get_the_archive_title(); ?></h3>
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
        <div class="col-sm-12 col-xs-12 cat">
            <div id="grid">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <div class="blog_list col-sm-4 grid-item">
                            <div class="blog_gallery_image landscape">
                                <?php 
                                    $feature_img = get_the_post_thumbnail($post->ID);
                                    if(!empty($feature_img)){                                    
                                ?>
                                <a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
                                    <?php echo get_the_post_thumbnail($post->ID); ?>
                                    <span class="blog_overlay"><img src="<?php bloginfo('template_url'); ?>/image/logo-hover .png" alt="TSS"></span>                                   
                                    <span class="blog_overlay_text"> Read More.. </span>
                                </a>
                                    <?php  } ?>
                                <div class="inner-blog">
                                    <a href="<?php the_permalink(); ?>" > <h5><?php echo $post->post_title; ?></h5></a>
                                    <span class="blog-admin"><?php the_author_posts_link(); ?></span>
                                   <!-- <span class="blog-date">
                                        <?php //echo get_the_time('d M Y', $post->ID); ?>
                                    </span> -->
                                    <?php
                                    $content_post = get_post($post->ID);
                                    $content = $content_post->post_content;
                                    $content = apply_filters('the_content', $content);
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    $content = wp_trim_words($content, 15, ' ...');
                                    $content = mb_strimwidth($content, 0, 90, '...');
                                    echo '<p>' . $content . '</p>';
                                    ?>
                                </div>

                            </div>
                        </div>

                        <?php
                    endwhile;
                else:
                    ?>

                    <p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
                <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
