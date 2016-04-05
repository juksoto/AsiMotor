<script>
    $( "#send-form" ).click(function() {
        $( "#vehicle_class" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.class_is_required') !!}'
            },
        });
    });
</script>
<script>
    $('#create-new').click(function () {
        var info = $('#vehicle_class').val();
        var route = "{{ route('admin.vehicle.class.store') }}";
        var token = $('#toke').val();

        function contentMessage(messageContent, messageAlert)
        {
            $( "#sectionMessage" ).html('<div class="alert alert-dismissible" role="alert">' + messageContent + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>' );
            $("#sectionMessage .alert").addClass(messageAlert);
        }


        $.ajax ({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            dataType: 'json',
            data: {vehicle_class: info},
            success: function(data){
                contentMessage(data.message_floating, data.message_alert)
                $('#vehicle_class').val("");
                $('#vehicle_class').focus();
            },

            error: function(data){
                if( data.status === 422 ) {
                    //process validation errors here.
                    var errors = data.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    contentErrors ="<ul>";
                    $.each( errors , function( key, value ) {
                        contentErrors += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    contentErrors += '</ul>';

                    contentMessage(contentErrors, "alert-danger")
                }
                else
                {
                    contentErrors = '{!! trans('admin.message.error_create') !!}'
                    contentMessage(contentErrors, "alert-danger")
                }
                $('#vehicle_class').select();
        }

        })

    });
</script>
