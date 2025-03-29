<?php
$webhook_url = "https://colife-invest.bitrix24.ru/rest/15013/ymjrykdfcd263bjp/log.blogpost.delete.json?POST_ID=";

$start_id = 101;
$end_id = 25;

for ($post_id = $start_id; $post_id >= $end_id; $post_id -= 2) {
    $url = $webhook_url . $post_id;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo "Удалён пост с ID: $post_id, ответ: $response\n";
}
?>
