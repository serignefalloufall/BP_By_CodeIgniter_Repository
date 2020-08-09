<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class RegionModel extends Model
{
    protected $table = 'region';
 
    protected $allowedFields = ['nom'];
}