<?php
class User extends Model {
    public $user_id;
    public $username;
    public $email;
    public $fullname;
    public $password;
    public $phone;
    public $is_cafe_owner;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    protected $displayColumns = [
        'user_id',
        'username',
        'email',
        'fullname',
        'phone',
        'is_cafe_owner',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }
}
