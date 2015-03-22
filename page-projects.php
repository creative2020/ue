<?php
/*
Template Name: Projects
*/
?>
<?php get_header(); ?>
<div id="page-main" class="row">
      <div class="page-inside col-sm-12">
    <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '611,90' ); ?>
    <div id="page-header" class="row">    
      <div class="col-sm-12">
        
          <!-- Projects -->
                <?php get_template_part( 'section','projects' ); ?>
            <!-- Projects -->
      </div>
        
    </div>
      

  </div>
</div>
  <?php get_footer() ?>