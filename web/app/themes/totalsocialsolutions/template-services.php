<?php
/*
 * Template Name: services
 */
?>
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
        <?php
        $getfaqs = array('post_type' => 'service',
            'posts_per_page' => -1,
            'order_by' => 'menu_order',
            'order' => 'ASC'
        );
        $getpostfaq = get_posts($getfaqs);
        ?>
        <!-- ================ accordian ================ -->
        <div class="accordion">
            <div class="accordion-section">
                <?php $i = 1; 
                    //print_r($_GET['accordion']);
                    foreach ($getpostfaq as $getpostfaqs) { ?>
                    <a class="accordion-section-title wow bounceInRight <?php
                    if ($i == $_GET['accordion']) {
                        echo "active";
                    }
                    ?> data-wow-duration='2s' " href="#<?php echo $getpostfaqs->post_name; ?>"><?php echo $getpostfaqs->post_title; ?></a>
                    <div id="<?php echo $getpostfaqs->post_name; ?>" class="accordion-section-content ">
                        <?php
                        $cnt = $getpostfaqs->post_content;
                        echo apply_filters("the_content", $cnt);
                        ?>
                    </div><!-- end .accordion-section-content -->
                    <?php $i++; ?>
                <?php } ?>
            </div><!-- end .accordion-section -->
        </div><!--  accordian  -->
        <!-- ================  end .accordion  ================ -->
    </div>
</div>
<?php get_footer(); ?>
