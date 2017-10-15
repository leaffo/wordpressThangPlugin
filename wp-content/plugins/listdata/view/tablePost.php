<table>
    <tr>
        <td>Post</td>
        <td>btn</td>
    </tr>
    <?php

    while ($random_query->have_posts()) {
        $random_query->the_post();
        ?>
        <tr>
        <td><p><a href="<?php echo the_permalink(); ?>">link
                </a>
                <input type="text" value="<?php echo the_title(); ?>"/></p></td>
        <td><p><input type="submit" value="Update"/>
                <input name="post_id" value="Del" type="submit"/></p></td></tr><?php
    };
    ?>
</table>

