<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use app\DataTables\EditorialDataTable;
use Illuminate\Support\Facades\Auth;
use app\Models\Editorial;
use app\Models\Libro;

class EditorialesController extends Controller
{
    protected $message=[

       'nombre.unique' => 'La Editorial ya existe en la base de datos'
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EditorialDataTable $dataTable)
    {
        return $dataTable->render('editoriales.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editoriales.create',compact('editorial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->reglasvalidacion(), $this->message);
        $user = Auth::user();

        $editorial = new Editorial();
        $editorial->fill($request->all());
        $editorial->user_id = $user->id;
        $editorial->save();

        flash('Editorial creada con éxito!', 'success');

        return redirect()->route('editoriales.create');
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
        $editorial = Editorial::findOrFail($id);
        // show the view and pass the estado to it
        return view('editoriales.edit',compact('editorial'));
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

            $editorial = Editorial::findOrFail($id);
            $editorial->fill($request->all());
            $editorial->user_id=$user->id;
            $editorial->save();

            flash('Editorial Modificada con Exito!','success');

            return redirect()->route('editoriales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $editorial = Editorial::findOrFail($request->identificador);

        if (empty($editorial)) {
            Flash::error('editorial no Encontrada');

            return redirect()->route('editoriales.index');
        }

        $libros = Libro::selectRaw('libros.id') 
                                    ->leftJoin('editoriales','editoriales.id','=', 'libros.editorial_id')
                                    ->get()->lists('id');

        if($libros!=null)
        {
            flash('No se puede eliminar la editorial porque pertenece a un libro!', 'danger');

            return redirect()->route('editoriales.index');
        }
        else
        {
            $editorial->delete($request->identificador);

            flash('Editorial borrada con Éxito!', 'success');

            return redirect()->route('editoriales.index');
        }
    }

    public function reglasvalidacion($id=null)
    {
        return [
            'nombre' => 'required|unique:editoriales,nombre'.($id?','.$id:''),
        ];
    }
}
