<?php
require_once 'data.php';
$xhtmlMenu = '';
$currentMenu = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
if (!empty($arrMenu)) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = $arrBreadCrumb[$currentMenu][0]['name'] == $menuLevelOne['name']  ? 'class="active"' : " ";
        if (isset($menuLevelOne['child'])) {
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
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?= $xhtmlMenu ?? ''; ?>

        </ul>
    </div>
</div>

<div class="breadcrumb">
    <?php
    $breadCrumb = "<ul>";
    foreach ($arrBreadCrumb[$currentMenu] as $keyBreadCrumb => $valuesBreadCrumb) {
        if (ucfirst($currentMenu) == $valuesBreadCrumb['name'] || $valuesBreadCrumb['link'] == 'index.php') {
            $breadCrumb .= sprintf('<li>%s</li>', $valuesBreadCrumb['name']);
        } else
            $breadCrumb .= sprintf('<li><a href="%s">%s</a></li>', $valuesBreadCrumb['link'], $valuesBreadCrumb['name']) . '>';
    }
    $breadCrumb .= '</ul>';
    echo $breadCrumb;
    ?>
</div>