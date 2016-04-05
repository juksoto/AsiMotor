<?php

namespace App\Http\Controllers\AdminControllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Vehicle\EditClassRequest;
use App\Http\Requests\Vehicle\CreateClassRequest;
use AsiMotor\Core\Entities\Vehicle\AsiClass;
use AsiMotor\Core\Helpers;
use AsiMotor\Core\Repositories\Vehicle\ClassRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{/**
 * @var Request
 */
    private $request;
    /**
     * @var array
     */
    protected $classRepo;
    /**
     * @var Helpers
     */
    protected $helper;

    /**
     * @var AsiClass
     */
    protected $classVehicle;

    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, ClassRepo $classRepo)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> classRepo = $classRepo;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Country
     */
    public function findUser($id)
    {
        $this -> classVehicle = AsiClass::findOrFail( $id );
    }


    /**
     * Display a listing of the resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = AsiClass::className( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'vehicle_class', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.vehicle.class.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this -> data;

        return view('admin.vehicle.class.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClassRequest $request)
    {
        $classVehicle = AsiClass::create( $request -> all() );

        $message_floating = $classVehicle -> vehicle_class . " " .trans('admin.message.create_new_sucessful');
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

            return redirect() -> route( 'admin.vehicle.class.index' );
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
        $this -> data -> collection = $this -> classVehicle;
        $data = $this -> data;

        return view('admin.vehicle.class.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClassRequest $request, $id)
    {
        $this -> findUser($id);
        $this -> classVehicle -> fill( $request -> all() );
        $this -> classVehicle -> save();

        $message_floating = $this -> classVehicle -> vehicle_class . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.vehicle.class.index' );
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

        $active = $this -> helper -> valueActive( $this -> classVehicle -> active );
        $this -> classVehicle -> active = $active['active'];
        $message = $this -> classVehicle -> vehicle_class . " " .$active['message'];
        $this -> classVehicle -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route('admin.vehicle.class.index');
    }
}
