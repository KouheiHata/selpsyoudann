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
     'value_field' => 'slug'
    );
    wp_dropdown_categories($args);
 ?>
 <input id="submit" type="submit" value="検索する" />
</form>
</div>