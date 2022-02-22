<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use app\DataTables\ColeccionDataTable;
use Illuminate\Support\Facades\Auth;
use app\Models\Coleccion;
use app\Models\Libro;

class ColeccionesController extends Controller
{
    protected $message=[

       'nombre.unique' => 'La Colección ya existe en la base de datos'
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColeccionDataTable $dataTable)
    {
        return $dataTable->render('colecciones.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colecciones.create',compact('coleccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->reglasvalidAcion(), $this->message);

        $user = Auth::user();

        $coleccion = new Coleccion();
        $coleccion->fill($request->all());
        $coleccion->user_id = $user->id;
        $coleccion->save();

        flash('Colección creada con éxito', 'success');
        return redirect()->route('colecciones.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $coleccion = Coleccion::findOrFail($id);
        // show the view and pass the estado to it
        return view('colecciones.edit',compact('coleccion'));
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
        $user=  Auth::user();

            $coleccion = Coleccion::findOrFail($id);
            $coleccion->fill($request->all());
            $coleccion->user_id=$user->id;
            $coleccion->save();

            flash('Colección Modificada con Exito!','success');

            return redirect()->route('colecciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $coleccion = Coleccion::findOrFail($request->identificador);

        if (empty($coleccion)) {
            Flash::error('coleccion no Encontrada');

            return redirect()->route('colecciones.index');
        }

        $libros = Libro::selectRaw('libros.id') 
                                    ->leftJoin('colecciones','colecciones.id','=', 'libros.coleccion_id')
                                    ->get()->lists('id');

        if($libros!=null)
        {
            flash('No se puede eliminar la colección porque pertenece a un libro!', 'danger');

            return redirect()->route('colecciones.index');
        }
        else
        {
            $coleccion->delete($request->identificador);

            flash('Colección borrada con Éxito!', 'success');

            return redirect()->route('colecciones.index');
        }
    }

    public function reglasvalidacion($id=null)
    {
        return [
            'nombre' => 'required|unique:colecciones,nombre'.($id?','.$id:''),
        ];
    }
}
