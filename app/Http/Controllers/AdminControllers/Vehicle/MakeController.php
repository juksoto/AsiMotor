<?php

namespace App\Http\Controllers\AdminControllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use AsiMotor\Core\Entities\Vehicle\AsiMake;
use AsiMotor\Core\Helpers;
use Illuminate\Http\Request;
use AsiMotor\Core\Repositories\Vehicle\MakeRepo;

class MakeController extends Controller
{/**
 * @var Request
 */
    private $request;
    /**
     * @var array
     */
    protected $makeRepo;
    /**
     * @var Helpers
     */
    protected $helper;

    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, MakeRepo $makeRepo)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> makeRepo = $makeRepo;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Country
     */
    public function findUser($id)
    {
        $this -> country = AsiMake::findOrFail( $id );
    }


    /**
     * Display a listing of the resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = AsiMake::countryName( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'vehicle_make', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.vehicle.make.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this -> data;

        return view('admin.vehicle.make.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> makeRepo -> createMakes($request -> all());

        return redirect() -> route( 'admin.vehicle.make.index' );
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
