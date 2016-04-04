@extends('admin.layout')

@section('content')

    <article class="row">
        <div class="col-md-12">
            <h1 class="title_main text-capitalize">
                {{ trans('admin.menu.makes') }}
                <span>
                    {{ trans('admin.menu.settings') }} {{ trans('admin.menu.vehicle') }}
                </span>
            </h1>
        </div>
    </article>

    <section id="content-message">
        @include('admin.partials.message')
    </section>

    {!! Form::model(Request::all(),['route' => 'admin.vehicle.make.index', 'method' => 'GET' , 'class' => 'row margin-xs-bottom no-margin-md-bottom' ])!!}
        <!-- Section Filter -->

        <article class="col-sm-12 col-md-4 filter-section">
            <div class="row">
                <!-- Search Field -->
                <div class="col-sm-8">
                    <div class="form-search search-only form-group">
                        <i class="search-icon glyphicon glyphicon-search"></i>
                        {!! Form::text('search', null, ['class' => 'form-control search-query', 'placeholder' => trans('admin.filter.search') ])  !!}
                    </div>
                </div>
                <!-- End Search Field -->

                <!-- Active Select -->
                <div class="col-sm-4 no-padding">
                    {!! Form::select ('active' , config('asiMotor.active') , null , [ 'class' => 'form-control col-sm-2']) !!}
                </div>
                <!-- End Active Select -->
            </div>
        </article>

        <article class="col-md-4 col-sm-6 text-sm-center">
            <ul class="list-inline text-xs-center text-md-left">
                <li class="text-left" >
                    <button type="submit" class="btn btn-primary">
                        <span class=" glyphicon glyphicon-filter" aria-hidden="true"></span>
                        {{ trans('admin.submit.filter') }}
                    </button>
                </li>
                <li class="text-left">
                    <a class="btn btn-danger" href="{{ route('admin.country.index') }}">
                        <span class=" glyphicon glyphicon-remove" aria-hidden="true"></span>
                        {{ trans('admin.submit.filter_object') }}
                    </a>

                </li>
            </ul>
        </article>
        <article class="col-sm-6 col-md-4 col-xs-12">
            <ul class="list-inline text-md-right text-xs-center margin-xs-top no-margin-sm-top">
                <li class="col-md-offset-5 col-xs-offset-0">
                    <a class="btn btn-success" href="{{ route('admin.vehicle.make.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        {{ trans('admin.submit.add_make') }}
                    </a>
                </li>
            </ul>
        </article>

        <!-- End Section Filter -->
        {!! Form::close()!!}



    <section class="small-12 large-12 medium-12 columns">
         @include('admin.vehicle.make.partials.table')
    </section>
    <section class="col-md-12 text-center">
        <div class="pagination text-center">
            <p>
                {!! $data -> collections ->links() !!}
            </p>
            <p>
                {!! trans('admin.message.total_records') !!}: {!! $data -> collections -> count() !!}
            </p>
        </div>
    </section>

    <section class="">
        {!! Form::open(['route' => ['admin.vehicle.make.destroy', ':VALUE_ID'], 'method' => 'DELETE', 'class' => '' , 'id' => 'form-active'])!!}
        {!! Form::close()!!}
    </section>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/custom/custom.js')}}"></script>
@endsection