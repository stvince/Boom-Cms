<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title"><?=$params['config']['name']?> <?= isset($item) ? ': ' . $item->{$config['title']} : ''?></div>
        </div>
    </div>
    <div class="card-body">
        <?=  \Apps\Pages\Helper\Crud::make_form($crud, isset($item) ? $item : null) ?>
    </div>
</div>