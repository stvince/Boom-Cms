<?php


namespace Apps\Menu\Model;


use Apps\Menu\Model\Entities\MenuItemEntity;
use Boom\Model\Model;

class MenuItemsTable extends Model
{
    public function initialize(array $config)
    {
        $this->entityClass(MenuItemEntity::class);
        $this->belongsTo('Menus');
        $this->hasMany('Children', [
            'className' => 'MenuItems',
            'foreignKey' => 'parent_id',
        ]);
    }
}