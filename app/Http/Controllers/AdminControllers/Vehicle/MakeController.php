<?php

namespace App\Http\Controllers\AdminControllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Vehicle\CreateMakeRequest;
use AsiMotor\Core\Entities\Vehicle\AsiMake;
use AsiMotor\Core\Helpers;
use AsiMotor\Core\Repositories\Vehicle\MakeRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @var AsiMake
     */
    protected $make;

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
        $this -> make = AsiMake::findOrFail( $id );
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
    public function store(CreateMakeRequest $request)
    {
        $make = AsiMake::create( $request -> all() );

        $message_floating = $make -> vehicle_make . " " .trans('admin.message.create_new_sucessful');
        $message_alert ="alert-success";

        if ($request -> ajax())
        {
            return response() -> json([
                "message_floating" => $message_floating ,
                "message_alert" => $message_alert ,

            ]);
        }
        else
        {
            Session::flash('message_floating', $message_floating);
            Session::flash('message_alert', $message_alert);

            return redirect() -> route( 'admin.vehicle.make.index' );
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
        $this -> findUser($id);
        $this -> data -> collection = $this -> make;
        $data = $this -> data;

        return view('admin.vehicle.make.edit', compact('data'));
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
        $this -> findUser($id);
        $this -> make -> fill( $request -> all() );
        $this -> make -> save();

        $message_floating = $this -> make -> vehicle_make . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.vehicle.make.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this -> findUser($id);

        $active = $this -> helper -> valueActive( $this -> make -> active );
        $this -> make -> active = $active['active'];
        $message = $this -> make -> vehicle_make . " " .$active['message'];
        $this -> make -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route('admin.vehicle.make.index');
    }
}
