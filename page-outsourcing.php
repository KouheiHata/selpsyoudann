<?php

/*
Template Name: アウトソーシングページテンプレート
*/

?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div><?php echo do_shortcode('[categorysearch]'); ?></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h4 class="text-center">outsourcing</h4>
        </div>
        <?php
$query = new WP_Query(
    array(
        'post_type' => 'outsourcing',
        'posts_per_page' => 3,
    )
);
?>
<?php
if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="mx-auto" style="max-width:210px;">
                <p class="news-img"><?php the_post_thumbnail(); ?></p>
                <p class="news-time"><?php the_time('Y年m月d日'); ?></p>
                <p class="news-title"><a class="url-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
        </div>
            <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>
    </div>
</div>


<?php get_footer(); ?>
