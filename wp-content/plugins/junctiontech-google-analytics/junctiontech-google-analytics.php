<?php
/***
*Plugin Name:Junctiontech-google-analytics
*Plugin URI:http:junctiontech.in
*Description: Adds a Google analytics trascking code to the <head> of your theme, by hooking to wp_head.
*Author-Junctiontech
*/


function wpjunctiontech_google_analytics() 
{?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91948239-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-91948239-1');
</script>

<?php }

add_action( 'wp_footer', 'wpjunctiontech_google_analytics', 10 );?>