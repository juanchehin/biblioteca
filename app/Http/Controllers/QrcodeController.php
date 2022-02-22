<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use app\Models\Libro;
use DNS2D;
use PDF;

class QrcodeController extends Controller
{
		public function generate(Request $request){
			
			if($request->ajax()){
                $columnas = $request->input('columnas');

                $array = array();

				foreach($columnas as $id){
					$libro = Libro::findOrFail($id);
					
					if (($libro->qr_img) == null) { // si el libro aun no tiene QR se lo genera
						$datos_libro= $libro->id;
						$codigo = DNS2D::getBarcodePNG($datos_libro, 'QRCODE');	
						$libro->qr_img = $codigo;
        				$libro->save(); //se genera el qr y se almacena en la BD
				
					}

					$array[] = $libro; // se van guardando los libros en un array

				}

				$view = view('libros.qr',compact('array'));
				$seccion = $view->renderSections();
				
				return $seccion['content'];
				
/*				return Response::json($seccion['content']); 
*/
/*                return $array;
*/            }
            return "HTTP Request";
			
		}



	public function verqr($input, Request $request){
			
/*			$id = $request->input('boton');
*/			
			$libro = Libro::findOrFail($input);


			if (($libro->qr_img) == null) {
				//se genera el qr y se almacena en la BD
				$datos_libro= $libro->id;
				$codigo = DNS2D::getBarcodePNG($datos_libro, 'QRCODE');	
				$libro->qr_img = $codigo;
        		$libro->save();
			}
			
			$view = view('libros.qr_repeat',compact('libro'));
			$seccion = $view->renderSections();
				
			return $seccion['content'];
			/*dd($id);*/					
	}

	public function generar_pdf(Request $request){
		
/*    	dd($request->all();
*/   		

		foreach($request->input('ids') as $id){
			$libro = Libro::findOrFail($id);
			$array[] = $libro; // se van guardando los libros en un array

		}
/*		dd($array);
*/
		$date = date('Y-m-d');
		$view =  \View::make('libros.pdf', compact('array', 'date'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		$pdf->setPaper('A4', 'portrait');      
		return $pdf->stream('pdf');
	}

	public function generar_pdf_repeat(Request $request){
		
    	/*dd($request->input('cantidad_imp'));*/
   		$cant = $request->input('cantidad_imp');
   		$id = $request->input('id'); 
		
		for ($i = 1; $i <= $cant; $i++) {
    		$libro = Libro::findOrFail($id);
			$array[] = $libro; // se van guardando los libros en un array
		}
		
		$date = date('Y-m-d');
		$view =  \View::make('libros.pdf', compact('array', 'date'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		$pdf->setPaper('A4', 'portrait');      
		return $pdf->stream('pdf');
	}
}