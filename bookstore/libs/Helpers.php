<?php

class Helpers
{
    public static function itemStatus($status, $item)
    {
        $xhtml = '';
        if ($status == '1') {
            $class = 'btn-success rounded-circle';
            $icon = 'fa fa-check';
        } else {
            $class = 'btn-danger';
            $icon = 'fa fa-minus';
        }
        $xhtml .= '<a href="index.php?controller=rss&action=changeStatus&id=' . $item . '&status=' . $status . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
        return $xhtml;
    }


    public static function itemGroup($group, $item)
    {
        $xhtml = '';
        if ($group == '1') {
            $class = 'btn-success rounded-circle';
            $icon = 'fa fa-check';
        } else {
            $class = 'btn-danger rounded-circle';
            $icon = 'fa fa-minus rounded-circle';
        }
        $xhtml .= '<a href="index.php?controller=rss&action=changeStatus&id=' . $item . '&status=' . $group . '" class="btn btn-sm ' . $class . ' "><i class="' . $icon . '"></i></a>';
        return $xhtml;
    }
}
