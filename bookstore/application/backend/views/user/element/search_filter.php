<?php
    $groupACP=@$this->arrParam['filter_group_acp'];;
    $search= @$this->arrParam['search_value'];


?>
<div class="card card-info card-outline">
    <div class="card-header">
        <h6 class="card-title">Search & Filter</h6>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="mb-1">
                <a href="index.php?module=backend&controller=group&action=index<?php 
                if(!empty($groupACP)) echo 
                '&filter_group_acp='.$groupACP ;
                if(!empty($search)) echo  '&search_value='.$search 
                ?>" class="mr-1 btn btn-sm btn-info">All <span class="badge badge-pill badge-light"><?php echo $this->totalItems['all']?></span></a>
                <a name="search_status" href="index.php?module=backend&controller=group&action=index&status=active<?php 
                if(!empty($groupACP)) echo 
                '&filter_group_acp='.$groupACP ;
                if(!empty($search)) echo  '&search_value='.$search 
                ?>" class="mr-1 btn btn-sm btn-secondary">Active <span class="badge badge-pill badge-light"><?php echo $this->totalItems['active']?? 0 ?> </span></a>
                <a name="search_status" href="index.php?module=backend&controller=group&action=index&status=inactive<?php 
                if(!empty($groupACP)) echo 
                '&filter_group_acp='.$groupACP ;
                if(!empty($search)) echo  '&search_value='.$search 
                ?>" class="mr-1 btn btn-sm btn-secondary">Inactive <span class="badge badge-pill badge-light"><?php echo $this->totalItems['inactive']?? 0 ?></span></a>
            </div>
            <div class="mb-1">
                <form id="filter_group_acp" method="get">
                    <input hidden name="module" value="<?php echo $this->arrParam['module'] ?>">
                    <input hidden name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                    <input hidden name="action" value="<?php echo $this->arrParam['action'] ?>">
                    <?php if (!empty($this->arrParam['search_value'])) {
                        echo '<input hidden name="search_value" value="'.$this->arrParam['search_value'] . '">';
                    } ?>
                    <select id="filter_group_acp" name="filter_group_acp" class="custom-select custom-select-sm mr-1" style="width: unset">
                        <option value="default" selected="">- Select Group ACP -</option>
                        <option value="all">All</option>
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </form>
            </div>
            <div class="mb-1">
                <form action="" method="get">
                    <div class="input-group">
                        <input hidden name="module" value="<?php echo $this->arrParam['module'] ?>">
                        <input hidden name="controller" value="<?php echo $this->arrParam['controller'] ?>">
                        <input hidden name="action" value="<?php echo $this->arrParam['action'] ?>">
                        <?php if (!empty($this->arrParam['filter_group_acp'])) {
                            echo '<input hidden name="filter_group_acp" value="'.$this->arrParam['filter_group_acp'].'">';
                        } ?>

                        <input type="text" class="form-control form-control-sm" id="search_values" name="search_value" value="<?= trim(@$this->arrParam['search_value'])?>" style="min-width: 300px">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-danger" id="btn-search-clear">Clear</button>
                            <button type="submit" class="btn btn-sm btn-info" id="btn-search">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>