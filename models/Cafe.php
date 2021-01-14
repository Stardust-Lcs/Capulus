<?php
class Cafe extends Model
{
    public $cafe_id;
    public $name;
    public $address;
    public $photo;
    public $user_id;
    public $created_at;
    public $updated_at;
    public $deleted_at;

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

    public function __construct()
    {
        parent::__construct();
    }
}
