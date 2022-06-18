<?php
require_once('data.php');

$xhtmlMenu = '';
foreach ($arrMenu as $keyLevelOne => $menuLevelOne) {
    if (isset($menuLevelOne['child'])) {
        
        
        $xhtmlMenu .= sprintf('<li><a href="%s">%s</a><ul>', $menuLevelOne['link'], $menuLevelOne['name']);

        foreach ($menuLevelOne['child'] as $keyLevelTwo => $menuLevelTwo) {
            $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelTwo['link'], $menuLevelTwo['name']);
        }

        $xhtmlMenu .= '</ul></li>';
    } else {
      
        $xhtmlMenu .= sprintf('<li><a href="%s">%s</a></li>', $menuLevelOne['link'], $menuLevelOne['name']);
    }
    
}
?>

<div class="menuBackground">
    <div class="center">
        <ul class="dropDownMenu">
            <?php echo $xhtmlMenu; ?>
        </ul>
    </div>
</div>