<?php namespace App\Models;

use CodeIgniter\Model;

class BillsModel extends Model
{

    protected $table = "bills";

    protected $primaryKey = 'id';

    protected $allowedFields = ['bill_number','payee_name','payee_address','payee_mobile_number','payee_email','items_json','bill_amount','date'];

}