<?php
$arrContextOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
);
$link = 'https://sjc.com.vn/xml/tygiavang.xml';
$content = file_get_contents($link, false, stream_context_create($arrContextOptions));
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
