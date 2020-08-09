<?php namespace App\Controllers;

use App\Models\RegionModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class ClientController extends Controller
{
 
    public function index()
    {    
        $model = new RegionModel();
 
        $data['regions'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('region/liste', $data);
    }    
 
    public function create()
    {    
        return view('region/create-region');
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new RegionModel();
 
        $data = [
 
            'nom' => $this->request->getVar('nom'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('Region/index') );
    }
 
    public function edit($id = null)
    {
      
     $model = new RegionModel();
 
     $data['region'] = $model->where('id', $id)->first();
 
     return view('region/edit-region', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new RegionModel();
 
        $id = $this->request->getVar('id');
 
        $data = [
 
            'nom' => $this->request->getVar('nom'),
            ];
 
        $save = $model->update($id,$data);
 
        return redirect()->to( base_url('Region/index') );
    }
 
    public function delete($id = null)
    {
 
     $model = new RegionModel();
 
     $data['region'] = $model->where('id', $id)->delete();
      
     return redirect()->to( base_url('Region/index') );
    }
}