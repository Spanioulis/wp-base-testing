<?php

// -------------------
// DISABLE GUTENBERG
// -------------------
add_filter('use_block_editor_for_post', '__return_false'); // all post types

// ----------------------
// ALLOW JSON UPLOADS
// ----------------------
function add_upload_mimes($types) {
    $types['json'] = 'application/json'; // Use application/json as the MIME type for JSON
    return $types;
}
add_filter('upload_mimes', 'add_upload_mimes');

?>
