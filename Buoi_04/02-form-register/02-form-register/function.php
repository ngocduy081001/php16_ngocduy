<?php
function createInputText($name, $placeholder, $classOption = '', $type)
{
    $xhtml = '';
    $xhtml .= sprintf('<input class="input--style-2 %s" type="%s" placeholder="%s" name="%s">', $classOption, $type, $placeholder, $name);
    return $xhtml;
}

function createButton($values, $type, $classOption = '')
{
    $xhtml = '';
    $xhtml .= sprintf('<div class="p-t-30"><button class="btn btn--radius btn--green %s" type ="%s">%s</button></div>', $classOption, $type, $values);
    return $xhtml;
}
function createSelectedBox($name, $arrOption = [], $title)
{
    $xhtml = '';
    $xhtml .= sprintf(' <div class="rs-select2 js-select-simple select--no-search">
         <select name="%s">
            <option disabled="disabled" selected="selected">%s</option>', $name, $title);
    foreach ($arrOption as $keyOption => $valueOption) {
        $xhtml .= sprintf('<option value="%s">%s</option>', $keyOption, $valueOption);
    }
    $xhtml .= ' </select><div class="select-dropdown"></div></div>';
    return $xhtml;
}