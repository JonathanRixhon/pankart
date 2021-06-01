<?php
/* *****
 * link to public path
 * *****/

function pk_asset($path)
{
    return rtrim(get_template_directory_uri(), '/') . '/public/' . ltrim($path, '/');
}

/* *****
 * Disable the Wordpress Gutenberg Editor
 * *****/

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
    return false;
}
