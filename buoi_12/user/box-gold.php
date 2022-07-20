<?php
session_start();
require_once "../connect.php";
require_once '../libs/HTML.php';
$query = 'SELECT `link` FROM `rss` WHERE `type` = "gold" and `status` = "active"';
$link = $database->singleRecord($query);
if (empty($link)) {
    echo 'Đang cập nhật dữ liệu';
    return;
}

$url = $link['link'];
$arrContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
);
$content = file_get_contents($url, false, stream_context_create($arrContextOptions));
$xml = new SimpleXMLElement($content);
$dataJson = json_encode($xml);
$dataRSS = json_decode($dataJson, true);
$xhtmlGold = '<table class="table table-bordered table-striped">
<thead>
    <tr>
        <th><b>Loại vàng</b></th>
        <th style="width:100px"><b>Mua vào</b></th>
        <th><b>Bán ra</b></th>
    </tr>
</thead><tbody>';
foreach ($dataRSS['ratelist']['city']['0']['item'] as $item) {
    $type = $item['@attributes']['type'];
    $sell = $item['@attributes']['sell'];
    $buy  = $item['@attributes']['buy'];
    $xhtmlGold .= '
    <tr>
        <td>' . $type . '</td>
        <td>' . $sell . '</td>
        <td>' . $buy . '</td>
    </tr>';
}
$xhtmlGold .= '</tbody> </table>';
echo $xhtmlGold;
