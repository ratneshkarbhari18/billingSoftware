<?php namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{

    protected $table = "items";

    protected $primaryKey = 'id';

    protected $allowedFields = ['title','price','gst'];

}