<?php

namespace App\Controllers;

use App\Models\AgenceModel;
use App\Models\ClientModel;
use App\Models\CompteModel;
use App\Models\TypeCompteModel;
use CodeIgniter\Controller;

class Compte extends Controller
{

    public function index()
    {
        $model = new CompteModel();

        $data['comptes'] = $model->orderBy('id', 'DESC')->findAll();

        return view('compte/liste', $data);
    }

    public function add()
    {
        $clientModel = new ClientModel();
        $typeCompteModel = new TypeCompteModel();
        $agenceModel = new AgenceModel();

        $data['clients'] = $clientModel->findAll();
        $data['typecomptes'] = $typeCompteModel->findAll();
        $data['agences'] = $agenceModel->findAll();


        $data['today'] = date("d/m/y");
        $data['numcompte'] = 'Cmpt-' . $data['today'];
        $data['cleRip'] = 'Cle-rip-' . $data['today'];
        return view('compte/add', $data);
    }

    public function store()
    {
        helper(['form', 'url']);

        $compteModel = new CompteModel();

        if (isset($_POST['btnAjouter'])) {
            if ($_POST['type_compte_id'] == '1') {
                //epargne
                $data = [
                    'client_id' => $this->request->getVar('client_id'),
                    'type_compte_id' => $this->request->getVar('type_compte_id'),
                    'agence_id' => $this->request->getVar('agence_id'),
                    'num_compte' => $this->request->getVar('num_compte'),
                    'cle_rip' => $this->request->getVar('cle_rip'),
                    'frais_ouverture' => $this->request->getVar('frais_ouverture'),
                    'date_ouverture' => $this->request->getVar('date_ouverture'),
                ];

                $save = $compteModel->insert($data);
                return redirect()->to(base_url('Compte/add'));
            } else if ($_POST['type_compte_id'] == '2') {
                //courant
                $data = [
                    'client_id' => $this->request->getVar('client_id'),
                    'type_compte_id' => $this->request->getVar('type_compte_id'),
                    'agence_id' => $this->request->getVar('agence_id'),
                    'num_compte' => $this->request->getVar('num_compte'),
                    'cle_rip' => $this->request->getVar('cle_rip'),
                    'agio' => $this->request->getVar('agio'),
                    'date_ouverture' => $this->request->getVar('date_ouverture'),
                ];

                $save = $compteModel->insert($data);
                return redirect()->to(base_url('Compte/add'));
            } else if ($_POST['type_compte_id'] == '3') {
                //Bloque
                $data = [
                    'client_id' => $this->request->getVar('client_id'),
                    'type_compte_id' => $this->request->getVar('type_compte_id'),
                    'agence_id' => $this->request->getVar('agence_id'),
                    'num_compte' => $this->request->getVar('num_compte'),
                    'cle_rip' => $this->request->getVar('cle_rip'),
                    'frais_ouverture' => $this->request->getVar('frais_ouverture'),
                    'date_ouverture' => $this->request->getVar('date_ouverture'),
                    'date_fermuture' => $this->request->getVar('date_fermuture'),

                ];

                $save = $compteModel->insert($data);
                return redirect()->to(base_url('Compte/add'));
            }
        }
    }

    public function edit($id = null)
    {

        $model = new CompteModel();

        $data['Compte'] = $model->where('id', $id)->first();

        return view('Compte/edit-Compte', $data);
    }

    public function update()
    {

        helper(['form', 'url']);

        $model = new CompteModel();

        $id = $this->request->getVar('id');

        $data = [

            'nom' => $this->request->getVar('nom'),
        ];

        $save = $model->update($id, $data);

        return redirect()->to(base_url('Compte/index'));
    }

    public function delete($id = null)
    {

        $model = new CompteModel();

        $data['Compte'] = $model->where('id', $id)->delete();

        return redirect()->to(base_url('Compte/index'));
    }
}
