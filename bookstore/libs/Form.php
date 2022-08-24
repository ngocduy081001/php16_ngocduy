<?php
class Form
{
    public static function  label($forName, $labelName)
    {
        $xhtml = '';
        $xhtml .= sprintf(' <label for="%s" class="col-sm-2 col-form-label text-sm-right required">%s</label>', $forName, $labelName);
        return $xhtml;
    }
    public static function input($value, $name, $placeholder, $classOption = '', $type)
    {
        $xhtml = '';
        $xhtml .= sprintf('<input value="%s"  id="%s" class=form-control form-control-sm %s" type="%s" placeholder="%s" name="%s">', $value, $name, $classOption, $type, $placeholder, $name);
        return $xhtml;
    }
    public static function inputHiden($value, $name)
    {
        $xhtml = '';
        $xhtml .= sprintf('<input type="hidden" value="%s" name="%s">', $value, $name);
        return $xhtml;
    }
    public static function button($values, $type, $classOption = '')
    {
        $xhtml = '';
        $xhtml .= sprintf('<div class="p-t-30"><button class="btn btn--radius btn--green %s" type ="%s">%s</button></div>', $classOption, $type, $values);
        return $xhtml;
    }
    public static function selectedBox($name, $arrOption = [], $title, $value)
    {
        $xhtml = '';
        $xhtml .= sprintf('
             <select id="%s" class="custom-select custom-select-sm" name="%s">
                <option disabled="disabled" value="default" selected="selected">%s</option>', $name, $name, $title);
        foreach ($arrOption as $keyOption => $valueOption) {
            if ($keyOption == $value) {
                $xhtml .= sprintf('<option selected="selected"  value="%s">%s</option>', $keyOption, $valueOption);
            } else

                $xhtml .= sprintf('<option   value="%s">%s</option>', $keyOption, $valueOption);
        }
        $xhtml .= ' </select><div class="select-dropdown"></div>';
        return $xhtml;
    }
}
