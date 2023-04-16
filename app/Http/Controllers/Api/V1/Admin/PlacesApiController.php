<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Http\Resources\Admin\PlaceResource;
use App\Place;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlacesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlaceResource(Place::with(['categories', 'created_by'])->get());
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());
        $place->categories()->sync($request->input('categories', []));

        if ($request->input('photos', false)) {
            $place->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        return (new PlaceResource($place))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Place $place)
    {
        abort_if(Gate::denies('place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlaceResource($place->load(['categories', 'created_by']));
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place->update($request->all());
        $place->categories()->sync($request->input('categories', []));

        if ($request->input('photos', false)) {
            if (!$place->photos || $request->input('photos') !== $place->photos->file_name) {
                $place->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($place->photos) {
            $place->photos->delete();
        }

        return (new PlaceResource($place))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Place $place)
    {
        abort_if(Gate::denies('place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
