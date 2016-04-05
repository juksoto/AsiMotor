<?php

namespace App\Http\Controllers\AdminControllers\Vehicle;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Vehicle\EditLineRequest;
use App\Http\Requests\Vehicle\CreateLineRequest;
use AsiMotor\Core\Entities\Vehicle\AsiLine;
use AsiMotor\Core\Helpers;
use AsiMotor\Core\Repositories\Vehicle\LineRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LineController extends Controller
{/**
 * @var Request
 */
    private $request;
    /**
     * @var array
     */
    protected $lineRepo;
    /**
     * @var Helpers
     */
    protected $helper;

    /**
     * @var AsiLine
     */
    protected $lineVehicle;

    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, LineRepo $lineRepo)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> lineRepo = $lineRepo;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Country
     */
    public function findUser($id)
    {
        $this -> lineVehicle = AsiLine::findOrFail( $id );
    }


    /**
     * Display a listing of the resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = AsiLine::lineName( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'vehicle_line', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.vehicle.line.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this -> data;

        return view('admin.vehicle.line.create',  compact('data')); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLineRequest $request)
    {
        $lineVehicle = AsiLine::create( $request -> all() );

        $message_floating = $lineVehicle -> vehicle_line . " " .trans('admin.message.create_new_sucessful');
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

            return redirect() -> route( 'admin.vehicle.line.index' );
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
        $this -> data -> collection = $this -> lineVehicle;
        $data = $this -> data;

        return view('admin.vehicle.line.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditLineRequest $request, $id)
    {
        $this -> findUser($id);
        $this -> lineVehicle -> fill( $request -> all() );
        $this -> lineVehicle -> save();

        $message_floating = $this -> lineVehicle -> vehicle_line . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.vehicle.line.index' );
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

        $active = $this -> helper -> valueActive( $this -> lineVehicle -> active );
        $this -> lineVehicle -> active = $active['active'];
        $message = $this -> lineVehicle -> vehicle_line . " " .$active['message'];
        $this -> lineVehicle -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route('admin.vehicle.line.index');
    }
}
