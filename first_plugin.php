<?php

/*
 * Plugin Name:       My First Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/ 

// defined('ABHPATH') || exit;
class First_class{
    public function __construct(){
        // add_filter('the_title',[$this,'strtoupp']);
        add_filter('the_content',[$this,'strtoupp']);
    }
    function strtoupp( $title_content ){
        if(is_singular('post') && in_category('Uncategorized')){
            return strtoupper( $title_content);
        }
        else{  
            return  $title_content;
        }
    }
}

new First_class();

class Second_class{
    public function __construct(){
        add_filter('the_content',[$this,'fp_calculate_reading_time']);
    }
    public function fp_calculate_reading_time( $title_content ){
        $word_count = str_word_count(strip_tags($title_content));
        $reading_time = ceil($word_count/200);
        return '<p> Total estimated time to read:&nbsp;'.$reading_time.' minutes&nbsp;('.$word_count.' words)<br><br>'.$title_content.'</p>';
    }

}

new Second_class();