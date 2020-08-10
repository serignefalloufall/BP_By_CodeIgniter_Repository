<?php namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\EmployeurModel;
use App\Models\TypeClientModel;
use CodeIgniter\Controller;
 
class Client extends Controller
{
 
    public function index()
    {    
        $model = new ClientModel();
 
        $data['clients'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('client/liste', $data);
    }    
 
    public function add()
    {    
        $tcModel = new TypeClientModel();
 
        $data['typeclients'] = $tcModel->findAll();

        $empModel = new EmployeurModel();
 
        $data['employeurs'] = $empModel->findAll();
        return view('client/add', $data);
    }
 
    public function store()
    {  
        helper(['form', 'url']);

        $clientModel = new ClientModel();
        $empModel = new EmployeurModel();

        if(isset($_POST['btnAjouter']))
		{
            if($_POST['type_client_id'] == '3')
			{
                //entreprise
                 $data = [
                'numIdentification' => $this->request->getVar('numIdentification'),
                'raisonSocial' => $this->request->getVar('raisonSocial'),
                'nom_employeur' => $this->request->getVar('nom_employeur'),
                'adresse_employeur' => $this->request->getVar('adresse_employeur'),
                ];
 
                 $save = $empModel->insert($data);
                 return redirect()->to( base_url('Client/add') );

            }else if($_POST['type_client_id'] == '1')
			{
                 //salarie
                 $data = [
                    'type_client_id' => $this->request->getVar('type_client_id'),
                    'employeur_id' => $this->request->getVar('employeur_id'),
                    'nom' => $this->request->getVar('nom'),
                    'prenom' => $this->request->getVar('prenom'),
                    'adresse' => $this->request->getVar('adresse'),
                    'tel' => $this->request->getVar('tel'),
                    'email' => $this->request->getVar('email'),
                    'profession' => $this->request->getVar('profession'),
                    'salaire' => $this->request->getVar('salaire'),

                    ];
     
                     $save = $clientModel->insert($data);
                     return redirect()->to( base_url('Client/add') );

            }else if($_POST['type_client_id'] == '2')
			{
                  //nonsalarie
                  $data = [
                    'type_client_id' => $this->request->getVar('type_client_id'),
                    'nom' => $this->request->getVar('nom'),
                    'prenom' => $this->request->getVar('prenom'),
                    'adresse' => $this->request->getVar('adresse'),
                    'tel' => $this->request->getVar('tel'),
                    'email' => $this->request->getVar('email'),
                   

                    ];
     
                     $save = $clientModel->insert($data);
                     return redirect()->to( base_url('Client/add') );
            }

 
        
        }
    }
 
 
    public function edit($id = null)
    {
      
     $model = new ClientModel();
 
     $data['Client'] = $model->where('id', $id)->first();
 
     return view('Client/edit-Client', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new ClientModel();
 
        $id = $this->request->getVar('id');
 
        $data = [
 
            'nom' => $this->request->getVar('nom'),
            ];
 
        $save = $model->update($id,$data);
 
        return redirect()->to( base_url('Client/index') );
    }
 
    public function delete($id = null)
    {
 
     $model = new ClientModel();
 
     $data['Client'] = $model->where('id', $id)->delete();
      
     return redirect()->to( base_url('Client/index') );
    }
}