@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.place.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.places.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.id') }}
                        </th>
                        <td>
                            {{ $place->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.name') }}
                        </th>
                        <td>
                            {{ $place->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.categories') }}
                        </th>
                        <td>
                            @foreach($place->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.description') }}
                        </th>
                        <td>
                            {{ $place->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.photos') }}
                        </th>
                        <td>
                            @foreach($place->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.address') }}
                        </th>
                        <td>
                            {{ $place->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.place.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $place->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.places.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection