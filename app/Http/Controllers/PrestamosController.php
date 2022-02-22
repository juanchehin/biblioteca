<?php

namespace app\Http\Controllers;

use Illuminate\Support\Collection as Collection;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\DataTables\PrestamoDataTable;
use app\DataTables\CargarPrestamoDataTable;
use Carbon\Carbon;

use app\Models\Libro;
use app\Models\Editorial;
use app\Models\Coleccion;
use app\Models\Prestamo;
use app\Models\Prestamo_Libro;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrestamoDataTable $dataTable)
    {
/*        $productos = Producto::all();
        return view('productos.datatable')->with('productos', $productos);
*/      return $dataTable->render('prestamos.datatable');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('prestamos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $user_prestamo = new Prestamo();
        $user_prestamo->fill($request->all());
        $user_prestamo->user_id = $user->id;
      
        $user_prestamo->save();

        flash('Usuario agregado con Exito!', 'success');

        return redirect(route('prestamos.index'));
    }

    public function form_prestamo($id, CargarPrestamoDataTable $dataTable)
    {
         $prestamo = Prestamo::findOrFail($id);

        if (empty($prestamo)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('prestamos.index'));
        }

        //dd($dataTable->render('prestamos.form-prestamos')->with('prestamo', $prestamo));

        return $dataTable->render('prestamos.form-prestamos', compact('prestamo'));
        
        //return view('prestamos.form-prestamos', compact('prestamo', 'dataTable'));
        

        return view('prestamos.form-prestamos')->with('dataTable', $dT);
    }

    public function cargar_Libros($user, Request $request)
    {
         if(!empty($request->input('columnas'))){
                $libros = $request->input('columnas');

                $array = array();
                $cant_prest = array();
        
                foreach($libros as $id){
                    $libro = Libro::findOrFail($id);
                    $array[] = $libro;
                    $cant_prest[] = $libro->cant_ejemplares - $libro->libros_prestados; // se van guardando los libros en un array
                }
               //dd($cant_prest);
                
                $view = view('prestamos.confirmar', compact('user','array', 'cant_prest'));
                $seccion = $view->renderSections();
                
                return $seccion['content'];          

        }else{
            return -1;    
        } 
    }

     public function confirmarPrestamo(Request $request)
    {
        $cant = $request->input('cantidad_prestar');
        //$id = $request->input('id'); 
        $date = Carbon::now();
        $hoy = $date->format('Y-m-d');
        //dd($cant);
        $i = 0;
        foreach($request->input('ids') as $id){
                    //$libro = Libro::findOrFail($id);
                    $libro = Libro::findOrFail($id);
                    $libro->libros_prestados = $cant[$i];
                    $libro->save();
                    $prestamo_libro = new Prestamo_Libro();
                    
                    $prestamo_libro->id_prestamo = $request->input('user');
                    $prestamo_libro->id_libro = $id;
                    $prestamo_libro->cantidad_prestadas = $cant[$i];
                    $prestamo_libro->fecha = $hoy;
                    $prestamo_libro->save();
                    $i = $i +1;
                }

        flash('Prestamo confirmado con Exito!', 'success');
  
        return redirect()->route('prestamos.index');
    }

    public function show($id)
    {

        $libros = Prestamo_Libro::select(            
             'libros.id',
             'libros.titulo',
             'libros.autor',
             'libros.area',
             'libros.ubicacion',
             'libros.cant_ejemplares',
             'prestamos_libros.fecha',
             'prestamos_libros.cantidad_prestadas',
             'prestamos_libros.id as id_prest_lib'
             )
        ->join('libros', 'libros.id', '=', 'prestamos_libros.id_libro')
        ->where('prestamos_libros.id_prestamo','=',$id)
        ->get();


        if (count($libros)==0) {
            flash('El usuario no tiene préstamos realizados..','error');

            return redirect(route('prestamos.index'));
        }
        return view('prestamos.show', compact('libros'));
    }

     public function DevolverLibros(Request $request)
    {
        $cant = $request->input('ids_cantidades');
        $i = 0;

        foreach($request->input('ids_libros') as $id){
                    //$libro = Libro::findOrFail($id);
                    $libro = Libro::findOrFail($id);
                    $libro->libros_prestados = $libro->libros_prestados - $cant[$i];
                    $libro->save();
                    $i = $i +1;
                }

        foreach($request->input('ids_prest') as $id){
                    $presta_libro = Prestamo_Libro::findOrFail($id);
                    $presta_libro->delete();
                }

        flash('Prestamo devuelto con Exito!', 'success');
     
        return redirect()->route('prestamos.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
           
        return view('prestamos.edit',compact('prestamo'));
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

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->fill($request->all());
        $prestamo->user_id=$user->id;
        $prestamo->save();

        flash('Usuario-Prestamo modificado con Exito!','success');

        return redirect()->route('prestamos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->identificador;

        $user_prestamo = Prestamo::findOrFail($request->identificador);
        
        $prestamo = Prestamo_Libro::where('id_prestamo',$id)->get();
        

        if (empty($user_prestamo)) {
            flash('Usuario no Encontrado', 'error');

            return redirect()->route('prestamos.index');
        }

        if (count($prestamo) != 0) {
            flash('Usuario con libros sin devolver...', 'error');

            return redirect()->route('prestamos.index');
        }

        $user_prestamo->delete($request->identificador);

        flash('Usuario borrado con Éxito!', 'success');

        return redirect()->route('prestamos.index');
        
    }
}
