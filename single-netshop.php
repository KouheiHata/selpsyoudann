<?php get_header('netshop'); ?>

<body <?php body_class(); ?>>

<main id="main" class="main">

    <div class="container marginTop100 marginBottom100">
        <div class="row">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else: ?>

            <p>投稿はありません</p>

        <?php endif; ?>

        </div>
    </div>

</main>


<?php get_footer(); ?>
