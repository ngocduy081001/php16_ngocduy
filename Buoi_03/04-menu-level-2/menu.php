<?php
require_once 'data.php';
$xhtmlMenu = '';
$currentMenu = basename($_SERVER['PHP_SELF'], ".PHP");
if (!empty($arrMenu)) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = ($keyLevelOne == $currentMenu) ? 'class="active"' : '';

        if (isset($menuLevelOne['child'])) {
            $xhtmlMenu .= sprintf('<li> <a href="%s">%s</a><ul>', $menuLevelOne['link'], $menuLevelOne['name']);
            foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
                $xhtmlMenu .= sprintf('<li> <a href="%s">%s</a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
            }
            $xhtmlMenu .= '</ul></li>';
        } else {
            $xhtmlMenu .= sprintf('<li "%s"><a href="%s">%s</a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
        }
    }
}
?>
<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?= $xhtmlMenu ?? ''; ?>
            <!-- <li><a href="index.php">Home </a></li>
                <li class="active">
                    <a href="about.php">About</a>
                </li>
                <li><a href="contact.php">Contact </a></li> -->
        </ul>
    </div>
</div>