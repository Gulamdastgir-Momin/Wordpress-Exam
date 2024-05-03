<?php

/**
 * The template for displaying all single posts
 *
 *
 * @package WordPress
 * @subpackage exam
 * 
 **/

get_header();
?>

<!-- stats-sec-starts -->
<div class="stats-wrap section-bg blue-bg">
    <div class="container">
        <div class="content">
            <div class="row">
                <?php
                if (have_rows('sections')) :
                    while (have_rows('sections')) : the_row();
                        if (get_row_layout() == 'stats') :
                            $header = get_sub_field('header');
                            $description = get_sub_field('description');
                            $buttonText = get_sub_field('button_text');

                ?>
                            <div class="col-lg-6">
                                <h2 class="h3 title"><?php echo esc_html($header); ?></h2>
                                <p class="desc">
                                    <?php echo esc_html($description); ?>
                                </p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-sm btn-primary btn-icon-right">
                                        <?php echo esc_html($buttonText); ?>
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/btn-arrow-right.svg" alt="arrow" class="svg" /></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="card-group-sec">
                                    <?php
                                    $i = 1;
                                    if (have_rows('cards')) :
                                        while (have_rows('cards')) : the_row();
                                            $stats_number = get_sub_field('stats_number');
                                            $subtitle = get_sub_field('stats_subtitle');
                                    ?>
                                            <?php if ($i % 2 != 0) : ?>
                                                <li class="card card-top-left">
                                                    <?php if (!empty($stats_number)) ?>
                                                    <h3 class="h4 num"><?php echo esc_html($stats_number); ?><span>+</span></h3>
                                                    <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
                                                </li>
                                            <?php else : ?>
                                                <li class="card card-top-right">
                                                    <h3 class="h4 num"><?php echo esc_html($stats_number); ?><span>+</span></h3>
                                                    <p class="subtitle"><?php echo esc_html($subtitle); ?></p>
                                                </li>
                                    <?php endif;
                                            $i++;
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                            </div>
                            <?php

                            ?>
            </div>
        </div>
<?php
                        endif;
                    endwhile;
                endif;
?>
    </div>
</div>
<!-- stats-sec-ends -->

<?php
$blog = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'published',
    'posts_per_page' => 3,
));
?>

<!-- blog-home-starts -->
<div class="blog-home-wrap section">
    <div class="container">
        <div class="content">
            <div class="sec-title text-center">
                <h2 class="h2 title">Our Blogs</h2>
            </div>
            <?php
            $i = 1;
            if ($blog->have_posts()) :
            ?>
                <div class="row listing">
                    <?php while ($blog->have_posts()) : $blog->the_post(); ?>

                        <?php if ($i === 1) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                        <img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="blog-home" width="760" height="550" />
                                        <div class="overlay-text">
                                            <div class="date"><?php echo esc_html(get_the_date()); ?></div>
                                            <h3 class="h4 blog-title">
                                                <?php echo esc_html(get_the_title()); ?>
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row list-two">
                                <?php elseif ($i % 2 == 0) : ?>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="blog-home" width="527" height="263" />
                                                <div class="overlay-text">
                                                    <div class="date"><?php echo esc_html(get_the_date()); ?></div>
                                                    <h3 class="h4 blog-title">
                                                        <?php echo esc_html(get_the_title()); ?>
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                                                <img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="blog-home" width="527" height="263" />
                                                <div class="overlay-text">
                                                    <div class="date"><?php echo esc_html(get_the_date()); ?></div>
                                                    <h3 class="h4 blog-title">
                                                        <?php echo esc_html(get_the_title()); ?>
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    <?php endif;
                            $i++;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                            </div>
                </div>
                <div class="btn-wrap text-center">
                    <div class="btn btn-primary" id="load-more">View All Blogs</div>
                </div>
        </div>
    </div>
</div>
<!-- blog-home-ends -->


<!-- testimonial-sec-starts -->
<div class="testimonial-sec-wrap section-bg light-bg">
    <?php
    if (have_rows('sections')) :
        while (have_rows('sections')) : the_row();
            if (get_row_layout() === 'testinomals') :
                $title = get_sub_field('testimonial-banner-title');
    ?>
                <div class="content">
                    <div class="sec-title text-center">
                        <h2 class="h2 title"><?php echo $title; ?></h2>
                    </div>

                    <div class="full-slider-wrap">
                        <div class="container">
                            <div class="testimonial-slider swiper-slider">
                                <div class="swiper-wrapper">
                                    <?php
                                    if (have_rows('reviews')) :
                                        while (have_rows('reviews')) : the_row();
                                            $name        = get_sub_field('name');
                                            $designation = get_sub_field('occupation');
                                            $description = get_sub_field('description');
                                    ?>
                                            <div class="swiper-slide">
                                                <div class="card">
                                                    <div class="title-group">
                                                        <div class="left">
                                                            <h6 class="h6 name"><?php echo $name; ?></h6>
                                                            <div class="designation"><?php echo $designation; ?></div>
                                                        </div>
                                                        <div class="right">
                                                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/quote-img.png" alt="quote" width="49" height="32" />
                                                        </div>
                                                    </div>
                                                    <p class="desc">
                                                        <?php echo $description; ?>
                                                    </p>
                                                </div>
                                            </div>
                                    <?php endwhile;
                                    endif;
                                    ?>
                                </div>
                                <div class="custom-nav">
                                    <div class="swiper-prev testimonial-prev swiper-button">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/slider-prev-arrow.svg" alt="slider-arrow" class="svg" />
                                    </div>
                                    <div class="swiper-next testimonial-next swiper-button">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/slider-next-arrow.svg" alt="slider-arrow" class="svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            endif;
        endwhile;
    endif;
    ?>
</div>
<!-- testimonial-sec-ends -->


<?php
get_footer();
?>