<?php
if (!empty($this->pagination->showPaginationBackend())) : ?>
    <div class="card-footer clearfix">
        <?= $this->pagination->showPaginationBackend(); ?>
    </div>
<?php endif; ?>