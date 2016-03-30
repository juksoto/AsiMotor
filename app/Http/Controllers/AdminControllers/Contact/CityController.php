<?php

namespace App\Http\Controllers\AdminControllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\EditCityRequest;
use AsiMotor\Core\Entities\Contact\AsiCity;
use AsiMotor\Core\Entities\Contact\AsiCountry;
use AsiMotor\Core\Helpers;
use AsiMotor\Core\Repositories\Contact\CityRepo;
use AsiMotor\Core\Repositories\Contact\CountryRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{

    /**
     * @var array contains a collection of cities
     */
    protected $city;
    /**
     * @var array contains a collection of countries
     */
    protected $country;

    /**
     * @var array Contiene la informacion que vamos a enviar a las vistas
     */
    protected $data;

    /**
     * @var Helpers
     */
    protected $helper;

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     * beforeFilter Este filtro sirve para llamar el metodo findUser con las siguientes opciones
     */
    public function __construct(Request $request, Helpers $helper, CityRepo $cityRepo, CountryRepo $countryRepo)
    {
        $this -> request = $request;

        $this -> country = $countryRepo -> get();

        $this -> cityRepo = $cityRepo;

        $this -> helper = $helper;

        $this -> data = new \stdClass();

      //  $this -> middleware('@findUser', ['only' => ['show','edit','update','destroy']]);


    }

    /**
     * @param $id id del Country
     */
    public function findUser($id)
    {
        $this -> city = AsiCity::findOrFail( $id );
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = AsiCity::cityName( $this -> request -> get('search') )
            -> sortable()
            -> active( $this -> request -> get('active') )
            -> orderBy( 'city', 'ASC' )
            -> with('country')
            -> paginate(25);

        $this -> data -> collections = $collection;
        $data = $this -> data;

        return view( 'admin.contact.city.index', compact( 'data' ) );
    }

    /**
     * Show the form for creating a new resource.
     * $this -> country = array con el listado de todos los paises.
     * @return \Illuminate\Http\Response
     * [Description]
     * Si no hay paises creados, redirecciona al index e imprime el mensaje que primero debe crear un pais.
     */
    public function create()
    {
        $this -> data -> country = $this -> country;
        $data = $this -> data;

        return $this -> cityRepo -> validateExistCountry( $this -> country -> count(), $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCityRequest $request)
    {
        $city = AsiCity::create( $request -> all() );

        $country = AsiCountry::find($city -> country_id);

        $message_floating = trans('admin.message.create_new_city') .$country -> country;
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route('admin.city.index');
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
        $this -> data -> collection = $this -> city;
        $this -> data -> country = $this -> country;
        $data = $this -> data;

        return view('admin.contact.city.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCityRequest $request, $id)
    {
        $this -> findUser($id);
        $this -> city -> fill( $request -> all() );
        $this -> city -> save();

        $message_floating = $this -> city -> city . " " . trans('admin.message.alert_field_update');
        $message_alert ="alert-success";

        Session::flash('message_floating', $message_floating);
        Session::flash('message_alert', $message_alert);

        return redirect() -> route( 'admin.city.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Funcion valueActive, hace el cambio si el campo active es true, lo vuelve false. Enviamos como parametro
     * un booleano, el valor actual del campo acrive.
     */
    public function destroy($id)
    {
        $this -> findUser($id);

        $active = $this -> helper -> valueActive( $this -> city -> active );
        $this -> city -> active = $active['active'];
        $message = $this -> city -> city . " " .$active['message'];
        $this -> city -> save();

        if ($this -> request -> ajax() )
        {
            return response() -> json([
                'message'       =>  $message,
                'class'         =>  $active['message_alert'],
            ]);
        }

        Session::flash('message_floating', $message);
        Session::flash('message_alert', $active['message_alert']);

        return redirect() -> route('admin.city.index');
    }
}
