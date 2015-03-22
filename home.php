<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="row slider hidden-xs">
    <?php echo do_shortcode('[image-carousel]'); ?>
</div>

<?php //get_template_part( 'section','slider' ); ?>

<div class="row">
    <div id="quicklink-wrap" class="col-sm-12">
        <div class="row">
            <a href="/about-us/#idbo">
                <div class="quicklink col-sm-3 idbo" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/idbo-mark-20.svg');">
                    <div class="ql-logo">
                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotype-idbo.svg" alt="..."> 
                    </div>
                    
                </div>
            </a>
            <a href="/about-us/#mc">
                <div class="quicklink col-sm-3 millcreek" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/idbo-mark-20.svg');">
                    <div class="ql-logo">
                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotype-millcreek.svg" alt="..."> 
                    </div>
                    
                </div>
            </a>
            <a href="/about-us/#unitedexcel">
                <div class="quicklink col-sm-3 ue" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/idbo-mark-20.svg');">
                    <div class="ql-logo">
                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotype-ue.svg" alt="..."> 
                    </div>
                    
                </div>
            </a>
            <a href="/about-us/#ued">
                <div class="quicklink col-sm-3 ued" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/images/idbo-mark-20.svg');">
                    <div class="ql-logo">
                       <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotype-ued.svg" alt="..."> 
                    </div>
                    
                </div>
            </a>
        </div>
    </div>



</div>

<!-- Projects -->
    <?php get_template_part( 'section','projects' ); ?>
<!-- Projects -->



<?php get_footer() ?>
