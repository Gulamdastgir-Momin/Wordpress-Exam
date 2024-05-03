<?php
/*
    Template Name: Services
    package: WordPress
    Author: GM
*/
?>
<?php get_header(); ?>

<?php
$display_category = new WP_Query(array(
    'post_type' => 'service',
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => 'featured',
            'value' => 'yes'
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => 'health'
        )
    )
));
if($display_category->have_posts()){
    while($display_category->have_posts()){
       $display_category->the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <?php
    }
}


get_footer();