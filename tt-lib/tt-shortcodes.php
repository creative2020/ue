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
            
    if ($cat_name == 'company' ) {
        
    //default Output HTML
                // image
        echo get_template_part( 'content', 'company' );

} else {
    //nothing
}
    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
//return $output;
}}}


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
//////////////////////////////////////////////////////// TT Forms table

add_shortcode( 'tt_form', 'tt_form' ); 
function tt_form ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'Form name',
            'link' => '#',
            'target' => '',
            'row' => '',
            'desc' => 'description',
            'file' => 'file-o',
            
		), $atts )
	);
    // classes
    if ( $row == 'header' ) {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;background:#cccccc;';
        $col2 = $desc;
        } 
    else if ( $row == 'last' ) {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;border-bottom:1px solid #cccccc;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
        }
    else if ( $row == 'first' ) {
        $style = 'margin-top:0;border-top:0px solid #cccccc;padding:0.5em 0;border-bottom:0px solid #cccccc;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
        }
    else {
        $style = 'margin-top:0;border-top:1px solid #cccccc;padding:0.5em 0;margin-top:-1.3em;';
        $col2 = '<a class="btn btn-primary" href="'.$link.'"><i class="fa fa-download"></i> Download</a>';
    }
    
    
        
    //get section html
    ob_start(); ?>
        <div class="row hover" style="<?php echo $style ?>">
            <div class="col-sm-8" style="font-size:1.1em;margin-top:0.5em;">
                 <i class="fa fa-<?php echo $file ?>" style="color:#802528;width:2.0em;"></i><?php echo $name ?>
            </div>
            <div class="col-sm-4 pull-right">
                 <?php echo $col2 ?>
            </div>
        </div>
        <?php
        $output .= ob_get_contents();
    ob_end_clean();
    return $output;
}
//////////////////////////////////////////////////////// TT Estimate list

add_shortcode( 'tt_estimates', 'tt_estimates' ); 
// echo do_shortcode('[tt_people name="all"]');
function tt_estimates ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => 'all',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '-1',
            'type' => 'estimate',
            
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
$output .= '<div class="row estimate-main-wrapper">'; //main-wrap    
//get section html
    ob_start(); ?>
        <div class="row estimate-header hidden-xs" style="padding:1.0em 0;background:#cccccc;">
            <div class="col-sm-2">Date</div>
            <div class="col-sm-4">Project</div>
            <div class="col-sm-2">Location</div>
            <div class="col-sm-2">Budget</div>
            <div class="col-sm-2">Contact</div>
        </div>
    <?php
        $output .= ob_get_contents();
    ob_end_clean();
    
$estimate_query = new WP_Query($args);
    
//loop
    if ($estimate_query->have_posts()) :


    while ($estimate_query->have_posts()) : $estimate_query->the_post();
    
    
    
    //get section html
    ob_start();
        include(get_template_directory().'/content-estimate.php');
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
  
  
  
  