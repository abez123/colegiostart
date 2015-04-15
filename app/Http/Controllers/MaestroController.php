<?php namespace App\Http\Controllers;

class MaestroController extends Controller {

    /**
     * Initializer.
     *
     * @return \MaestroController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('maestro');
    }

}
