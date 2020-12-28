<?php get_header(); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h4 class="text-center">NEWS</h4>
        </div>
        <?php
$query = new WP_Query(
    array(
        'post_type' => 'news',
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
                <p class="news-time"><?php the_date(); ?></p>
                <p class="news-title"><a class="url-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
        </div>
            <?php endwhile; ?>
<?php endif; wp_reset_postdata(); ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <a href="<?php echo home_url('/archives/netshop') ?>">オンラインショップ</a><br>
    </div>
</div>

<?php get_footer(); ?>