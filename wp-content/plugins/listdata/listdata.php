<?php
/*Plugin Name: List Data
 *
 *
 *
 *
 * */


function displayPostRand()
{
    /*$post_id=86;
    $post=get_post($post_id,OBJECT,'any');



    $content=$post->post_content;
    $editorid='editpost';
    wp_editor($content,$editorid);*/

    ?>


    <form>

        <input placeholder="post_title" type="text" name="post_title" required/>
        <input type="text" name="post_content" placeholder="post_content" required/>
        <button id="insertAjax" type="submit">Submit</button>
    </form>

    <button id="empty">Empty</button>
    <button id="ajax">Ajax</button>
<?php
    echo '<div id="thangtest"></div>';

    ?>



    <?php wp_enqueue_script('ajaxscript');

    wp_localize_script('ajaxscript', 'ajaxobject', array('ajax_url' => admin_url('admin-ajax.php')));

}

//test gui? link xuyen khong


add_action('wp_ajax_my_ajax', 'my_ajax');
add_action('wp_ajax_nopriv_my_ajax', 'my_ajax');
function my_ajax()
{
    $post_id = $_POST['id'];
    //echo 'ssss'. $id;





    $arrAttrPost = array('posts_per_page' => 20);

    $queryPost = new WP_Query($arrAttrPost);


    if ($queryPost->have_posts()) {
            ?>
            <table>

            <tr>
                <td>Post</td>
                <td>btn</td>
            </tr>
        <?php
        while ($queryPost->have_posts()) {
            $queryPost->the_post();
            ?>
            <?php

            ?>
            <tr data-id="<?php echo the_ID(); ?>">
                <td>
                    <a href="<?php echo the_permalink(); ?>"><?php echo the_ID()?></a>
                    <input class="" type="text" value="<?php echo the_title(); ?>"/>
                    <textarea class=""><?php echo the_content(); ?></textarea>
                </td>
                <td >
                    <input class="updateItem" value="Update" type="button"/>
                    <input class="delItem" value="Del" type="button"/>
                </td>
            </tr>

            <?php
                    }
            ?>
            </table>
        <?php
    }
    wp_reset_query();

    wp_die();
}


add_action('wp_ajax_ajaxdel', 'ajaxdel');
add_action('wp_ajax_nopriv_ajaxdel', 'ajaxdel');

function ajaxdel()
{


    if (isset($_POST['id'])) {
        echo $id = $_POST['id'];
        $test = wp_delete_post($id, true);
    }

    wp_die();
}

add_action('wp_ajax_ajaxUpdate','ajaxUpdate');
add_action('wp_ajax_nopriv_ajaxUpdate','ajaxUpdate');

function ajaxUpdate(){
    if(isset($_POST['id'])){
         $id=$_POST['id'];
        $content=$_POST['content'];
    }else echo 'deo';

    $arrayPost=array(
        'ID'=>$id,
        'post_content'=>$content
    );

    $updateError=wp_update_post($arrayPost,true);
    if(is_wp_error($updateError)){
        $updateError->get_error_messages();
        foreach($updateError as $error){
            echo $error;
        }
    }

    wp_die();
}




function regScript()
{
    wp_register_script('ajaxscript', plugins_url('/js/scriptListpost.js', __FILE__));
}


add_action('wp_enqueue_scripts', 'regScript');


add_shortcode('displayPost', 'displayPostRand');
?>






<?php




?>
