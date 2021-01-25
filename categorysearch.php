<?php
  $args = array(
    'post_type' => 'outsourcing',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
  );

  if(!empty($_POST['search_category'])) {
    foreach($_POST['search_category'] as $value) {
      $search_category[] = htmlspecialchars($value, ENT_QUOTES);
    }
   $args += array('category__in' => $search_category);
  }
else {
$search_category[0] = '';
}

  if(!empty($_POST['search_tag'])) {
    foreach($_POST['search_tag'] as $value) {
      $search_tag[] = htmlspecialchars($value, ENT_QUOTES);
    }
    $args += array('tax_query' => array(
                array(
                    'taxonomy' => 'outsourcing_cat',
                    'field' => 'id',
                    'terms' => $search_category,
                     ),
                array(
                    'taxonomy' => 'outsourcing_tag',
                    'field' => 'id',
                    'terms' => $search_tag,
                     ),
            ));
  } else {
$search_tag[0] = '';
}
?>

<!-- 2. 検索フォームの表示 -->
<div class="search">
<form method="post" action="<?php echo esc_url(home_url() . $_SERVER['REQUEST_URI']); ?>">
<div class="checkbox">

<div class="condition-title">仕事内容</div>
<div class="condition">
  <?php
    $categories = get_categories(
        Array(
            'hide_empty' => false,
            'taxonomy' => 'outsourcing_cat'));
    foreach($categories as $category):
      $checked = "";
      if(in_array($category->term_id, $search_category)) $checked = " checked";
  ?>
  <label>
  <input type="checkbox" name="search_category[]" value="<?php echo esc_attr($category->term_id); ?>"<?php echo $checked; ?>>
  <?php echo esc_html($category->name); ?>
  </label>
  <?php endforeach; ?>
</div>
		
<div class="condition-title">地域</div>
<div class="condition">
  <?php
    $tags = get_terms(
        Array(
            'hide_empty' => false,
            'taxonomy' => 'outsourcing_tag'));
    foreach($tags as $tag):
      $checked = "";
      if(in_array($tag->term_id, $search_tag)) $checked = " checked";
  ?>
  <label>
  <input type="checkbox" name="search_tag[]" value="<?php echo esc_attr($tag->term_id); ?>"<?php echo $checked; ?>>
  <?php echo esc_html($tag->name); ?>
  </label>
  <?php endforeach; ?>
</div>	
	
</div>

<input type="submit" value="検索" class="submit-button">

</form>
																														 
<!-- 3. 検索結果の取得と表示 -->
<?php
  $the_query = new WP_Query($args);
  if($the_query->have_posts()) :
?>	
<div class="result">
<?php
  while($the_query->have_posts()) :
    $the_query->the_post();
?>			
<div class="article">
  <a href="<?php the_permalink(); ?>">
  <?php the_post_thumbnail('medium'); ?>
  <div><?php the_title(); ?></div>
  </a>
</div>
<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php else : ?>
<p>該当する企業はありませんでした。</p>
<?php endif; ?>

</div>

<?php
$terms = get_terms( 'outsourcing-cat');
foreach ($tags as $tag) {
echo print_r($tag);
}
?>