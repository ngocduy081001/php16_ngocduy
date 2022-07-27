<?php
$a = 5;
$b = 12;
$c = 10;
$d = 7;
$e = ($a * $b) + $c * $d / $a;
print($e);;

session_start();
require_once "../connect.php";
require_once '../libs/HTML.php';
$query = 'SELECT `link` FROM `rss` WHERE `type` = "news" and `status` = "active"';
$link = $database->singleRecord($query);
if (empty($link)) {
    echo 'Đang cập nhật dữ liệu';
    return;
}
$url = $link['link'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$arrContextOptions = array(
    "ssl" => array(
        "cafile" => "/path/to/bundle/cacert.pem",
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
);

$content = file_get_contents($url, false, stream_context_create($arrContextOptions));
$xml = new SimpleXMLElement($content);
$html = '';
foreach ($xml->channel->item as $item) {
    $title = $item->title;
    $description = $item->description;
    $link = $item->link;
    $pubDate = date('Y-m-d H:i:s', strtotime($item->pubDate));
    preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU', $item->description . '<end>', $matches);
    $img = $matches[1][0];
    $description = $matches[2][0];
    $html .= '<div class="col-md-6 col-lg-4 p-3">
    <div class="entry mb-1 clearfix">
        <div class="entry-image mb-3">
            <a href="' . $link . '" data-lightbox="image" style="background: url(' . $img . ') no-repeat center center; background-size: cover; height: 278px;"></a>
        </div>
        <div class="entry-title">
            <h3><a href="' . $link . '" target="_blank"></a>
            </h3>
        </div>
        <div class="entry-content">
           ' . $description . '
        </div>
        <div class="entry-meta no-separator nohover">
            <ul class="justify-content-between mx-0">
                <li><i class="icon-calendar2"></i> ' . $pubDate . '</li>
                <li>vnexpress.net</li>
            </ul>
        </div>
        <div class="entry-meta no-separator hover">
            <ul class="mx-0">
                <li><a href="' . $link . '">Xem &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>';
}
echo $html;
