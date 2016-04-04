<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-capitalize">
                    Nº
                </th>
                <th class="text-capitalize">
                    @sortablelink('vehicle_make', trans("admin.vehicle.vehicle_make"))
                </th>
                <th class="text-center text-capitalize">
                    {{ trans('admin.status.status') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($data -> collections as $key => $collection)
                <tr data-id="{{ $collection->id  }}">
                    <td>  {!! ($key + 1) !!}</td>
                    <td>
                        <a href="{{ route('admin.country.edit', $collection) }}">
                            {!! $collection -> vehicle_make !!}
                        </a>
                        <small>
                            <a href="{{ route('admin.country.edit', $collection) }}">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                        </small>

                    </td>
                    <td class="text-center">
                        <a href="#" class="btn-active">
                            @if ($collection->active == true)
                                <span class="glyphicon glyphicon-ok-sign color-sucessful"></span>
                                @else
                                <span class="glyphicon glyphicon-remove-sign color-danger"></span>
                            @endif
                        </a>
                    </td>
                </tr>
            @empty
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{ trans('admin.message.no_records_found') }}
        </div>
        @endforelse
            </tbody>
        </table>
    </div>
</div>
