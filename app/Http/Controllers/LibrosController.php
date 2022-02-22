<?php

namespace app\Http\Controllers;
use Illuminate\Support\Collection as Collection;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use app\Models\Libro;
use Illuminate\Support\Facades\Auth;
use app\DataTables\LibroDataTable;
use app\Models\Editorial;
use app\Models\Coleccion;

class LibrosController extends Controller
{

     protected $message=[
       'titulo.unique' => 'Debe ingresar el título del Libro'
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LibroDataTable $dataTable)
    {
/*        $productos = Producto::all();
        return view('productos.datatable')->with('productos', $productos);
*/      return $dataTable->render('libros.datatable');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        
        
        $editoriales = Editorial::all()->lists('nombre', 'id');
        $colecciones = Coleccion::all()->lists('nombre', 'id');        
        return view('libros.create',compact('editoriales','colecciones'));

    }

    public function mostrar()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->reglasValidacion(), $this->message);
        $user = Auth::user();

        $libro = new Libro();
        $libro->fill($request->all());
        $libro->user_id = $user->id;
      
        $libro->save();

        flash('libro agregado con Exito!', 'success');

        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);

        if (empty($libro)) {
            Flash::error('Libro no encontrado');

            return redirect(route('libros.index'));
        }
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $libro = Libro::findOrFail($id);
        // show the view and pass the estado to it
        $editorial = Editorial::all()->lists('nombre', 'id');
        $coleccion = Coleccion::all()->lists('nombre', 'id');        
        return view('libros.edit',compact('libro', 'editorial', 'coleccion'));
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

            $libro = Libro::findOrFail($id);
            $libro->fill($request->all());
            $libro->user_id=$user->id;
            $libro->save();

            flash('Libro Modificado con Exito!','success');

            return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $libro = Libro::findOrFail($request->identificador);
        
        if (empty($libro)) {
            Flash::error('Libro no Encontrado');

            return redirect()->route('libros.index');
        }

        $libro->delete($request->identificador);

        flash('Libro borrado con Éxito!', 'success');

        return redirect()->route('libros.index');
        
    }

     public function reglasValidacion($id=null){

      return  [
        'titulo' => 'required',
        'ubicacion' => 'required',
              ];
    }
}
