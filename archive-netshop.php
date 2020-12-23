<?php

/*
Template Name: アーカイブページテンプレート
*/

?>
<?php get_header('netshop'); ?>

<body <?php body_class(); ?>>

<div style="width: 100%; background-size: cover;">
<img src="<?php echo get_template_directory_uri(); ?>/images/netshop/slide_01.jpg" style="width: 100%;">
</div>

<div class="container marginTop30">
<h5 style="text-align: center;" class="marginBottom10">お知らせ</h5>
<div style="border: solid 2px #000000; padding: 10px 20px; line-height: 1.5;" class="marginBottom50">
<div class="news-date">2021.3.15</div>
新商品が掲載されました。詳しくはこちら<br>
<div class="news-date">2021.3.1</div>
2021年3月1日福井県初の福祉商品オンラインショップがオープンしました。<br>
</div>

<!-- ページング処理 -->
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

	<?php if($_SERVER["REQUEST_METHOD"] == "GET"){
		$sel_term = htmlentities( $_GET["sel_term"], ENT_QUOTES, 'UTF-8' );
	} ?>

<div class="row">
	<?php $args = array('post_type' => 'netshop', 'post_status' => 'publish', 'taxonomy' => 'netshop_cat', 'paged' => $paged); ?>
	<?php if($sel_term == 'all') {
	} elseif(isset($sel_term)) {
		$args = array_merge($args,array('term'=>$sel_term));
		if($sel_term == '') { $sel_term = 'all'; }
	} else {
		$sel_term = 'all';
	} ?>

	<div class="col-lg-3 col-md-3 col-sm-3 col-3">
	<ul id="fixed-pos">
	<li class="marginBottom30" style="letter-spacing: 5px;">Category</li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=all#fixed-pos') ?>" <?php if($sel_term == 'all') { echo 'style="font-weight: bold;"'; } ?>>全て</a>　</li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=okashi#fixed-pos') ?>" <?php if($sel_term == 'okashi') { echo 'style="font-weight: bold;"'; } ?>>お菓子</a>　</li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=kamiseihin#fixed-pos') ?>" <?php if($sel_term == 'kamiseihin') { echo 'style="font-weight: bold;"'; } ?>>紙製品</a>　</li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=touki#fixed-pos') ?>" <?php if($sel_term == 'touki') { echo 'style="font-weight: bold;"'; } ?>>陶器</a>　</li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=accessory#fixed-pos') ?>" <?php if($sel_term == 'accessory') { echo 'style="font-weight: bold;"'; } ?>>アクセサリー</a></li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=bag#fixed-pos') ?>" <?php if($sel_term == 'bag') { echo 'style="font-weight: bold;"'; } ?>>バッグ</a></li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=bento#fixed-pos') ?>" <?php if($sel_term == 'bento') { echo 'style="font-weight: bold;"'; } ?>>弁当・飲料</a></li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=pan#fixed-pos') ?>" <?php if($sel_term == 'pan') { echo 'style="font-weight: bold;"'; } ?>>パン</a></li>
	<li class="marginBottom30"><a href="<?php echo home_url('/archives/netshop?sel_term=etc#fixed-pos') ?>" <?php if($sel_term == 'etc') { echo 'style="font-weight: bold;"'; } ?>>その他</a></li>
	</ul>
	</div>

	<div class="col-lg-9 col-md-9 col-sm-9 col-9">
		<div class="row" style="line-height: 1.5;">
		<?php $wp_query = new WP_Query($args); ?>
			<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-12 shop-list">
					<a href="<?php the_permalink(); ?>">
					<?php if(has_post_thumbnail()) { ?>
					    <?php the_post_thumbnail(); ?><br>
					<?php } else { ?>
					    <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="" /><br>
					<?php } ?>

					<?php the_title(); ?><br>
					<?php if( get_field('price') ) { ?>
						<?php $num = get_field('price'); ?>
						<?php echo number_format($num); ?>円（税込）
					<?php } ?>
					</a>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
		</div> <!-- row -->
	</div>

</div> <!-- row -->

	<?php if( $wp_query->max_num_pages > 1 ): ?>
		<div class="mBottom30"></div>
		<form method="post" action="<?php echo home_url('/archives/newspaper') ?>">
		<span class="new">
		<?php previous_posts_link( '<i class="fa fa-chevron-circle-left"></i>&nbsp;次の商品' ); ?>
		</span>

		<span class="old">
		　<?php next_posts_link( '前の商品&nbsp;<i class="fa fa-chevron-circle-right"></i>' ); ?>
		</span>
		<input type="hidden" name="sel_term" value="<?php echo $sel_term; ?>">
		</form>
	<?php endif ?>

	<?php wp_reset_query(); ?>

</div> <!-- container -->

<div class="mBottom50"></div>

<?php get_footer(); ?>