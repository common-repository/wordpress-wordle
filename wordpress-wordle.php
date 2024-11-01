<?php
/*
Plugin Name: WordPress Wordle
Plugin URI: http://cruncht.com/wordpress/plugin/wordpress-wordle/
Description: Outputs text based on tags in your blog suitable for pasting into the Wordle form. The plugin provides a shortcode and a template tag.
Version: 0.1
Author: Murray Woodman
Author URI: http://murraywoodman.com/

Copyright 2009 Murray Woodman

This script is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This script is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
 * Use this in templates.
 * 
 * simple use:
 * <?php echo wordle_tags(); ?>
 *
 * include term id 1:
 * <?php echo wordle_tags('1'); ?>
 * 
 * exclude term id 2:
 * <?php echo wordle_tags('', '2'); ?>
 *
 * limit to top 100 tags:
 * <?php echo wordle_tags('', '', '100'); ?>
 * <?php echo wordle_tags('1', ', '100'); ?>
 * <?php echo wordle_tags('', '2', '100'); ?>
 *
 * @param    string    $include    Term ID to be included.
 * @param    string    $exclude    Term ID to be excluded. Include id overrides this.
 * @param    string    $number     The number of tags to be returned.
 * @return   string                A string of tag names suitable for pasting into Wordle.
 *
 */
function wordle_tags( $include="", $exclude="", $number="" ) {
	// feels weird doing string concat this way but it is the fastest apparently
	// http://blog.affien.com/archives/2007/09/23/stupid-php-1-strings-are-faster-than-arrays/
	$s = "";
	$tags = get_tags("include={$include}&exclude={$exclude}&number={$number}");
	foreach ( $tags as $tag ) {
		for ( $i=0; $i < $tag->count; ++$i ) {
			$s .= str_replace(" ", "~", $tag->name)." ";
		}
	}
	return $s;
}

/**
 * Shortcode usage for pages and posts.
 *
 * simple use:
 * [wordle_tags]
 *
 * include term id 1:
 * [wordle_tags include="1"]
 * 
 * exclude term id 2:
 * [wordle_tags exclude="2"]
 *
 * limit to top 100 tags:
 * [wordle_tags number="100"]
 * [wordle_tags include="1" number="100"]
 * [wordle_tags exclude="2" number="100"]
 * 
 * @uses wordle_tags()
 * @param    array    $atts     Shortcode attributes.
 * @return   string             A string of tag names suitable for pasting into Wordle.
 */
function wordle_tags_shortcode($atts) {
	extract(shortcode_atts(array(
		'include' => '',
		'exclude' => '',
		'number' => '',
	), $atts));
	return wordle_tags($include, $exclude, $number);
}
add_shortcode('wordle_tags', 'wordle_tags_shortcode');

?>