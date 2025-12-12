<?php
/*
 * Template Name: Home
 */
get_header();
?>

<!-- slider starts here -->
<div class="slider">
    <?php echo do_shortcode('[rev_slider alias="classicslider1"]'); ?>
</div>
<!-- Slider ends-->

<!--newsletter-->
<div class="news">
    <div class="container">
        <div class="news-letter">
            <div class="news-inner">
                <h2> newsletter </h2>
                <p> Sign up with your email to recieve news and updates </p>
            </div>
            <div class="email-box">
                <?php echo do_shortcode('[mc4wp_form id="1923"]'); ?>
<!--                <input type="email" placeholder="Email Address" class="email-address">
                <button type="button" class="btn">SUBSCRIBE</button>-->
            </div>
        </div>
    </div>
</div>

<!--newsletter ends-->

<!--SERVICE SECTION-->

<div class="service-section">
    <div class="container">
        <?php
        $args = array(
            'post_type' => 'whatwedo',
            'posts_per_page' => 4,
            'order_by' => 'menu_order',
            'order' => 'ASC'
        );
        $postslist = get_posts($args);
        $i = 1;
        foreach ($postslist as $post_view) {
            ?>
            <div class="col-sm-3 services">
                <div class="block">  
                    <a href="<?php echo get_option('home'); ?>/what-we-do#<?php echo $post_view->post_name; ?>">
                        <?php echo get_the_post_thumbnail($post_view->ID); ?>
                        <h3><?php echo $post_view->post_title; ?></h3>
                    </a>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>
</div>

<!--SERVICE SECTION-->

<!--What is our success ?-->
<div class="success">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-sm-6 content">
                    <?php the_content(__('Read more')); ?>
                    <div class="clear"></div>
                    <?php edit_post_link('(Edit)', '', ''); ?>
                </div>
                <div class="col-sm-6 video">
                    <iframe width="560" height="385" src="<?php echo get_field('youtube', $post->ID); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <?php
            endwhile;
        else:
            ?>

            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
    </div>
</div>
<!--What is our success ?--> 

<!--TESTIMONIAL--> 

<div class="testimonail">
    <div class="container">
        <!--Testimonials Start-->
        <h2>Testimonials</h2>	
        <ul class="bxslider1">
            <?php
            $testiArgs = array(
                'post_type' => 'testimonials',
                'posts_per_page' => '3',
                'orderby' => 'ID',
                'order' => 'DESC',
            );

            $wp_testi_query = new WP_Query($testiArgs);

            if ($wp_testi_query->have_posts()) :
                while ($wp_testi_query->have_posts()) : $wp_testi_query->the_post();
                    ?>
                    <li>
                        <?php
                        if (has_post_thumbnail($post->ID)) {
                            $testiimg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            $testiimg = $testiimg[0];
                            echo '<img src="' . $testiimg . '" alt="' . $post->post_title . '" title="' . $post->post_title . '" />';
                        }
                        ?>
                        <blockquote>
                            <p><?php echo $post->post_content; ?></p>
                            <h6><?php the_title(); ?></h6>
                            <span><?php echo get_field('sub_content', $post->ID); ?></span>	
                        </blockquote>
                    </li>
                    <?php
                endwhile;
            endif;
            wp_reset_query();
            ?>
        </ul>
    </div>
</div>
<!--TESTIMONIAL--> 


<!--How-we-are-->
<div class="how-we-are">
    <div class="container">

        <div class="col-sm-5 image">
            <?php
            $my_postid = 74;
            if (has_post_thumbnail($my_postid)) {
                $featruedimg = wp_get_attachment_image_src(get_post_thumbnail_id($my_postid), 'full');
                $featruedimg = $featruedimg[0];
            } else {
                $featruedimg = get_template_directory_uri() . '/image/chart.png';
            }
            ?>
            <img src="<?php echo $featruedimg; ?>" alt="chart"/>
        </div>

        <div class="col-sm-7 content">
            <?php
            $my_postid = 74; //This is page id or post id
            $content_post = get_post($my_postid);
            $title = $content_post->post_title;
            echo '<h2>'.$title.'</h2>';
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
            ?>
        </div>

    </div>
</div>
<!--How-we-are-->

<!--Social-->

<div class="social-network">
    <div class="container">

        <div class="col-sm-6 content">
            <!-- <h2>Why interactive and social media for aesthetic medical marketing ?</h2>
            <h6>The numbers speak for themselves:</h6>

            <ul>
                <li><b>Email</b> – More than 1 trillion emails per day</li>
                <li><b>Facebook</b> – Nearly 1 billion users</li>
                <li><b>Twitter</b> – 130,000 tweets PER MINUTE</li>
                <li><b>Yelp</b> – Over 1 million reviews per month</li>
                <li><b>Google+</b> – 100,000,000 users in less than a year.</li>
            </ul> -->

			<?php echo get_field('graph_content', $post->ID); ?>
        </div>

        <div class="col-sm-6 image">
			<?php 

			$image = get_field('graph_image', $post->ID);

			if( !empty($image) ): ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php endif; ?>
        </div>

    </div>
</div>

<!--Social-->

<!--Buynow-->
<?php if (!get_field('disable_cta_button')): ?>
    <div class="cta">
        <div class="container">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Buy Now Button')) : ?>
            <?php endif; ?>
    <!--        <h5><span>Buy Now</span>   Click here to start getting your ROI from your social marketing campaign</h5>
            <a class="click-here" href="#">Click here</a>-->

        </div>
    </div>
<?php endif; ?>
<!--Buynow-->

<?php get_footer(); ?>
