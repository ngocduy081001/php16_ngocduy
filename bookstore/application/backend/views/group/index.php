<?php

$xhtml = '';
$data = $this->listGroup;
if (!empty($data)) {
    $xhtml = '';
    $countActive = 0;
    $countInactive = 0;
    foreach ($data as $key => $value) {
        if ($value['status'] == 1) {
            $countActive++;
        } else $countInactive++;
        $xhtml .= ' <tr>
        ' . HelperFrontend::checkbox($value['id']) . '
       ' . HelperFrontend::text($value['id']) . '
       ' . HelperFrontend::text($value['name']) . '
        <td class="text-center position-relative"> ' . Helpers::itemStatus($value['status'], $value['id'], $_GET['controller']) . '</td>

        
        <td class="text-center position-relative"> ' . Helpers::itemGroup($value['group_acp'], $value['id'], $_GET['controller']) . '</td>

        ' . HelperFrontend::textFontAwesome('far fa-user', 'far fa-clock', $value['created']) . '
        ' . HelperFrontend::textFontAwesome('far fa-user', 'far fa-clock', $value['modified']) . '
        
        <td class="text-center">
        ' . HelperFrontend::buttonAction('edit', $this->arrParam['module'], $this->arrParam['controller'], $value['id']) . '
          
        ' . HelperFrontend::buttonAction('delete', $this->arrParam['module'], $this->arrParam['controller'], $value['id']) . '
        </td>
    </tr>';
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <!-- Search & Filter -->
        <?php require_once 'element/search_filter.php' ?>

        <!-- List -->
        <div class="card card-info card-outline">
            <?php require_once 'element/content_header.php' ?>
            <div class="card-body">
                <!-- Control -->
                <?php require_once 'element/select_box.php' ?>

                <!-- List Content -->
                <?php require_once 'element/list_content.php' ?>
            </div>
            <!-- pagination -->
            <?php require_once 'element/pagination.php' ?>
        </div>
    </div>
</section>