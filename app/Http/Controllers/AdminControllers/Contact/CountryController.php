<?php

namespace App\Http\Controllers\AdminControllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\EditCountryRequest;
use AsiMotor\Core\Entities\Contact\AsiCountry;
use AsiMotor\Core\Helpers;
use AsiMotor\Core\Repositories\Contact\CountryRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CountryController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var array
     */
    protected $country;
    /**
     * @var Helpers
     */
    protected $helper;

    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper)
    {
        $this -> request = $request;

        $this -> helper = $helper;

        $this -> data = new \stdClass();

        //$this -> middleware('findUser', ['only' => ['show','edit','update','destroy']]);

    }

    /**
     * @param $id id del Country
     */
    public function findUser($id)
    {
        $this -> country = AsiCountry::findOrFail( $id );
    }


    /**
     * Display a listing of the resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = AsiCountry::countryName( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'country', 'ASC' )
            -> paginate();

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.contact.country.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resourcise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this -> data;

        return view('admin.contact.country.create',  compact('data')); //
    }

    /**
     * Store a newly created resourcise in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCountryRequest $request)
    {
        $country = AsiCountry::create( $request -> all() );

        $message_floating = trans('admin.message.create_new_country');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.country.index');
    }

    /**
     * Display the specified resourcise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resourcise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this -> findUser($id);
        $this -> data -> collection = $this -> country;
        $data = $this -> data;

        return view('admin.contact.country.edit', compact('data'));
    }

    /**
     * Update the specified resourcise in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCountryRequest $request, $id)
    {
        $this -> findUser($id);

        $this -> country -> fill( $request -> all() );
        $this -> country -> save();

        $message_floating = $this -> country -> country . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.country.index' );
    }

    /**
     * Remove the specified resourcise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Funcion valueActive, hace el cambio si el campo active es true, lo vuelve false. Enviamos como parametro
     * un booleano, el valor actual del campo acrive.
     */
    public function destroy($id)
    {
        $this -> findUser($id);
        $active = $this -> helper -> valueActive( $this -> country -> active );
        $this -> country -> active = $active['active'];
        $message = $this -> country -> country . " " .$active['message'];
        $this -> country -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route('admin.country.index');
    }
}
