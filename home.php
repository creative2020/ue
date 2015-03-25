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

<?php get_template_part( 'section', 'family-companies' ); ?>

<!-- Projects -->
    <?php get_template_part( 'section','projects' ); ?>
<!-- Projects -->



<?php get_footer() ?>
