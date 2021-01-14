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

    public function __construct() {
        parent::__construct();
    }
}
