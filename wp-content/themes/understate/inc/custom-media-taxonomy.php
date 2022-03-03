<?php

// register new taxonomy which applies to attachments
function us_add_media_tag() {
	$labels = array(
		'name'              => 'Tags',
		'singular_name'     => 'Tag',
		'search_items'      => 'Search Tags',
		'all_items'         => 'All Tags',
		'parent_item'       => 'Parent Tag',
		'parent_item_colon' => 'Parent Tag:',
		'edit_item'         => 'Edit Tag',
		'update_item'       => 'Update Tag',
		'add_new_item'      => 'Add New Tag',
		'new_item_name'     => 'New Tag Name',
		'menu_name'         => 'Tag',
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'query_var' => true,
		'rewrite' => true,
		'show_admin_column' => true,
	);

	register_taxonomy( 'media_tag', 'attachment', $args );
}
add_action( 'init', 'us_add_media_tag' );

/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'attachment'; // change to your post type
	$taxonomy  = 'media_tag'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Show all %s', 'understate' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'attachment'; // change to your post type
	$taxonomy  = 'media_tag'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'upload.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}