<?php
class OrderItems extends Model {
    public $order_item_id;
    public $quantity;
    public $order_id;
    public $table_id;

    protected $displayColumns = [
        'oder_item_id',
        'quantity',
        'order_id',
        'table_id'
    ];

    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';
}
