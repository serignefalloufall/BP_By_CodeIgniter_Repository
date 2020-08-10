<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class EmployeurModel extends Model
{
    protected $table = 'employeur';
 
    protected $allowedFields = ['numIdentification','raisonSocial',
                                'nom_employeur','adresse_employeur'];

}
