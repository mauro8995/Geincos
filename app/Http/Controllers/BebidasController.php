<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bebida;

class BebidasController extends Controller
{
    /**
    * create
    * permite crear un producto bebida y crea en la tabla bebidas
    * @author Mauro Gomez [Mauro Gomez]
    * @author mauro@gmail.com
    * @param String  $Nombre nombre del producto
    * @param String  $Sabor Sabor del producto
    * @param Integer  $Cantidad cantidad en mililitro del producto
    * @param Float  $Calorico Cantidad de calorias 8 enteros
    * @param Float  $Precio del producto
    */

    public function create(Request $request){

        $request->validate([
            'Nombre'    => 'required|string',
            'Sabor'     => 'required|string',
            'Cantidad'  => 'required|integer',
            'Calorias'  => 'required|regex:/^\d*(\.\d{2})?$/',
            'Precio'    => 'required',
        ]);

        $bebida = new bebida();
        $bebida->Nombre     = $request->Nombre;
        $bebida->Sabor      = $request->Sabor;
        $bebida->Cantidad   = $request->Cantidad;
        $bebida->Calorico   = $request->Calorias;
        $bebida->Precio     = $request->Precio;
        $bebida->save();

        return response()->json(["Mensaje"=>"producto ingresado."]);
    }


    /**
    * view
    * permite ver la vista de bebida donde lista crea y elimina las bebidas
    * la vista en bebidas archivo listar
    * @author Mauro Gomez [Mauro Gomez]
    * @author mauro@gmail.com
    */

    public function view(){
        $bebidas = bebida::all();

        return  view('bebidas.listar',["bebidas"=>$bebidas]);
    }

    /**
    * delete
    * Eliminar una bebida
    * @author Mauro Gomez [Mauro Gomez]
    * @author mauro@gmail.com
    * @param Integer  $id identificador del producto
    */
    public function delete(Request $request){

        if(bebida::where('id',$request->id)->exists()){
            $bebida = bebida::findOrFail($request->id);
            $bebida->delete();
            return redirect()->route('bebidas.list')
                    ->with('message','Bebida Eliminado');
        }else{
            return response()->json(["Mensaje"=>"Bebida fue eliminado con anterioridad."]);
        }
    }

    /**
    * view_edit
    * permite ver la vista de bebida y se elimina las bebidas
    * la vista en bebidas archivo edit
    * @author Mauro Gomez [Mauro Gomez]
    * @author mauro@gmail.com
    */
    public function view_edit(Request $request){
        $bebida =  bebida::find($request->id);

        return  view('bebidas.edit',["bebida"=>$bebida]);
    }

    /**
    * update
    * Eliminar una bebida
    * @author Mauro Gomez [Mauro Gomez]
    * @author mauro@gmail.com
    * @param Integer  $id identificador del producto
    */

    public function update(Request $request){

        $request->validate([
            'Nombre'    => 'required|string',
            'Sabor'     => 'required|string',
            'Cantidad'  => 'required|integer',
            'Calorico'  => 'required|regex:/^\d*(\.\d{2})?$/',
            'Precio'    => 'required',
        ]);

        $bebida = bebida::findOrFail($request->id);
        if(bebida::where('id',$request->id)->exists()){
            $bebida->Nombre     = $request->Nombre;
            $bebida->Sabor      = $request->Sabor;
            $bebida->Cantidad   = $request->Cantidad;
            $bebida->Calorico   = $request->Calorico;
            $bebida->Precio     = $request->Precio;
            $bebida->save();

            return redirect()->route('bebidas.list')
                        ->with('message','Bebida Editado');
        }else{
            return response()->json(["Mensaje"=>"Bebida fue eliminado con anterioridad."]);
        }
    }

}
