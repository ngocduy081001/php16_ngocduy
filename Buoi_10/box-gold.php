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
$dataJsom = json_encode($xml);
$dataRSS = json_decode($dataJsom, true);
$xhtml = '';
foreach ($dataRSS['ratelist']['city']['0']['item'] as $item) {
    $type = $item['@attributes']['type'];
    $sell = $item['@attributes']['sell'];
    $buy  = $item['@attributes']['buy'];
    $xhtml .= '<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><b>Loại vàng</b></th>
            <th style="width:100px"><b>Mua vào</b></th>
            <th><b>Bán ra</b></th>
        </tr>
    </thead>
    <tbody>

    <tr>
        <td>' . $type . '</td>
        <td>' . $sell . '</td>
        <td>' . $buy . '</td>
    </tr></tbody> </table>';
}
echo $xhtml;

?>
<!-- <table class="table table-sm">
    <thead>
        <tr>
            <th><b>Loại vàng</b></th>
            <th><b>Mua vào</b></th>
            <th><b>Bán ra</b></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td></td>
            <td>55.900</td>
            <td>56.450</td>
        </tr>

        <tr>
            <td>Vàng nhẫn SJC 99,99 1 chỉ, 2 chỉ, 5 chỉ</td>
            <td>54.650</td>
            <td>55.200</td>
        </tr>

        <tr>
            <td>Vàng nhẫn SJC 99,99 0,5 chỉ</td>
            <td>54.650</td>
            <td>55.300</td>
        </tr>

        <tr>
            <td>Vàng nữ trang 99,99%</td>
            <td>54.300</td>
            <td>55.000</td>
        </tr>

        <tr>
            <td>Vàng nữ trang 99%</td>
            <td>53.455</td>
            <td>54.455</td>
        </tr>

        <tr>
            <td>Vàng nữ trang 75%</td>
            <td>39.404</td>
            <td>41.404</td>
        </tr>

        <tr>
            <td>Vàng nữ trang 58,3%</td>
            <td>30.218</td>
            <td>32.218</td>
        </tr>

        <tr>
            <td>Vàng nữ trang 41,7%</td>
            <td>21.087</td>
            <td>23.087</td>
        </tr>
    </tbody>
</table> -->
<!-- <div class="text-center">
                                            <div class="spinner-border" style="width: 3rem; height: 3rem;"
                                                role="status">
                                            </div>
                                        </div> -->