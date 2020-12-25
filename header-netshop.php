<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0,initial-scale=1.0" />
<title><?php wp_title('',true); ?><?php if(wp_title('',false)) { ?> | <?php } ?><?php bloginfo('name'); ?></title>

<!-- Bootstrap4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<!-- CSS -->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
<!-- Responsive CSS -->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/responsive.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
// 商品詳細ページのサムネイル画像
$(function(){
	$("img.ChangePhoto").click(function(){
		var ImgSrc = $(this).attr("src");
		var ImgAlt = $(this).attr("alt");
		$("img#MainPhoto").attr({src:ImgSrc,alt:ImgAlt});
		$("img#MainPhoto").hide();
		$("img#MainPhoto").fadeIn("slow");
		return false;
	});
});
</script>

<?php
wp_deregister_script('jquery');
?>

<?php wp_head(); ?>
</head>

<div class="container" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-7 col-7 marginTop10">
			<span class="em125 bold">社会福祉法人&nbsp;福井県セルプ</span>&nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/netshop/onlineshop.jpg" alt="オンラインショップ" id="onlineshop_title">
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-5 marginTop10">
			<span id="con_btn">お問合せはこちら</span>
		</div>
	</div>
</div>
