$( "#send-form" ).click(function() {
   $('#form-city').validate({
   	rules:
   	{
   		 city : { required: true },
       country_id : { required: true },
   	},
   	messages:
   	{
   		 city: { required: 'El nombre de la ciudad es obligatoria' },
       country_id: { required: 'Seleccione un país' },
   	},
   	highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
         $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
         $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');   
     },
     unhighlight: function(element) {
     	   var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');     
        
     },
     errorElement: 'span',
     errorClass: 'help-block',
     errorPlacement: function(error, element) {
         if(element.parent('.input-group').length) {
             error.insertAfter(element.parent());
         } else {
             error.insertAfter(element);
         }
     }
   });
 });