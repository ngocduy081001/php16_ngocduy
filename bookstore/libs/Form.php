<?php
class Form
{
    public static function  label($forName, $labelName)
    {
        $xhtml = '';
        $xhtml .= sprintf(' <label for="%s" class="col-sm-2 col-form-label text-sm-right required">%s</label>', $forName, $labelName);
    }
    public static function input($name, $placeholder, $classOption = '', $type)
    {
        $xhtml = '';
        $xhtml .= sprintf('<input class="input--style-2 %s" type="%s" placeholder="%s" name="%s">', $classOption, $type, $placeholder, $name);
        return $xhtml;
    }

    public static function button($values, $type, $classOption = '')
    {
        $xhtml = '';
        $xhtml .= sprintf('<div class="p-t-30"><button class="btn btn--radius btn--green %s" type ="%s">%s</button></div>', $classOption, $type, $values);
        return $xhtml;
    }
    public static function selectedBox($name, $arrOption = [], $title)
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
}
