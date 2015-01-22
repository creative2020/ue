<div class="row">
    <div id="footer-wrap" class="col-sm-12">
        <div id="footer-col" class="col-sm-2 col-sm-offset-1">
            <img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ue-mark.svg" width="100%" alt="...">
        </div>
        <div id="footer-col" class="col-sm-4">
            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tagline.png" width="100%" alt="...">
        </div>
        <div id="footer-col" class="col-sm-4">
            Footer three
        </div>
        
    </div>    
</div>
          
      
  <div id="copyright" class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <p><?php _e('&copy;','flexx'); echo ' '.date('Y').' '; _e(''.bloginfo('name'). ' - All rights reserved.','flexx'); ?> | <a href="#" title="title">link</a> | </p>
      </div>
  </div>
  
</div><!--row-->

<?php wp_footer(); ?>

</body>
</html>