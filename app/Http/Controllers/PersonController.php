<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        $res = [
            "status" => 'ok',
            "message" => 'Lista de personas',
            "code" => 1000,
            "data" => $persons
        ];

        return $res; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonPerson = $request->json()->all();

        $person = new Person($jsonPerson);

        /* $person->firstName = $jsonPerson['firstName'];
        $person->lastName = $jsonPerson['lastName'];
        $person->documentNumber = $jsonPerson['documentNumber'];
        $person->country = $jsonPerson['country'];
        $person->city = $jsonPerson['city'];
        $person->street = $jsonPerson['street'];
        $person->number = $jsonPerson['number'];
        $person->single = $jsonPerson['single']; */

        $person->save();

        $res = [
            "status" => 'ok',
            "message" => 'Persona creada',
            "code" => 1003,
            "data" => $person
        ];

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);

        if(isset($person)){
            $res = [
                "status" => 'ok',
                "message" => 'Persona con id: ' . $id,
                "code" => 1001,
                "data" => $person
            ];
        }else{
            $res = [
                "status" => 'fail',
                "message" => 'No se encontro persona con id: ' . $id,
                "code" => 1011,
                "data" => null
            ];
        }

        return $res; 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if(isset($person)){
            $person->update($request->json()->all());

            $res = [
                "status" => 'ok',
                "message" => 'Persona actualizada',
                "code" => 1005
            ];
        }else{
            $res = [
                "status" => 'fail',
                "message" => 'No se encontro la persona a actualizar',
                "code" => 1015
            ];
        }

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);

        if(isset($person)){
            $person->delete();

            $res = [
                "status" => 'ok',
                "message" => 'Persona eliminada',
                "code" => 1004
            ];
        }else{
            $res = [
                "status" => 'fail',
                "message" => 'No se encontro la persona a eliminar',
                "code" => 1014
            ];
        }

        return $res;

    }
}
