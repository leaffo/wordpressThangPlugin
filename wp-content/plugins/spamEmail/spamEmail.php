<?php
/*Plugin Name: Spam Email
 *
 *
 *
 *
 * */


function spamEmailFunc(){

?>
    <h1>Send Email</h1>
<?php
    echo '<';



    wp_enqueue_script('tenScript');
}


function regSpamJs(){
    wp_register_script('tenScript',plugins_url('/js/scriptSpam.js',__FILE__),array('jquery'));
}


add_action('wp_enqueue_scripts','regSpamJs');

add_shortcode('spamEmail',"spamEmailFunc");









