<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MarvelApiController extends BaseController
{
    
        public function __construct()
        {
            $this->CharactersModel = model('CharactersModel');
        }
        
        public function index()
        {
           $timestamp = time();
           $hash = md5($timestamp .config('MarvelAPI')->privateKey .config('MarvelAPI')->publicKey);  
           $url = 'http://gateway.marvel.com/v1/public/characters?ts=' . $timestamp . '&apikey=' . config('MarvelAPI')->publicKey . '&hash=' . $hash; 
           $response = file_get_contents($url);
           $data = json_decode($response,true);


           foreach($data['data']['results'] as $character)
           {
               $this->CharactersModel->insert([
                   'id' => $character['id'],
                   'name' => $character['name'],
                   'description' => $character['description'],
                   'thumbnail' => $character['thumbnail']['path'] . '.' . $character['thumbnail']['extension']
               ]);


           }
           echo 'Personajes almacenados correctamente';
        }
}