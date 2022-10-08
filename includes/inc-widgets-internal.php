<?php

/**
 * Duplicated and tweaked WP core Categories widget class
 */
class WP_Widget_Categories_Custom extends WP_Widget {

    function __construct()
    {
        $widget_ops = array( 'classname' => 'widget_categories widget_categories_custom', 'description' => __( "A list of categories, with slightly tweaked output.", 'bonestheme'  ) );
        parent::__construct( 'categories_custom', __( 'Categories Custom', 'bonestheme' ), $widget_ops );
    }

    function widget( $args, $instance )
    {
        extract( $args );

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories Custom', 'bonestheme'  ) : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;
        ?>
        <ul>
            <?php
            // Get the category list, and tweak the output of the markup.
            $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )

            // $replacement = '<li$1><a$2>$3</a><span class="cat-count">$4</span>'; // no link on span
            // $replacement = '<li$1><a$2>$3</a><span class="cat-count"><a$2>$4</a></span>'; // wrap link in span
            $replacement = '<li$1><a$2><span class="cat-name">$3</span> <span class="cat-count badge">$4</span></a>'; // give cat name and count a span, wrap it all in a link


        $args = array(
                'orderby'       => 'name',
                'order'         => 'ASC',
                'show_count'    => 1,
                'title_li'      => '',
                'exclude'       => '',
                'echo'          => 0,
                'depth'         => 1,
        );

            $subject      = wp_list_categories( $args );
            echo preg_replace( $pattern, $replacement, $subject );
            ?>
        </ul>
        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['count'] = 1;
        $instance['hierarchical'] = 0;
        $instance['dropdown'] = 0;

        return $instance;
    }

    function form( $instance )
    {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = true;
        $hierarchical = false;
        $dropdown = false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title', 'bonestheme' ); ?>"><?php _e( 'Title:', 'bonestheme'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked( $count ); ?> disabled="disabled" />
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'bonestheme'  ); ?></label>
        <br />
        <?php
    }
}

// Register our tweaked Category Archives widget
function myprefix_widgets_init() {
    register_widget( 'WP_Widget_Categories_custom' );
}
add_action( 'widgets_init', 'myprefix_widgets_init' );



/*
Plugin Name: Recent Posts by Category Widget
Description: Just like the default Recent Posts widget except you can choose a category to pull posts from.
Version: 1.3
Author: Ross Cornell
Author URI: http://www.rosscornell.com
License: GPL
Copyright: Ross Cornell
*/

// Register widget

add_action( 'widgets_init', 'rpjc_register_widget_cat_recent_posts' );

function rpjc_register_widget_cat_recent_posts() {

    register_widget( 'rpjc_widget_cat_recent_posts' );

}

class rpjc_widget_cat_recent_posts extends WP_Widget {

    public function __construct() {
    
        parent::__construct(
    
            'rpjc_widget_cat_recent_posts',
            __( 'Recent Posts by Category', 'recent-posts-by-category-widget' ),
            array(
                'classname'   => 'rpjc_widget_cat_recent_posts widget_recent_entries',
                'description' => __( 'Display recent blog posts from a specific category', 'recent-posts-by-category-widget' )
            )
    
        );
    
    }

    // Build the widget settings form

    function form( $instance ) {
    
        $defaults  = array( 'title' => '', 'category' => '', 'number' => 5, 'show_date' => '' );
        $instance  = wp_parse_args( ( array ) $instance, $defaults );
        $title     = $instance['title'];
        $category  = $instance['category'];
        $number    = $instance['number'];
        $show_date = $instance['show_date'];
        
        ?>
        
        <p>
            <label for="rpjc_widget_cat_recent_posts_title"><?php _e( 'Title' ); ?>:</label>
            <input type="text" class="widefat" id="rpjc_widget_cat_recent_posts_title" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        
        <p>
            <label for="rpjc_widget_cat_recent_posts_category"><?php _e( 'Category' ); ?>:</label>              
            
            <?php

            wp_dropdown_categories( array(

                'orderby'    => 'title',
                'hide_empty' => false,
                'name'       => $this->get_field_name( 'category' ),
                'id'         => 'rpjc_widget_cat_recent_posts_category',
                'class'      => 'widefat',
                'selected'   => $category

            ) );

            ?>

        </p>
        
        <p>
            <label for="rpjc_widget_cat_recent_posts_number"><?php _e( 'Number of posts to show' ); ?>: </label>
            <input type="text" id="rpjc_widget_cat_recent_posts_number" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <p>
            <input type="checkbox" id="rpjc_widget_cat_recent_posts_show_date" class="checkbox" name="<?php echo $this->get_field_name( 'show_date' ); ?>" <?php checked( $show_date, 1 ); ?> />
            <label for="rpjc_widget_cat_recent_posts_show_date"><?php _e( 'Display post date?' ); ?></label>
        </p>
        
        <?php
    
    }

    // Save widget settings

    function update( $new_instance, $old_instance ) {

        $instance              = $old_instance;
        $instance['title']     = wp_strip_all_tags( $new_instance['title'] );
        $instance['category']  = wp_strip_all_tags( $new_instance['category'] );
        $instance['number']    = is_numeric( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? 1 : 0;

        return $instance;

    }

    // Display widget

    function widget( $args, $instance ) {

        extract( $args );

        echo $before_widget;

        $title     = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        $category  = $instance['category'];
        $number    = $instance['number'];
        $show_date = ( $instance['show_date'] === 1 ) ? true : false;

        if ( !empty( $title ) ) echo $before_title . $title . $after_title;

        $cat_recent_posts = new WP_Query( array( 

            'post_type'      => 'post',
            'posts_per_page' => $number,
            'cat'            => $category

        ) );

        if ( $cat_recent_posts->have_posts() ) {

            echo '<ul>';

            while ( $cat_recent_posts->have_posts() ) {

                $cat_recent_posts->the_post();

                echo '<li>';
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                if ( $show_date ) echo '<span class="post-date">' . get_the_time( get_option( 'date_format' ) ) . '</span>';
                echo '</li>';

            }

            echo '</ul>';

        } else {

            _e( 'No posts yet.', 'recent-posts-by-category-widget' );

        }

        wp_reset_postdata();

        echo $after_widget;

    }

}




?>