<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ClientModel extends Model
{
    protected $table = 'client';
 
    protected $allowedFields = ['type_client_id','employeur_id','nom',
                                'prenom','adresse','tel','email',
                                'profession','salaire','password'];

}