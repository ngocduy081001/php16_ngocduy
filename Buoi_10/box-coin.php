<?php
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$parameters = [
    'start' => '1',
    'limit' => '10',
    'convert' => 'USD'
];

$headers = [
    'Accepts: application/json',
    'X-CMC_PRO_API_KEY: 79cc28b2-2223-4bce-8085-c565a52318da'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers 
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
curl_close($curl);
$data = json_decode($response, true);
$xhtmlCoin = '';

foreach ($data['data'] as $item) {
    $xhtmlCoin .= '<tr>
    <td>' . $item['name'] . '</td>
    <td>' . $item['quote']['USD']['price'] . '</td>';
    $item['quote']['USD']['percent_change_24h'] > 0 ? $xhtmlCoin .= ' <td><span class= "text-success" >' .  number_format($item['quote']['USD']['percent_change_24h'], 2, '.', '')  . '</span></td>
        </tr>' : $xhtmlCoin .= ' <td><span class="text-danger">' .  number_format($item['quote']['USD']['percent_change_24h'], 2, '.', '')  . '</span></td>
        </tr>';
}
// Close request
?>
<table class="table table-sm">
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Price (USD)</b></th>
            <th><b>Change (24h)</b></th>
        </tr>
    </thead>
    <tbody>

        <?= $xhtmlCoin  ?>
    </tbody>
</table>