<?php
/*
Plugin Name: <a href="http://www.youlicit.com">Youlicit More Widget</a>
Description: Give your readers relevant content for any link on your blog
Author: Youlicit
Version: 1.0
Author URI: http://www.youlicit.com
*/

function youlicit_init() {
	//add javascript to the blog
	echo '<script type="text/javascript" defer="defer" src="http://www.youlicit.com/widget/youlicit_more.js"></script>';
}

function add_sidebar_graphic() {

	if ( !function_exists('register_sidebar_widget') )
		return;

	// This is the function that outputs our (safe) javascript
	function widget_youlicitmore($args) {
		extract($args);
		
		echo $before_widget . $before_title . $title . $after_title;
		echo '<div id="youlicit_graphic"><a href="http://www.youlicit.com"><img src="http://www.youlicit.com/i/enriched_by_youlicit.gif" alt="Enriched By Youlicit" border="0"/></a></div>';
		echo $after_widget;
	}

	// This registers the  widget so it appears with the other available
	// widgets and can be dragged and dropped into any active sidebars.
	register_sidebar_widget(array('Youlicit Graphic', 'widgets'), 'widget_youlicitmore');
}

//add javascript on page
add_action('wp_footer', 'youlicit_init');

//add youlicit graphic on init
add_action('widgets_init', 'add_sidebar_graphic');
?>