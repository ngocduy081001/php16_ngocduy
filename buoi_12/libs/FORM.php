<?php
class FORM
{
    public static function createInput($name,  $value, $type = 'text')
    {
        $xhtml = '';
        $xhtml = sprintf('<input class= "form-control" type="%s" name="%s" value="%s">', $type, $name, $value);
        return $xhtml;
    }
    public  static function createLabel($value)
    {
        $xhtml = '';
        $xhtml = sprintf('<label class="font-weight-bold">%s</label>', $value);
        return $xhtml;
    }
    public static function createSelect($name, $arrOptions, $keySelected = 'default', $selectedData = '')
    {
        $xhtml = '';
        $xhtml = '<select class="custom-select" name="' . $name . '">';

        if (!empty($arrOptions)) {
            foreach ($arrOptions as $key => $value) {
                if ($selectedData == $value) {
                    $selected = 'selected';
                } else {
                    $selected = ($keySelected == $key) ? 'selected' : '';
                }


                $xhtml .= sprintf('<option value="%s" %s >%s</option>', $key, $selected, $value);
            }
        }
        $xhtml .= '</select>';
        return $xhtml;
    }

    public static function createButton($class, $type, $name, $values)
    {
        $xhtml = '';
        $xhtml = sprintf('<button class="%s" type="%s" name="%s" values="$s">', $class, $type, $name, $values);
        return $xhtml;
    }

    public static function createButtonLink($link, $class, $title)
    {
        $xhtml = '';
        $xhtml = sprintf('<a href="%s" class="btn %s" >%s</a>', $link, $class, $title);
        return $xhtml;
    }
    public static function formGroup($value)
    {
        $xhtml = '';
        $xhtml = sprintf('<div class="form-group">%s %s</div>', $value['label'], $value['input']);
        return $xhtml;
    }
    public static function formShow($arrElement)
    {
        $xhtml = '';
        foreach ($arrElement as $element) {
            $xhtml .= self::formGroup($element);
        }
        return $xhtml;
    }
}
