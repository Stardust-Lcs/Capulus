<?php
class Order extends Model {
    public $order_id;
    public $order_date;
    public $user_id;
    public $cafe_id;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $primaryKey = 'order_id';

    protected $displayColumns = [
        'order_id',
        'order_date',
        'user_id',
        'cafe_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'orders';

    public function getOrderDetail($id) {
        $result = $this->query(
            "SELECT orders.*, order_items.quantity, tables.table_name, tables.price 
            FROM orders
            INNER JOIN order_items ON orders.order_id = order_items.order_id
            INNER JOIN tables ON order_items.table_id = tables.table_id
            WHERE orders.order_id = '$id'
            LIMIT 1;"
        )->execute(true, stdClass::class);

        if ($result) return $result[0];

        return false;
    }
}
