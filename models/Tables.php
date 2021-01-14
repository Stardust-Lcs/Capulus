<?php
class Tables extends Model {
    public $table_id;
    public int $table_available = 0;
    public $cafe_id;

    protected $displayColumns = [
        'table_id',
        'table_available',
        'cafe_id'
    ];

    protected $table = 'tables';

    public function getDetailed($where = '', $limit = 30) {
        if (is_array($where))
            $where = implode(' ', $where);

        $columns = implode(', ', $this->displayColumns);
        return $this->query("SELECT $columns FROM $this->table INNER JOIN cafes ON cafes.cafe_id = $this->table.cafe_id WHERE $where LIMIT $limit;")
            ->execute(true);
    }
}
