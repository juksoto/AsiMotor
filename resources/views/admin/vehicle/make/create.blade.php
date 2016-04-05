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

    {!! Form::open(['route' => 'admin.vehicle.make.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form'])!!}
        <section class="form-group">
            <section class="col-md-12" id="sectionMessage">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.vehicle.make.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-1 col-sm-10">
                {!! Form::submit(trans('admin.submit.create_button'), ['class' => 'btn btn-success' , 'id' => 'send-form']) !!}
                {!! link_to('#',  $title = trans("admin.submit.create_new_button") , $attributes = ['id' => 'create-new', 'class' => 'btn btn-warning'])  !!}
                {!! Form::hidden('_token',csrf_token(), ['id' => 'toke']) !!}
                <a class="btn btn-danger" href="{{ route('admin.vehicle.make.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
        {!! Form::close()!!}
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/validate/validate.js')}}"></script>
    @include('admin.vehicle.make.partials.scripts')

@endsection