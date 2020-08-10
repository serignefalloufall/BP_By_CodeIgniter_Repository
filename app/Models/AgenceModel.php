<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class AgenceModel extends Model
{
    protected $table = 'agence';
 
    protected $allowedFields = ['region_id','nom'];

}