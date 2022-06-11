<?php
require_once 'data.php';

$xhtmlMenu = '';
$currentMenu = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
if (!empty($arrMenu)) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = ($keyLevelOne == $currentMenu)  ? 'class="active"' : " ";
        if (isset($menuLevelOne['child'])) {
            if (in_array($currentMenu, array_keys($menuLevelOne['child'])) == true) $classActive = 'class="active"';
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                if (isset($menuLevelTwo['child'])) {
                    if (in_array($currentMenu, array_keys($menuLevelTwo['child'])) == true) $classActive = 'class="active"';
                }
            }

            // foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            //     if ($keyLevelTwo == $currentMenu) $classActive = 'class="active"';
            //     if (isset($menuLevelTwo['child'])) {
            //         foreach ($menuLevelTwo['child'] as $keyLevelTree => $menuLevelTree) {
            //             if ($keyLevelTree == $currentMenu)  $classActive = 'class="active"';
            //         }
            //     }
            // }
            $xhtmlMenu .= sprintf('<li %s> <a href="%s">%s</a><ul>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                if (isset($menuLevelTwo['child'])) {
                    $xhtmlMenu .= sprintf('<li> <a href="%s">%s</a><ul>', $menuLevelTwo['link'], $menuLevelTwo['name']);
                    foreach ($menuLevelTwo['child'] as $keyLevelTree => $menuLevelTree) {
                        $xhtmlMenu .= sprintf('<li ><a href="%s">%s</a></li>', $menuLevelTree['link'], $menuLevelTree['name']);
                    }
                } else
                    $xhtmlMenu .= sprintf('<li> <a href="%s">%s</a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
                $xhtmlMenu .= '</ul></li>';
            }
            $xhtmlMenu .= '</ul></li>';
        } else {
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
        }
    }
}
require_once 'breadcrumb.php';
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?= $xhtmlMenu ?? ''; ?>

        </ul>
    </div>
</div>

<div class="breadcrumb">
    <?= $xhtmlBreadCrumb ?? '' ?>
</div>