<?php
class User extends Model {
    protected $columns = [
        'id',
        'username',
        'password',
        'fullname',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }
}
