@extends('admin.layout')

@section('content')

    <section class="row">
        <article class="col-md-12">
            <h1>
                {!! trans('admin.city.new_city') !!}
            </h1>
            <p>
               {!! trans('admin.city.content_header') !!}
            </p>
        </article>
    </section>

    {!! Form::open(['route' => 'admin.city.store', 'method' => 'POST', 'class' => 'form-horizontal' , 'id' => 'form-city'])!!}
        <section class="form-group">
            <section class="col-md-12">
                @include('admin.partials.message')
            </section>
        </section>

        @include('admin.contact.city.partials.fields')

        <section class="form-group">
            <article class="col-sm-offset-2 col-sm-10">
                {!! Form::submit(trans('admin.submit.add_city'), ['class' => 'btn btn-primary' , 'id' => 'send-form']) !!}
                <a class="btn btn-danger" href="{{ route('admin.city.index') }}">{{ trans('admin.submit.back') }}</a>
            </article>
        </section>
        {!! Form::close()!!}
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/validate/validate-city.js')}}"></script>
@endsection