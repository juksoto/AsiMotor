@extends('admin.layout')

@section('content')

    <section class="row">
        <article class="col-xs-12">
            <h1 class="title_main">
                {!! $data -> collection -> vehicle_line !!}
                <span>
                    {!! trans('admin.vehicle.edit_vehicle_line') !!}
                </span>
            </h1>
            <p>
                {!! trans('admin.vehicle.edit_content_vehicle_line') !!}
            </p>
        </article>
    </section>

    {!! Form::model($data -> collection,['route' => ['admin.vehicle.line.update', $data -> collection], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form'])!!}

    <section class="form-group">
        <section class="col-md-12">
            @include('admin.partials.message')
        </section>
    </section>

    <!-- Section Fields -->
        @include('admin.vehicle.line.partials.fields')
    <!-- End Section Fields -->

    <!-- Section Buttons -->
    <section class="form-group">

        <!-- Button Submit and Cancel -->
        <article class="col-md-offset-1 col-sm-6 text-md-left text-xs-center col-xs-12 col-md-4">
            {!! Form::submit(trans('admin.submit.update'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
            <a class="btn btn-danger" href="{{ route('admin.vehicle.line.index') }}">{{ trans('admin.submit.back') }}</a>
        </article>
        <!-- End Button Submit and Cancel -->
        {!! Form::close()!!}
        <!-- Button Destroy -->
        <article class="col-md-offset-4 col-md-2 col-sm-6 col-xs-12 col-sm-offset-0 text-sm-right text-xs-center margin-xs-top no-margin-sm-top">

            {!! Form::open(['route' => ['admin.vehicle.line.destroy', $data -> collection], 'method' => 'DELETE', 'class' => '' ])!!}

            @if ($data -> collection -> active == true)
                {!! Form::submit(trans('admin.submit.unpublish'), ['class' => 'btn btn-warning']) !!}
                @else
                {!! Form::submit(trans('admin.submit.publish'), ['class' => 'btn btn-success']) !!}
            @endif

            {!! Form::close()!!}

        </article>
        <!-- End Button Destroy -->
    </section>
    <!-- End Section Buttons -->

@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/validate/validate.js')}}"></script>
    @include('admin.vehicle.class.partials.scripts')

@endsection