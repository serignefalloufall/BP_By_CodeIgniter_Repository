<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class TypeClientModel extends Model
{
    protected $table = 'typeclient';
 
    protected $allowedFields = ['libelle'];

}