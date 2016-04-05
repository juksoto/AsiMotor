<script>
    $( "#send-form" ).click(function() {
        $( "#vehicle_make" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.make_is_required') !!}'
            },
        });
    });
</script>
<script>
    $('#create-new').click(function () {
        var info = $('#vehicle_make').val();
        var route = "{{ route('admin.vehicle.make.store') }}";
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
            data: {vehicle_make: info},
            success: function(data){
                contentMessage(data.message_floating, data.message_alert)
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
        }

        })

    });
</script>
