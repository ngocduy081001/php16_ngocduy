<?php

class HelperFrontend
{
    public static function checkbox($id, $name = 'checkbox-item"')
    {
        $xhtml = '';
        $xhtml = sprintf(' <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="%s" name="%s"
                                       >
                                    <label for="%s" class="custom-control-label"></label>
                                </div>
                            </td>', $id, $name, $id);
        return $xhtml;
    }
    public static  function text($value)
    {

        $xhtml = '';
        $xhtml = sprintf(' <td class="text-center">%s</td>', $value);
        return $xhtml;
    }
    public static  function textFontAwesome($classby, $classtime, $value)
    {
        $xhtml = '';
        $xhtml = sprintf('  <td class="text-center">
                                <p class="mb-0 history-by"><i class="%s"></i></p>
                                <p class="mb-0 history-time"><i class="%s"></i></p>
                                %s
                            </td>', $classby, $classtime, $value);
        return $xhtml;
    }
    public static function buttonAction($type, $module, $controller, $id)
    {
        if ($type == 'delete') {
            $classIcon = 'fas fa-trash-alt';
            $classBtn = 'btn-delete btn-danger';
            $link = sprintf('index.php?module=%s&controller=%s&action=delete&id=%s', $module, $controller, $id);
        } else {
            $classIcon = 'fas fa-pencil-alt';
            $classBtn = 'btn-edit btn-info';
            $link = sprintf('index.php?module=%s&controller=%s&action=edit&id=%s', $module, $controller, $id);
        }
        $xhtml = '';
        $xhtml = sprintf(' <a href="%s" class="rounded-circle btn btn-sm  %s" title="%s">
                                    <i class="%s"></i>
                            </a>', $link, $classBtn, ucfirst($type), $classIcon);
        return $xhtml;
    }
}
