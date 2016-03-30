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
        'mail'                      => 'correo',
        'phone'                     => 'teléfono',
        'phones'                    => 'teléfonos',
        'headquarters'              => 'Sede',
        'location'                  => 'Ubicación',

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
        'content_header'         => 'Ingrese el nombre de la ciudad y escoja el país.',
        'city'                   => 'ciudad',
        'cities'                 => 'ciudades',
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

    'identification' => array(
        'charter'  => 'cedula',
        'identity' => 'Tarjeta de Identidad',
        'foreign'  => 'Cédula extranjera',
    ),

     'menu'  => array(
        'entries'           => 'entradas',
        'home'              => 'inicio',
        'page'              => 'páginas',
        'regional'          => 'regional',
        'settings'          => 'configuración',
        'settings|city'     => 'ciudades',
        'settings|country'  => 'paises',
        'users'             => 'usuarios',
    ),

     'message'  => array(
        'already_exists'                     => 'ya existe.',
        'city_already_exists'                => 'Esta ciudad ya existe.',
        'country_already_exists'             => 'El nombre del país ya existe. Recomendamos mirar en los paises inactivos',
        'iso_already_exists'                 => 'El ISO del país ya existe. Recomendamos mirar en los paises inactivos',
        'city_is_required'                   => 'El nombre de la ciudad es obligatoria.',
        'country_is_required'                => 'El país es un campo obligatorio.',
        'email_already_exists'               => 'El correo ya existe.',
        'email_is_required'                  => 'El correo es un campo obligatorio.',
        'email_public'                       => 'Este correo es el que visualizarán los usuarios.',
        
        'is_required'                        => 'es un campo obligatorio.',
        'no_records_found'                   => 'No se encontraron registros.',
        'password_confirmation_is_required'  => 'La contraseña de confirmación es un campo obligatorio.',
        'password_is_required'               => 'La contraseña es un campo obligatorio.',
        'the_password_does_not_match'        => 'la contraseña no coincide',
        'user_already_exists'                => 'El usuario ya existe.',
        'user_is_required'                   => 'El usuario es un campo requerido.',

        //Errors
        'error_city_country'                 => 'Recuerde crear o activar primero un país para luego crear una ciudad.',

        //alerts
        'alert_field_update'                 => 'se actualizo.',
        'create_new_country'                 => 'Se ha creado un nuevo país.',
        'create_new_city'                    => 'Se ha creado una nueva ciudad para ',

        // University
        'img_profile_university'             => 'La imagen debe ser cuadrada (200px) em formato png o jpg. Max 150 kb',
        'img_header_university'              => 'Las medidas de la imagen es 1440px - 350px em formato png o jpg. Max 500 kb',
        'portafolio_university_upload'       => 'El tamaño debe ser máximo de 2MB. Formato PDF.',
        'url_video_university'               => 'Url de videos de youtube o vimeo.',
        'no_collaborators_university'        => 'No se han creado colaboradores para esta universidad.'



    ),

    'role'  => array(
        'administrator'  => 'administrador',
        'collaborator'   => 'colaborador',
        'maestrando'     => 'maestrando',
        'registered'     => 'registrado',
        'role'           => 'rol',
        'select_a_role'  => 'Seleccione un rol',
        'university'     => 'universidad',
    ),

    'social'  => array(
        'facebook_page'=>  'facebook página',
        'linkeind'     =>  'Linkeind',
        'skype'        =>  'Skype',
        'twitter'      =>  'twitter',
        'youtube'      =>  'youtube',
    ),

    'submit' => array(
        'add_address'       => 'Agregar dirección',
        'add_city'          => 'Agregar ciudad',
        'add_headquarter'   => 'Agregar otra sede ',
        'add_collaborator'  => 'Agregar un colaborador ',
        'add_country'       => 'Agregar país',
        'add_email'         => 'Agregar Correo',
        'add_phone'         => 'Agregar Teléfono',
        'add_university'    => 'Agregar Universidad',
        'add_user'          => 'Agregar Usuario',
        'back'              => 'regresar',
        'filter'            => 'Filtrar',
        'filter_object'     => 'Filtro',
        'publish'           => 'Publicar',
        'remove_address'    => 'Remover dirección',
        'remove_all'        => 'Remover todo',
        'remove_email'      => 'Remover Correo',
        'remove_filter'     => 'Remover Filtro',
        'remove_phone'      => 'Remover Teléfono',
        'select'            => 'Seleccionar',
        'unpublish'         => 'Despublicar',
        'unpublish_city'    => 'Despublicar ciudad',
        'update_city'       => 'Actualizar ciudad',
        'update_country'    => 'Actualizar país',
        'update_university' => 'Actualizar universidad',
    ),

    'status' => array(
        'status'                    => 'Estado',
        'has_been_published'        => 'ha sido publicado.',
        'has_been_removed'          => 'ha sido removido.',
        'published'                 => 'publicado',
        'unpublished'               => 'despublicado',
    ),

    'table' => array(
        'Email'                     => 'Correo',
        'Username'                  => 'Usuario',
        'University'                => 'Universidad',
        'Role'                      => 'Rol',
    ),
    
    'type_training'  => array(
        'programs'     => 'programas',
        'doctorates'   => 'doctorados',
        'master'       => 'maestrías',
        'graduates'    => 'diplomados',
        'seminary'     => 'seminarios',
        'courses'      => 'cursos',
    ),

    'university'  => array(
        'color_header_university'   =>  'Color encabezado del perfil',
        'color_university'          =>  'Color de la Universidad',
        'email_representative'      =>  'Correo del representante',
        'header_img'                =>  'Imagen Encabezado',
        'identification'            =>  'Identificación',
        'img_logo'                  =>  'Logo universidad',
        'img_logo_sq'               =>  'Logo universidad cuadrado',
        'long_description'          =>  'Descripción larga',
        'name_representative'       =>  'Nombre del representante',
        'name_university'           =>  'Nombre de Universidad',
        'phone_representative'      =>  'Teléfono del repreentante',
        'reason_social'             =>  'Razón social',
        'short_description'         =>  'Descripción corta',
        'short_name'                =>  'Nombre Corto',
        'slogan'                    =>  'Slogan',
        'university'                =>  'universidad',
        'url_pdf'                   =>  'Cargar portafolio',
        'url_video'                 =>  'Video de la universidad',
        'website'                   =>  'Sitio Web',

        //Validaciones
       
        'enter_a_identification'    =>  'Ingrese la identifación de la empresa',
        'enter_a_long_description'  =>  'Escriba descripcion',
        'enter_a_name_university'   =>  'Ingrese el nombre de la universidad',
        'enter_a_short_description' =>  'Escriba una descripcion corta',
        'enter_a_short_name'        =>  'Ingrese el nombre corto universidad',
        'enter_a_slogan'            =>  'Escriba el slogan de la universidad',
        'enter_a_website'           =>  'Escriba una dirección web',
        
        'design_university'         =>  'Diseño de la universidad',
        'profile_university'        =>  'Personalizar perfil',
        'university_info'           =>  'Información de la Universidad',
        'user_university'           =>  'Usuario de la universidad',
    ),
    'users'  => array(
        // titles
        'perfil_social'             => 'Perfil Social',
        'personal_data'             => 'Datos Personales',
        'profile_professional'      => 'Perfil Profesional',
        'user_profile'              => 'Perfil Maestrando',

        // labels
        'company'                   => 'Empresa',
        'current_password'          => 'Contraseña actual',
        'date_of_birth'             => 'Fecha de nacimiento',
        'employment situation'      => 'Situación laboral',
        'female'                    => 'Femenino',
        'first_name'                => 'Nombre',
        'gender'                    => 'Género',
        'last_name'                 => 'Apellido',
        'male'                      => 'Masculino',
        'marital status'            => 'Estado civil',
        'name'                      => 'Nombre',
        'new_password'              => 'Nueva contraseña',
        'password'                  => 'Contraseña',
        'password_confirmation'     => 'Confirmar Contraseña',
        'position'                  => 'Cargo',
        'profession'                => 'Profesión',
        'type_identification'       => 'Tipo de identificatión',
        'username'                  => 'usuario',

        // Validaciones
         'enter_your_user'                     =>  'Ingrese el nombre de usuario',
         'enter_your_password'                 =>  'Ingrese la contraseña',
         'enter_your_password_confirmation'    =>  'Ingrese nuevamente la contraseña',
         'enter_your_email'                    =>  'Ingrese un correo válido',

    ),
];
