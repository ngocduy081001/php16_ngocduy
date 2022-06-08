<?php $arrMenu = [
    'index' => [
        "name"  => "Home",   "link"  => "index.php"
    ],
    'about' => [
        "name"  => "About",
        "link"  => "about.php",
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
    'contact' => [
        "name" => "Contact",
        "link" => "contact.php",
        "child" => [
            'hotline'      => ["name" => "hotline", "link" => "hotline.php"]
        ]
    ]
];

$arrBreadCrumb = [];
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    $arrBreadCrumb[$keyLevelOne][] = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];
    if (isset($menuLevelOne['child'])) {
        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            $arrBreadCrumb[$keyLevelTwo][] = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];
            $arrBreadCrumb[$keyLevelTwo][] = ['name' => $menuLevelTwo['name'], 'link' => $menuLevelTwo['link']];
            if (isset($menuLevelTwo['child'])) {
                foreach ($menuLevelTwo['child'] as $keyLevelTree => $menuLevelTree) {
                    $arrBreadCrumb[$keyLevelTree][] = ['name' => $menuLevelOne['name'], 'link' => $menuLevelOne['link']];
                    $arrBreadCrumb[$keyLevelTree][] = ['name' => $menuLevelTwo['name'], 'link' => $menuLevelTwo['link']];
                    $arrBreadCrumb[$keyLevelTree][] = ['name' => $menuLevelTree['name'], 'link' => $menuLevelTree['link']];
                }
            }
        }
    }
}