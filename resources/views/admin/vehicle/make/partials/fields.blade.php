<section id="wrapper-make">
    <section class="form-group has-feedback" id="field_template_0">
        {!! Form::label('make_0',trans('admin.vehicle.vehicle_make'), ['class' => 'col-sm-1 control-label'] ) !!}
        <div class="col-sm-10">
            {!! Form::text('make_0', null, ['class' => 'form-control', 'placeholder' => trans('admin.vehicle.vehicle_make') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="country1"></span>
        </div>
        <div class="col-sm-1">
            <p>
                <a id="remove_current_email" onclick=""> <span class="glyphicon glyphicon-remove color-danger" aria-hidden="true"></span></a>
            </p>
        </div>
    </section>
</section>
<a href="#" onclick='createNewFields("#wrapper-make", "make")' id="add_email">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar más marcas
    {!! Form::hidden('num_vehicle_make', 0, ['id' => 'num_vehicle_make'])  !!}
</a>
