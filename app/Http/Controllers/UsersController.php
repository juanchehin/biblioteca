<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
use Validator;
use Flash;
use app\DataTables\UserDataTable;
use app\User;
use Bican\Roles\Models\Role;
use Response;
use Prettus\Repository\Criteria\RequestCriteria;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
   {

        return $dataTable->render('users.ev-datatable');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*
         * Register user.
         * */
        try{
                $input = $request->all();
                $validator = Validator::make($input,User::$rules);

                if ($validator->fails()) {
                    return redirect()->route('users.create')
                                     ->withErrors($validator)
                                     ->withInput();
                }else{
                    $user = new User();
                    $user->name     = $request->name;
                    $user->email    = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->username    = $request->username;
                    $user->save();
                     $user->attachRole($request->type);
                     flash('Usuario Agregado con Exito!','success');
                    return redirect()->route('users.index');
                }
        }
        catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = $this->userRepository->findWithoutFail($id);
        $user = User::findOrFail($id);
        
        if (empty($user)) {
            Flash::error('Usuario No encontrado');

            return redirect(route('users.index'));
        }
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $rol=$user->roles->lists('id');

        $roles= Role::all()->lists('name','id');
        return view('users.edit', compact('user','roles','rol'));
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
      /*
         * Register user.
         * */
        try{
                $input = $request->all();
                $validator = Validator::make($input,[
                    'email' => 'required|unique:users,id,'.$id,
                     'name' => 'required'
            ]);

                if ($validator->fails()) {
                    return redirect()->withErrors($validator)
                                     ->withInput();
                }else{
                     $user = User::findOrFail($id);
                    $user->name     = $request->name;
                    $user->email    = $request->email;
                    $user->password = bcrypt($request->password);
                    $user->username    = $request->username;
                    $user->detachAllRoles();//quito los permisos asignados

                    $user->attachRole($request->type); //agrego permiso
                    $user->save();
                     flash('Usuario Modificado Exito!','success');

                    return redirect()->route('users.index');
                }
        }
        catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
            flash("Chau Registro! ",'susccess');
            return redirect()->route('users.index');
        } catch (Exception $e){
            flash("Fatal error - ".$e->getMessage(),'danger');
            return ;
        }
    }
}
