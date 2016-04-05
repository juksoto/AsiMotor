<script>
    $( "#send-form" ).click(function() {
        $( "#city" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.city_is_required') !!}'
            },
        });
        $( "#country_id" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.country_is_selected') !!}'
            },
        })
    });
</script>