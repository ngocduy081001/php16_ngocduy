<?php
require_once("data.php");



$xhtmlMenu = "";
$menuCurrent = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {


    $xhtmlMenu .= sprintf('<li ><a href="%s">%s</a></li>', $menuLevelOne['link'], $menuLevelOne['name']);
}
?>

<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtmlMenu; ?>
        </ul>
    </div>
</div>