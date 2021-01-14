<div id="search">
<form method="get" action="/outsourcing/">
 <input name="s" id="s" type="text" placeholder="キーワード" />
     <?php
    $args = array(
     'taxonomy' => 'outsourcing_cat',
     'name' => 'outsourcing_cat',
     'depth'=>'0',
     'orderby' => 'name',
     'hide_empty' => '1',
     'show_option_all' => '仕事一覧',
     'value_field' => 'slug',
    );
    wp_dropdown_categories($args);
 ?>
    <?php $tags = get_terms('outsourcing_tag');?>
    <?php if ( $tags ) ://複数検索の場合？ ?>
        <select name='tag' id='tag'>
        <option value="" selected="selected">地域選択</option>
        <?php foreach ( $tags as $tag ): ?>
        <option value="<?php echo esc_html( $tag->slug);  ?>"><?php echo esc_html( $tag->slug ); ?></option>
        <?php echo $tag->slug;?>
        <?php endforeach; ?>
        </select>
    <?php endif; ?>
 <input id="submit" type="submit" value="検索する" />
</form>
</div>


<?php
  $args = array(
    'post_type' => 'outsourcing',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
  );

  if(!empty($_POST['search_area'])) {
    foreach($_POST['search_area'] as $value) {
      $search_area[] = htmlspecialchars($value, ENT_QUOTES);
    }
    $tax_query_args[] = array(
                           'taxonomy' => 'area',
                           'terms' => $search_area,
                           'field' => 'slug',
                           'operator' => 'IN'
                        );
  }

  if(!empty($_POST['search_price'])) {
    foreach($_POST['search_price'] as $value) {
      $search_price[] = htmlspecialchars($value, ENT_QUOTES);
    }

    $tax_query_args[] = array(
                           'taxonomy' => 'price',
                           'terms' => $search_price,
                           'field' => 'slug',
                           'operator' => 'IN'
                        );
  }

  if(!empty($_POST['search_area']) || !empty($_POST['search_price'])) {
    $args += array('tax_query' => array($tax_query_args));
  }
?>

<div class="condition-title">仕事一覧</div>
<div class="condition">
  <?php
    $areas = get_terms('area', Array('hide_empty' => false));
    foreach($areas as $area):
      $checked = "";
      if(in_array($area->slug, $search_area)) $checked = " checked";
  ?>
  <label>
  <input type="checkbox" name="search_area[]" value="<?php echo esc_attr($area->slug); ?>"<?php echo $checked; ?>>
  <?php echo esc_html($area->name); ?>
  </label>
  <?php endforeach; ?>
</div>

<div class="condition-title">地域</div>
<div class="condition">
  <?php
    $prices = get_terms('price', Array('hide_empty' => false, 'orderby' => 'slug'));
    foreach($prices as $price):
      $checked = "";
      if(in_array($price->slug, $search_price)) $checked = " checked";
  ?>
  <label>
  <input type="checkbox" name="search_price[]" value="<?php echo esc_attr($price->slug); ?>"<?php echo $checked; ?>>
  <?php echo esc_html($price->name); ?>
  </label>
  <?php endforeach; ?>
</div>