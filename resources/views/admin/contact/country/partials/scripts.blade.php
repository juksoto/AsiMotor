<script>
    $( "#send-form" ).click(function() {
        $( "#country" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.country_is_required') !!}'
            },
        });
        $( "#iso" ).rules( "add" , {
            required: true,
            messages: {
                required: '{!! trans('admin.message.country_iso_is_required') !!}'
            },
        })
    });
</script>