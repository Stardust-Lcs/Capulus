<?php
class Table extends Model {
    public $table_id;
    public $table_name;
    public $price;
    public $total_table;
    public $cafe_id;

    protected $primaryKey = 'table_id';

    protected $displayColumns = [
        'table_id',
        'table_name',
        'price',
        'total_table',
        'cafe_id'
    ];

    protected $table = 'tables';

    public function getAllUserCafeTables($cafe_id, $user_id = null) {
        global $session;
        if ($user_id === null) $user_id = $session->get('user_id');
        return $this->query(
            "SELECT tables.* 
            FROM tables 
            INNER JOIN cafes ON tables.cafe_id = cafes.cafe_id 
            INNER JOIN users ON cafes.user_id = users.user_id 
            WHERE cafes.cafe_id = '$cafe_id' AND cafes.user_id = '$user_id';"
        )->execute(true, stdClass::class);
    }
}
