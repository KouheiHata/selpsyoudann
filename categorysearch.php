<form method="get" action="<?php echo home_url(); ?>">
<input name="s" id="s" type="text" placeholder="キーワード" />
<?php wp_dropdown_categories('depth=0, orderby=name, hide_empty=1, show_option_all=カテゴリー選択'); ?>
<?php $tags = get_tags(); if ( $tags ) : ?>
<?php endif; ?>
<input id="submit" type="submit" value="検索" />
</form>