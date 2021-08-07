<?php

/**
 * 
 Plugin name: Cam Most Viewed
 Description: Learning to write a plugin in wordpress
 Plugin Author: Davies Wabuluka
 * 
 *  */
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
global $query;
function tpw_save_post_views($query){

    if($query->is_main_query()){
        $postID = $query->queried_object->ID;

        $metakey = 'tpw_post_views';
        $views = get_post_meta($postID, $metakey, true);
        $post_count = (empty($views) ? 0: $views);
        $post_count ++;
    
        update_post_meta($postID, $metakey, $post_count);
    }
    
}

add_action('loop_start', 'tpw_save_post_views', 10, 1);
