<?php
class User extends Model {
    public $id;
    public $username;
    public $email;
    public $fullname;
    public $password;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $displayColumns = [
        'id',
        'username',
        'email',
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
