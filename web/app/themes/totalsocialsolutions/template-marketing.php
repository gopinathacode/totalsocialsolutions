<?php
/*
 * Template Name: Marketing Tips
 */
get_header();
?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">

        <h1><?php echo the_title(); ?></h1>
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
                <?php
                if (get_query_var('paged')) {
                    $paged = get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }

                $post_per_page = get_option('posts_per_page');

                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'posts_per_page' => $post_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'marketing',
                        ),
                    ),
                );

                $temp = $marketing;
                $marketing = null;
                $marketing = new WP_Query($args);
                if ($marketing->have_posts()) :
                    while ($marketing->have_posts()) : $marketing->the_post();
                        ?>

                        <div class="blog_list col-sm-4 grid-item">
                            <div class="blog_gallery_image landscape">
                                <?php if (has_post_thumbnail($post->ID)) { ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo $post->post_title; ?>">
                                        <?php echo get_the_post_thumbnail($post->ID); ?>
                                        <span class="blog_overlay"><img src="<?php bloginfo('template_url'); ?>/image/logo-hover .png" alt="TSS"></span>                                   
                                        <span class="blog_overlay_text"> Read More.. </span>
                                    </a>
                                <?php } ?>
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
                endif;
// Reset Post Data
                wp_reset_postdata();
                ?>
            </div>
            <div class="page-navigation">
                <?php
                $big = 999999999; // need an unlikely integer

                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '/page/%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $marketing->max_num_pages
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>