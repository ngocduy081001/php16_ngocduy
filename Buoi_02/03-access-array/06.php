<?php
$arrMenu = [
    'index' => [
        "name"  => "Home",   "link"  => "index.php"
    ],
    'about' => [
        "name"  => "About",
        "link"  => "data/about.php",
        "child" => [
            'service'   => [
                "name"  => "Service",
                "link"  => "service.php",
                "child" => [
                    'sale'      => ["name" => "Sale", "link" => "sale.php"],
                    'training'  => ["name" => "Training", "link" => "training.php"]
                ]
            ],
            'company'   => [
                "name" => "Company",
                "link" => "company.php",
                "child" => [
                    'toyota' => ["name" => "Toyota", "link"   => "toyota.php"]
                ]
            ]
        ]
    ],
    'contact' => ["name" => "Contact", "link" => "contact.php"]
];

// Yêu cầu: In ra tên của các menu cấp 3
// Output: Sale - Training - Toyota



$str = '';
foreach ($arrMenu as $key => $menuLevel1) {
    if (isset($menuLevel1['child'])) {
        foreach ($menuLevel1['child']    as $key => $menuLevel2) {
            if (isset($menuLevel2['child'])) {
                foreach ($menuLevel2['child']    as $key => $menuLevel3) {
                    $str .= $menuLevel3['name'] . ' - ';
                }
            }
        }
    }
}
echo substr($str, 0, -2);