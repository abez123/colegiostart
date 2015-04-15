<?php namespace App\Http\Controllers\Maestro;

use App\Http\Controllers\MaestroController;

use App\User;





class PanelProfesorController extends MaestroController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $title = "PanelProfesor";


        $users = User::count();

        return view('maestro.panelprofesor.index',  compact('title','users'));
    }
}