<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 Shortcodes


//////////////////////////////////////////////////////// TT Post Content

add_shortcode( 'post_info', 'post_info' );
function post_info ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $tt_post_content = get_post_field( 'post_content', $id );
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Button

// [hsr_btn size="lg" link="#" color="#003764" fcolor="#ffffff" float="none" target="" class=""]Button Name[/hsr_btn], homes_for_sale_btn

add_shortcode( 'tt_btn', 'tt_btn' );
function tt_btn($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '',
        'color'  => '#003764', //#003764
        'fcolor'  => '#ffffff', //#ffffff
        'link'    => '#',
        'float'    => 'none',
        'target'    => '_blank',
        'class' => '',
        'block' => 'n',
    ), $atts ) );
    
    $classes = 'btn btn-default ' . $class . ' btn-' . $size;
    
    if ($block == 'y') {
    	$classes .= ' btn-block';
    }

    return '<a type="button" class="' . $classes . '" href="' . $link . '" style="background:' . $color . ';color:'. $fcolor . ';float:' . $float . ';" target="' . $target . '">' . $content . '</a>';
}

//////////////////////////////////////////////////////// TT rule

add_shortcode( 'tt_rule', 'tt_rule' ); //line
function tt_rule($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1px',
        'color'  => '#ccc',
        'classes'  => 'col-sm-12 rule',
        'id' => '',
        'top' => 'n',
    ), $atts ) );

    if ($top == 'n') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"></div>';
    
    } else {
        
        // nothing
    }
     
    if ($top == 'y') {
    
    return '<div id="' . $id . '" class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"> <a href="#top" class="top"><i class="fa fa-arrow-circle-up pull-right"></i></a></div>';
        
    } else {
        
        // nothing
    }
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT spacer

add_shortcode( 'tt_spacer', 'tt_spacer' ); //line
function tt_spacer($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1.0em',
        'classes'  => 'col-sm-12',
    ), $atts ) );

    return '<div class="' . $classes . '" style="height:'.$size.';"></div>';
        
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Post Feed

add_shortcode( 'tt_posts', 'tt_posts' ); // echo do_shortcode('[tt_posts limit="-1" cat_name="home"]');
function tt_posts ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'post',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '10',
            'type' => 'post',
		), $atts )
	);
    
/////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {
	// The Query
$args = array(
	'post_type' => $type,
	'post_status' => 'publish',
	'order' => 'ASC',
	'posts_per_page' => $limit,
    'cat' => $cat,
    //'category_name' => $cat_name,
);
$the_query = new WP_Query( $args );
} else { 
	//nothing
	}
    
global $post;

// pre loop
//$output = '<ul>';    

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		// pull meta for each post
		$post_id = get_the_ID();
		$permalink = get_permalink( $id );
        $post = get_post();
        //$image = the_post_thumbnail( 'thumbnail' );
        $size = '250,125';
        $image = get_the_post_thumbnail( $post_id, $size, $attr );
        if (empty( $image )) {
            $image = '<img src="/wp-content/themes/math/images/img-fpo.png">';
        }
         
		
//HTML
        
    $output .= '<a href="'.$permalink.'"><div class="list-wrap"><div class="list-img col-xs-12 col-sm-4">';  
    $output .= $image .
                '</div>'.
                '<div class="row col-xs-12 col-sm-8">'. 
                    '<h2>'. $post->post_title .'</h2>'.
                    '<p>'. $post->excerpt .'</p>'.
                '</div></div>'.
                '</a>'.
                '<div class="clearfix"></div>';


	}
} else {
	// no posts found
	echo '<h2>No ' . $type . ' found</h2>';
}
    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT People

add_shortcode( 'tt_people', 'tt_people' ); 
// echo do_shortcode('[tt_people name="all"]');
function tt_people ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'all',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '-1',
            'type' => 'people',
		), $atts )
	);
    
    $args = array(
	'post_type' => $type,
	'post_status' => 'publish',
	'order' => 'ASC',
	'posts_per_page' => $limit,
    'cat' => $cat,
    //'category_name' => $cat_name,
);
//pre-loop    
$output = '';
$output .= '<div class="row people-main-wrapper">'; //main-wrap    
    
$people_query = new WP_Query($args);
    
//loop
    if ($people_query->have_posts()) :


    while ($people_query->have_posts()) : $people_query->the_post();
    
    // pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $permalink = get_permalink( $id );
    
    //Variables inside loop
        $sig_id = get_post_meta( $post_id, 'people_sig' );
        $people_quote = get_post_meta( $post_id, 'people_quote' );
        $sig_img = wp_get_attachment_image_src( $sig_id[0], 'medium' );
        $people_title = get_post_meta( $post_id, 'people_title' );
    
        $image = get_the_post_thumbnail( $post_id, 'medium' );
            if (empty( $image )) {
                $image = '<img src="/wp-content/themes/pkr/images/img-fpo.png">';
            }
    
    //get section html
    ob_start();
        include(get_template_directory().'/content-people.php');
        $output .= ob_get_contents();
    ob_end_clean();
    

endwhile;
    //post-loop
$output .= '</div>'; //main-wrap
endif;
wp_reset_postdata(); 

return $output;
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Map

add_shortcode( 'tt_map', 'tt_map' ); 
function tt_map ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'address' => '11184 Antioch, Overland Park, KS 66210',
            
		), $atts )
	);
    $output = '<iframe width="400" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA7FtA_cGN7ahKzvUYjAULTF_YMYRDxfrA &q='.$address.'></iframe>';
    
    return $output;
}

  
  
  
  