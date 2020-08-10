<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class CompteModel extends Model
{
    protected $table = 'compte';
 
    protected $allowedFields = ['client_id','type_compte_id','agence_id',
                                'num_compte','cle_rip','frais_ouverture','agio',
                                'date_ouverture','date_fermuture'];


}