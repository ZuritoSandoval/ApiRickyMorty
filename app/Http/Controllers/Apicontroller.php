<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apicontroller extends Controller
{
    public function index(){
        $URL= new \GuzzleHttp\Client();
        $response= $URL->request('GET', 'https://rickandmortyapi.com/api/character/');
        $datos=json_decode($response->getBody()->getContents(), true);
        $personajes = [];

        foreach ($datos['results'] as $personaje){
            $personajes[] = [
                'id' =>$personaje['id'],
                'nombre' => $personaje['name'],
                'especie'=> $personaje['species'],
                'origen'=> $personaje['origin']['name'],
                'imagen'=> $personaje['image'],
                'estatus'=> $personaje['status'],
                'genero'=> $personaje['gender']
            ];
        }
        return view('index', ['personajes'=>$personajes]);
    }

    public function personajes($id){
        $personajes = new \GuzzleHttp\Client();
        $response = $personajes->request('GET','https://rickandmortyapi.com/api/character/'.$id);
        $personajeseparado = json_decode($response->getBody()->getContents(), true);

        $numero = rand(0,42);

        $api = new \GuzzleHttp\Client();
        $response = $api->request('GET','https://rickandmortyapi.com/api/character/?page='.$numero);
        $datos = json_decode($response->getBody()->getContents(), true);
        $personajes = [];
         foreach ($datos['results'] as $personaje) {
             $personajes[] = [
                 'id' => $personaje['id'],
                 'nombre' => $personaje['name'],
                 'especie' => $personaje['species'],
                 'origen' => $personaje['origin']['name'],
                 'imagen' => $personaje['image'],
                 'estatus' => $personaje['status'],
                 'genero' => $personaje['gender']
             ];
         } 
        return view ('personajes',['personaje'=>$personajeseparado, 'personajes'=>$personajes]);

    }
}
