<div class="col-lg-6">
    <div class="card">
        <a href="<?php echo get_the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="blog-home" width="760" height="550" />
            <div class="overlay-text">
                <div class="date"><?php echo get_the_date(); ?></div>
                <h3 class="h4 blog-title">
                    <?php echo get_the_title(); ?>
                </h3>
            </div>
        </a>
    </div>
</div>