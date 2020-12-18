<?php

/*
Template Name: アーカイブページテンプレート
*/

?>
<?php get_header('netshop'); ?>

<body <?php body_class(); ?>>

<div class="container">

<h1 class="fontBold">高教組新聞</h1>
<p class="fontSmall mBottom30">発行された高教組新聞のバックナンバーをご覧いただけます。</p>

<!-- ページング処理 -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

	<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sel_term = htmlentities( $_POST["sel_term"], ENT_QUOTES, 'UTF-8' );
	} else {
		$sel_term = htmlentities( $_GET["sel_term"], ENT_QUOTES, 'UTF-8' );
	} ?>

<div class="row">
	<?php $args = array('post_type' => 'newspaper', 'post_status' => 'publish', 'taxonomy' => 'newspaper_cat', 'paged' => $paged); ?>
	<?php if($sel_term == 'all') {
	} elseif(isset($sel_term)) {
		$args = array_merge($args,array('term'=>$sel_term));
		if($sel_term == '') { $sel_term = 'all'; }
	} else {
		$sel_term = 'all';
	} ?>
	<ul class="newspaper_title">
	<li class="mBottom10" style="float: left;"><a href="<?php echo home_url('/archives/newspaper?sel_term=all') ?>" class="mBottom10" <?php if($sel_term == 'all') { echo 'style="font-weight: bold;"'; } ?>>全て</a>　</li><li class="mBottom10" style="float: left;"><a href="<?php echo home_url('/archives/newspaper?sel_term=sokuho') ?>" class="mBottom10" <?php if($sel_term == 'sokuho') { echo 'style="font-weight: bold;"'; } ?>>速報</a>　</li><li class="mBottom10" style="float: left;"><a href="<?php echo home_url('/archives/newspaper?sel_term=kappan') ?>" <?php if($sel_term == 'kappan') { echo 'style="font-weight: bold;"'; } ?>>活版</a>　</li><li class="mBottom10" style="float: left;"><a href="<?php echo home_url('/archives/newspaper?sel_term=kyonen') ?>" <?php if($sel_term == 'kyonen') { echo 'style="font-weight: bold;"'; } ?>>2019年度</a>　</li><li class="mBottom10" style="float: left;"><a href="<?php echo home_url('/archives/newspaper?sel_term=old') ?>" <?php if($sel_term == 'old') { echo 'style="font-weight: bold;"'; } ?>>2018年以前</a></li>
	</ul>
	<br clear="left">
	<?php $wp_query = new WP_Query($args); ?>
		<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
			<?php if( get_field('newspaper_pdf') ) { ?>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h2 class="pd"><i class="fa fa-file-pdf-o" aria-hidden="true"></i><a href="<?php the_field('newspaper_pdf'); ?>" target="_blank">&nbsp;<?php the_title(); ?></a></h2>
			</div>
			<?php } ?>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>

</div> <!-- row -->

	<?php if( $wp_query->max_num_pages > 1 ): ?>
		<div class="mBottom30"></div>
		<form method="post" action="https://fukuiko.jp/newspaper">
		<span class="new">
		<?php previous_posts_link( '<i class="fa fa-chevron-circle-left"></i>&nbsp;新しい新聞' ); ?>
		</span>

		<span class="old">
		　<?php next_posts_link( '過去の新聞&nbsp;<i class="fa fa-chevron-circle-right"></i>' ); ?>
		</span>
		<input type="hidden" name="sel_term" value="<?php echo $sel_term; ?>">
		</form>
	<?php endif ?>

	<?php wp_reset_query(); ?>

</div> <!-- container -->

<div class="mBottom50"></div>

<?php get_footer(); ?>