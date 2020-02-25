<?php

function ar_recipe_creator_shortcode() {
	$creator_html = file_get_contents( 'creator-template.php', true );	
	$editor_html = ar_generate_content_editor();
	
	$creator_html = str_replace( 'CONTENT_EDITOR', $editor_html, $creator_html );
	
	return $creator_html;
}

function ar_generate_content_editor() {
	ob_start();	
	wp_editor( '', 'recipecontenteditor' );	
	$editor_contents = ob_get_clean();
	
	return $editor_contents;
}