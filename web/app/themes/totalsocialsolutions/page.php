<?php
get_header();
global $post;
?>

<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/image/banner.jpg" class="img-responsive" alt="banner">
    <div class="banner-title">
        <div class="container">
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
</div>
<div class="inner-content">
    <div class="container">
        <div class="col-sm-12 col-xs-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <?php the_content(__('Read more')); ?><div class="clear"></div>

                    </div>
                    <?php
                endwhile;
            else:
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
        </div>
    </div>
</div>

<!--Buynow-->
<?php if (!get_field('disable_cta_button')): ?>
    <div class="cta">
        <div class="container">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Buy Now Button')) : ?>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>
<!--Buynow-->

<?php get_footer(); ?>
