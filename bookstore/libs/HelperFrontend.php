<?php

class HelperFrontend
{
    public static function checkbox($id, $name = 'checkbox-item')
    {
        $xhtml = '';
        $xhtml = sprintf(' <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input multi-checkbox" type="checkbox" id="%s" name="%s"
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
    public static  function textFontAwesome($classby, $name, $classtime, $time)
    {
        $xhtml = '';
        $xhtml = sprintf('  <td class="text-center">
                                <p class="mb-0 history-by"><i class="%s">&nbsp&nbsp%s</i></p>
                                <p class="mb-0 history-time"><i class="%s">&nbsp&nbsp%s</i></p>
                                
                            </td>', $classby, $name, $classtime, date("d-m-Y", strtotime($time)));
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
    public static function alerNotice($title, $mess)
    {

        $xhtml = '';
        if (Session::get('message')) {
          
            $xhtml .= sprintf('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>%s!</strong> %s
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>', $title, $mess);
            Session::delete('message');
        }

        return $xhtml;
    }
}
