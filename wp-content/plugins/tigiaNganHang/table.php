<?php
//Plugin Name: Ti Gia Tien Te

/*function classExchangeRate(){
    register_widget('ExRate');
}

class ExRate extends WP_Widget{


    function __construct(){
        parent::__construct('idExrate','Ten Exrate');
    }

}*/


function regjs()
{
    wp_register_script( 'jqExchangeRate', plugins_url('/js/alert.js',__FILE__),array('jquery')) ;
};

add_action('wp_enqueue_scripts','regjs');
function exchangerate()
{
    $re = simplexml_load_file('https://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx');
    ?>

    <table id="table" class="table-bordered">
    <tr style="background-color:aquamarine">
        <td>Mã NT</td>
        <td>Tên Ngoại Tệ</td>
        <td>Mua Tiền Mặt</td>
        <td>Mua Chuyển khoản</td>
        <td>Bán</td>
    </tr><?php
    foreach ($re->Exrate as $item) {
        ?>
        <tr id="<?php echo $item['CurrencyCode']; ?>">
            <td><?php echo $item['CurrencyCode']; ?></td>
            <td><?php echo $item['CurrencyName']; ?></td>
            <td><?php echo $item['Buy']; ?></td>
            <td><?php echo $item['Transfer']; ?></td>
            <td><?php echo $item['Sell']; ?></td>
        </tr>
        <?php
    } ?></table><?php
    wp_enqueue_script('jq');
}



add_shortcode('exchangerate', 'exchangerate');

?>