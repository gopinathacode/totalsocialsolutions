<?php get_header(); ?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">

        <h1>Blog</h1>
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

        <?php
        $args = array(
            'type' => 'post',
            'taxonomy' => 'category',
            'exclude' => 1
        );
        $cats = get_categories($args);

        foreach ($cats as $cat) {
            ?>
            <div class="col-sm-6 col-xs-12">
                <h2 class="blog_title">
                    <?php if ($cat->slug == 'marketing') { ?>
                        <a href="<?php echo get_option('home') . '/marketingtips'; ?>" ><?php echo $cat->name; ?></a>
                        <?php
                    }
                    if ($cat->slug == 'news') {
                        ?>
                        <a href="<?php echo get_option('home') . '/recentnews'; ?>" ><?php echo $cat->name; ?></a>
                    <?php } ?>
                </h2>
                <div class="marketing-tips">
                    <?php
                    //print_r();
                    $args = array('type' => 'post', 'posts_per_page' => 1,
                        'category' => $cat->term_id);
                    $myposts = get_posts($args);
                    foreach ($myposts as $post_details) {
                        ?>
                        <div class="blog_list col-sm-12">
                            <div class="blog_gallery_image landscape">
                                <?php if (has_post_thumbnail($post->ID)) { ?>
                                    <a href="<?php the_permalink($post_details->ID); ?>" title="<?php echo $post_details->post_title; ?>">
                                        <?php echo get_the_post_thumbnail($post_details->ID); ?>
                                        <span class="blog_overlay"><img src="<?php bloginfo('template_url'); ?>/image/logo-hover .png" alt="TSS"></span>                                   
                                        <span class="blog_overlay_text"> Read More.. </span>
                                    </a>
                                <?php } ?>
                                <div class="inner-blog">
                                    <a href="<?php the_permalink($post_details->ID); ?>" > <h5><?php echo $post_details->post_title; ?></h5></a>
                                    <span class="blog-admin"><?php the_author_posts_link(); ?></span>
                                  <!--  <span class="blog-date">
                                        <?php //echo get_the_time('d M Y', $post_details->ID); ?>
                                    </span> -->
                                    <?php
                                    $content_post = get_post($post_details->ID);
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

                    <?php }
                    ?>
                    <div class="blog-read">
                        <?php if ($cat->slug == 'marketing') { ?>
                            <a href="<?php echo get_option('home') . '/marketingtips'; ?>">Read More</a>
                            <?php
                        }
                        if ($cat->slug == 'news') {
                            ?>
                            <a href="<?php echo get_option('home') . '/recentnews'; ?>">Read More</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        }
        wp_reset_query();
        ?>

    </div>
</div>
<?php get_footer(); ?>
