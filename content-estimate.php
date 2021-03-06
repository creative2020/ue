<?php
// pull meta for each post
        $post_id = get_the_ID();
        $post_thumbnail_id = get_post_thumbnail_id( $post_id );
        $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id, 'medium' );
        $post_thumbnail_url_tn = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );
        $permalink = get_permalink( $id );
    
    //Variables inside loop
        $estimate_date = get_post_meta( $post_id, 'tt_estimate_date' );
        $estimate_location = get_post_meta( $post_id, 'tt_estimate_location' );
        $estimate_budget = get_post_meta( $post_id, 'tt_estimate_budget' );
        $estimate_contact = get_post_meta( $post_id, 'tt_estimate_contact_name' );
?>

<?php if ($name == 'all') { ?>

<div class="row estimate" style="padding:1.0em 0;border-bottom:1px solid #cccccc">
        <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-12">
            <div class="col-sm-2">
                <?php echo $estimate_date[0]; ?>
            </div>
            <div class="col-sm-4 estimate-name">
                <?php echo the_title(); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $estimate_location[0]; ?>
            </div>
            <div class="col-sm-2">
                $ <?php echo $estimate_budget[0]; ?>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-primary btn-sm" href="#" style=""><?php echo $estimate_contact[0]; ?></a>
            </div>
        </div>
</div><!--row-->


<?php } else if ( is_single() ){ ?>

    <!--nothing-->
    
<?php } else { ?><!--default--> 
    
    nothing
    
<?php } ?><!--end-->