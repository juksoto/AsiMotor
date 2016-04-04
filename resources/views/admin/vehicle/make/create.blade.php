@extends('admin.layout')

@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.vehicle.create_vehicle_make') !!}
            </h1>
            <p>
               {!! trans('admin.vehicle.create_content_vehicle_make') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.vehicle.make.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form-country'])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.vehicle.make.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add_make'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.vehicle.make.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
        {!! Form::close()!!}
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/custom/generate_field.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/validate/validate-country.js')}}"></script>

@endsection