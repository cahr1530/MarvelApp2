<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CharactersModel;
class Characters extends BaseController
{
   
    public function index()
    {
        $CharactersModel = new CharactersModel();
        $data['Characters']=$CharactersModel->paginate(15);
        $data['pager']=$CharactersModel->pager;
        return view('characters/index',$data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

   
    public function new()
    {
        return view('characters/new');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules= [
        'name'         =>'required',
        'description'  =>'required',
        'thumbnail'    =>'required'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }
        $post=$this->request->getPost(['name','description','thumbnail']);
        $charactersModel = new CharactersModel();

        $charactersModel->insert($post);
        return redirect()->to('Characters');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if($id==null){
        return redirect()->to('Characters');
        }
        $charactersModel = new CharactersModel();
        $data['character']=$charactersModel->find($id);

        return view('characters/edit',$data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules= [
        'name'         =>'required',
        'description'  =>'required',
        'thumbnail'    =>'required'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }
        $post=$this->request->getPost(['name','description','thumbnail']);
        $charactersModel = new CharactersModel();

        $charactersModel->update($id,$post);
        return redirect()->to('Characters');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $charactersModel = new CharactersModel();
        $charactersModel->delete($id);
        return redirect()->to('Characters');
    }
}
