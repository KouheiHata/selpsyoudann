<?php get_header(); ?>


<main id="main" class="main">

    <div class="container">
        <div class="row">

            <?php
            $loop = new WP_Query(array("post_type => netshop"));
            if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>
                <header class="content-header">

                </header>

                <div class="product">
                <?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
                    <h1 class="content-h1">
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); ?>
                </div>

            </article>

            <?php endwhile; else: ?>

            <p>投稿はありません</p>

            <?php endif; ?>

        </div>
    </div>

</main>


<?php get_footer(); ?>
