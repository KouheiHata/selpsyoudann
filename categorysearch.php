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
    <?php $tags = get_tags();?>
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