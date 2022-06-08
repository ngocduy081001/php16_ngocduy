<?php

require_once 'data.php';
$xhtmlMenu = '';
$currentMenu = pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
if (!empty($arrMenu)) {
    foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
        $classActive = ($keyLevelOne == $currentMenu) ? 'class="active"' : '';
        $xhtmlMenu .= sprintf('<li %s><a href="%s">%s</a></li>', $classActive, $menuLevelOne['link'], $menuLevelOne['name']);
    }
}
?><div class="menuBackground">
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