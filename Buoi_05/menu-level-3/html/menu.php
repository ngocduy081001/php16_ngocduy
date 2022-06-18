<?php 
    require_once 'data.php';

    $xhtml = '<ul class="dropDownMenu">';
    foreach ($arrMenu as $menuLevelOne) {
        if(isset($menuLevelOne['child'])){
            $xhtml .= sprintf('<li><a href="%s">%s</a><ul>',  $menuLevelOne['link'],  $menuLevelOne['name']);
            
            foreach($menuLevelOne['child'] as $menuLevelTwo){
                if(isset($menuLevelTwo['child'])) {
                    $xhtml .= sprintf('<li><a href="%s">%s</a><ul>',  $menuLevelTwo['link'],  $menuLevelTwo['name']);

                    foreach($menuLevelTwo['child'] as $menuLevelThree){
                        $xhtml .= sprintf('<li ><a href="%s">%s</a></li>',  $menuLevelThree['link'],  $menuLevelThree['name']);
                    }

                    $xhtml .= '</ul></li>';
                }else {
                    $xhtml .= sprintf('<li><a href="%s">%s</a></li>',  $menuLevelTwo['link'],  $menuLevelTwo['name']);
                }
            }

            $xhtml .= '</ul></li>';
        }else {
            $xhtml .= sprintf('<li ><a href="%s">%s</a></li>',  $menuLevelOne['link'],  $menuLevelOne['name']);
        }
    }
    $xhtml .= '</ul>';
    
    
?>


<div class="menuBackground">
    <div class="center">
    <?php echo $xhtml; ?>
    </div>
</div>