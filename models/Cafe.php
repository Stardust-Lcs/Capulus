<?php
class Cafe extends Model {
    public $cafe_id;
    public $name;
    public $address;
    public $photo;
    public $user_id;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $primaryKey = 'cafe_id';

    protected $displayColumns = [
        'cafe_id',
        'name',
        'address',
        'photo',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'cafes';

    public function __construct() {
        parent::__construct();
    }

    public function getData($id) {
        return $this->query("SELECT cafes.*, users.fullname, users.email, users.phone FROM cafes INNER JOIN users ON cafes.user_id = users.user_id WHERE cafe_id = '$id'")->execute(true, stdClass::class);
    }

    public function checkId($id) {
        return $this->query("SELECT 1 FROM cafes WHERE cafe_id = '$id'")->execute();
    }
}
