<?php
$xhtml = '';
$data = $this->listGroup;

if (!empty($data)) {

    $xhtml = '';
    foreach ($data as $key => $value) {
        $xhtml .= ' <tr>
        ' . HelperFrontend::checkbox($value['id']) . '
       ' . HelperFrontend::text($value['id']) . '
       ' . HelperFrontend::text($value['name']) . '
        <td class="text-center position-relative"> ' . HelperFrontend::itemStatus($value['status'], $value['id'], $_GET['controller']) . '</td>
        <td class="text-center position-relative"> ' . HelperFrontend::itemGroup($value['group_acp'], $value['id'], $_GET['controller']) . '</td>
        ' . HelperFrontend::textFontAwesome('far fa-user', $value['name'], 'far fa-clock', $value['created']) . '
        ' . HelperFrontend::textFontAwesome('far fa-user', $value['name'], 'far fa-clock', $value['modified']) . '
        <td class="text-center">
        ' . HelperFrontend::buttonAction('edit', $this->arrParam['module'], $this->arrParam['controller'], $value['id']) . ' 
        ' . HelperFrontend::buttonAction('delete', $this->arrParam['module'], $this->arrParam['controller'], $value['id']) . '
        </td>
    </tr>';
    }
}

echo HelperFrontend::alerNotice();
?>

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