<?php

class HelperFrontend
{
    public static function checkbox($id, $name = 'ckid[]')
    {
        $xhtml = '';
        $xhtml = sprintf(' <td class="text-center">
                                <div class="custom-control custom-checkbox">
                                    <input value="%s" class="custom-control-input multi-checkbox" type="checkbox" id="%s" name="%s"
                                       >
                                    <label for="%s" class="custom-control-label"></label>
                                </div>
                            </td>', $id, $id, $name, $id);
        return $xhtml;
    }
    public static  function text($value)
    {

        $xhtml = '';
        if (is_array($value)) {
            $xhtml .= '<td class="text-left">';
            foreach ($value as $key => $value) {

                $xhtml .= ucfirst($key) . ':  ' . $value . '</br>';
            }
            $xhtml .= '</td>';
        } else {
            $xhtml = sprintf('<td class="text-center">%s</td>', $value);
        }
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
            $link = sprintf('index.php?module=%s&controller=%s&action=form&id=%s', $module, $controller, $id);
        }
        $xhtml = '';
        $xhtml = sprintf(' <a href="%s" class="rounded-circle btn btn-sm  %s" title="%s">
                                    <i class="%s"></i>
                            </a>', $link, $classBtn, ucfirst($type), $classIcon);
        return $xhtml;
    }
    public static function alerNotice()
    {
        $xhtml = '';
        if (Session::get('message')) {
            $xhtml .= sprintf('<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>%s!</strong> %s
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>', 'Thông báo', $_SESSION['message']);
            Session::delete('message');
        }

        return $xhtml;
    }
    public static function itemStatus($status, $item, $controller)
    {
        $xhtml = '';
        if ($status == 'active') {
            $class = 'btn-success rounded-circle';
            $icon = 'fa fa-check';
        } else {
            $class = 'btn-danger rounded-circle';
            $icon = 'fa fa-minus';
        }
        $xhtml .= '<a href="index.php?module=backend&controller=' . $controller . '&action=changeStatus&id=' . $item . '&status=' . $status . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
        return $xhtml;
    }


    public static function itemGroup($group, $item, $controller)
    {
        $xhtml = '';
        if ($group == 'yes') {
            $class = 'btn-success rounded-circle';
            $icon = 'fa fa-check';
        } else {
            $class = 'btn-danger rounded-circle';
            $icon = 'fa fa-minus rounded-circle';
        }
        $xhtml .= '<a href="index.php?module=backend&controller=' . $controller . '&action=changeGroup&id=' . $item . '&group=' . $group . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
        return $xhtml;
    }
    public static function showErrors($arrErrors)
    {

        $xhtml = '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
            <ul class="list-unstyled mb-0">';
        if (count($arrErrors) > 0) {
            foreach ($arrErrors as $value) {
                $xhtml .= sprintf('<li class="text-white">%s</li>', str_replace("_", " ", $value));
            }
        }

        $xhtml .= '</ul></div>';
        return $xhtml;
    }
    public static function selectOption($value, $arrOption, $id)
    {

        $xhtml = '';
        $xhtml = sprintf('<td  class="text-center position-relative"><select name="select-group" class="custom-select custom-select-sm" style="width: unset" data-id="%s">
        ', $id);
        foreach ($arrOption as $key => $values['array']) {
            if ($values['array']['name'] == $value) {
                $xhtml .= '<option selected value="' . $values['array']['id'] . '"> ' . $values['array']['name'] . ' </option>';
            } else
                $xhtml .= '<option value="' . $values['array']['id'] . '"> ' . $values['array']['name'] . ' </option>';
        }
        $xhtml .= ' </select></td>';
        return $xhtml;
    }
}
