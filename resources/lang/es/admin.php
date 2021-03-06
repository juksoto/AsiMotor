<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the admin for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    
    'contacts'  => array(
        'address'                   => 'Dirección',
        'addresses'                 => 'Direcciones',
        'email'                     => 'Correo',
        'email_additional'          => 'Correo Adicional',
        'enter_a_valid_email'       => 'Ingrese un correo válido',
        'headquarters'              => 'Sede',
        'location'                  => 'Ubicación',
        'mail'                      => 'correo',
        'phone'                     => 'teléfono',
        'phones'                    => 'teléfonos',

        //Validaciones
        'no_address'                => 'No hay una direccion, debe agregar una.',
        'no_emails'                 => 'No ha agregado ningún correo adicional.',
        'no_phones'                 => 'No hay teléfonos. Debe agregar uno.',
    ),
    'country'  => array(
        'content_header'            => 'Ingrese el nombre del nuevo país y su código ISO',
        'countries'                 => 'paises',
        'country'                   => 'país',
        'edit_country'              => 'Editar país',
        'iso'                       => 'ISO',
        'iso_country'               => 'ISO del país',
        'name_country'              => 'Nombre del país',
        'new_country'               => 'Nuevo país',
        'select_a_country'          => 'Seleccionar un país',

        //validation
        'enter_a_name_country'     => 'Ingrese el nombre del país',
        'enter_a_iso_country'      => 'Ingrese el nombre del iso país',
        
    ),
    'city'  => array(
        'cities'                 => 'ciudades',
        'city'                   => 'ciudad',
        'content_header'         => 'Ingrese el nombre de la ciudad y escoja el país.',
        'name_city'              => 'Nombre de la ciudad',
        'new_city'               => 'Nueva ciudad',
        'total_cities'           => 'Total de ciudades',

        //validation
        'enter_a_name_city'      => 'Ingrese el nombre de la ciudad',
    ),


    'filter'  => array(
        'active'           => 'activo',
        'filter'           => 'filtrar',
        'inactive'         => 'inactivo',
        'search'           => 'buscar....',
        'select_a_filter ' => 'Seleccione un filtro',
    ),


     'menu'  => array(
        'classes'           => 'clases',
        'entries'           => 'entradas',
        'home'              => 'inicio',
        'makes'             => 'marcas',
        'lines'             => 'lineas',
        'page'              => 'páginas',
        'regional'          => 'regional',
        'settings'          => 'configuración',
        'settings|city'     => 'ciudades',
        'settings|country'  => 'paises',
        'users'             => 'usuarios',
        'vehicle'           => 'vehículo',
        'vehicles'          => 'vehículos',
    ),

     'message'  => array(
        'already_exists'                        => 'ya existe.',

        //Cities
        'city_already_exists'                   => 'Esta ciudad ya existe.',
        'city_is_required'                      => 'El nombre de la ciudad es obligatoria.',
        
        //Countries
        'country_already_exists'                => 'El nombre del país ya existe. Recomendamos mirar en los paises inactivos',
        'country_is_required'                   => 'El país es un campo obligatorio.',
        'country_is_selected'                   => 'Seleccione un país.',
        'country_iso_is_required'               => 'El ISO del país es un campo obligatorio.',
        
        //Vehicle
        'make_already_exists'                   => 'Esta marca ya ha sido creada.',
        'make_is_required'                      => 'El nombre de la marca es obligatoria.',

        'line_already_exists'                   => 'Esta linea ya ha sido creada.',
        'line_is_required'                      => 'El nombre de la linea es obligatoria.',

        'class_already_exists'                  => 'Esta clase ya ha sido creada.',
        'class_is_required'                     => 'El nombre de la clase es obligatoria.',

        'email_already_exists'                  => 'El correo ya existe.',
        'email_is_required'                     => 'El correo es un campo obligatorio.',
        'email_public'                          => 'Este correo es el que visualizarán los usuarios.',
        'iso_already_exists'                    => 'El ISO del país ya existe. Recomendamos mirar en los paises inactivos',
        
        'is_required'                           => 'es un campo obligatorio.',
        'no_records_found'                      => 'No se encontraron registros.',
        'password_confirmation_is_required'     => 'La contraseña de confirmación es un campo obligatorio.',
        'password_is_required'                  => 'La contraseña es un campo obligatorio.',
        'the_password_does_not_match'           => 'la contraseña no coincide',
        'user_already_exists'                   => 'El usuario ya existe.',
        'user_is_required'                      => 'El usuario es un campo requerido.',

        'total_records'                         => 'Total de registros',

        //Errors
        'error_city_country'                    => 'Recuerde crear o activar primero un país para luego crear una ciudad.',
        'error_create'                          => 'Ha ocurrido un error.',
        'error_create_make'                     => 'Ha ocurrido un error creando las marcas.',

        //alerts
        
        'alert_field_update'                    => 'se actualizo.',
        'create_new_city'                       => 'Se ha creado una nueva ciudad para ',
        'create_new_country'                    => 'Se ha creado un nuevo país.',
        'create_new_sucessful'                  => 'ha sido creado satisfactoriamente.',




    ),


    'social'  => array(
        'facebook_page'=>  'facebook página',
        'linkeind'     =>  'Linkeind',
        'skype'        =>  'Skype',
        'twitter'      =>  'twitter',
        'youtube'      =>  'youtube',
    ),

    'submit' => array(
   
        'add_city'          => 'Agregar ciudad',
        'add_country'       => 'Agregar país',
        'add_submit'        => 'Crear nuevo',
        
        //Vehicle
        'add_make'          => 'Crear nuevo',
        
        'back'              => 'Regresar',
        'create_button'     => 'Guardar',
        'create_new_button' => 'Guardar y Nuevo',
        'filter'            => 'Filtrar',
        'filter_object'     => 'Filtro',
        'publish'           => 'Publicar',
        'remove_address'    => 'Remover ',
        'select'            => 'Seleccionar',
        'unpublish'         => 'Despublicar',
        'unpublish_city'    => 'Despublicar ciudad',
        'update'            => 'Actualizar',
        'update_city'       => 'Actualizar ciudad',
        'update_country'    => 'Actualizar país',
    ),

    'status' => array(
        'status'                    => 'Estado',
        'has_been_published'        => 'ha sido publicado.',
        'has_been_removed'          => 'ha sido removido.',
        'published'                 => 'publicado',
        'unpublished'               => 'despublicado',
    ),

    'vehicle' => array(
        'create_vehicle_class'          => 'Crear nueva clase',
        'create_vehicle_line'          => 'Crear nueva linea',
        'create_vehicle_make'           => 'Crear nueva marca',

        'edit_vehicle_class'            => 'Editar clase',
        'edit_vehicle_line'             => 'Editar linea',
        'edit_vehicle_make'             => 'Editar marca',

        'vehicle_class'                 => 'Clase',
        'vehicle_line'                  => 'Linea',
        'vehicle_make'                  => 'Marca',

        'create_content_vehicle_class'  => 'Escriba el nombre de la clase. Ejemplo: Camioneta, Motocicleta, Vehículo.',
        'create_content_vehicle_make'   => 'Escriba el nombre de la marca del vehículo. Ejemplo: Hyundai, Mazda, Toyota.',
        'create_content_vehicle_line'   => 'Escriba el nombre de la linea del vehículo. Ejemplo: Picanto, Accent, CBF.',

        'edit_content_vehicle_class'    => 'Edite el nombre de la clase. Ejemplo: Camioneta, Motocicleta, Vehículo.',
        'edit_content_vehicle_make'     => 'Edite el nombre de la marca del vehículo. Ejemplo: Hyundai, Mazda, Toyota.',
        'edit_content_vehicle_line'     => 'Edite el nombre de la linea del vehículo. Ejemplo: Picanto, Accent, CBF.',

    ),
];
