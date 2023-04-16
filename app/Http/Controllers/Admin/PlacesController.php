<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Day;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPlaceRequest;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Place;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlacesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('place_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $places = Place::all();

        return view('admin.places.index', compact('places'));
    }

    public function create()
    {
        abort_if(Gate::denies('place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');
        //$days = Day::all();

        //return view('admin.places.create', compact('categories', 'days'));
        return view('admin.places.create', compact('categories'));
    }

    public function store(StorePlaceRequest $request)
    {
        $place = Place::create($request->all());
        $place->categories()->sync($request->input('categories', []));

        /*$hours = collect($request->input('from_hours'))->mapWithKeys(function($value, $id) use ($request) {
            return $value ? [ 
                    $id => [
                        'from_hours'    => $value, 
                        'from_minutes'  => $request->input('from_minutes.'.$id), 
                        'to_hours'      => $request->input('to_hours.'.$id),
                        'to_minutes'    => $request->input('to_minutes.'.$id)
                    ]
                ] 
                : [];
        });
        $place->days()->sync($hours);

        foreach ($request->input('photos', []) as $file) {
            $place->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        return redirect()->route('admin.places.index');
        */
    }

    public function edit(Place $place)
    {
        abort_if(Gate::denies('place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id');
        //$days = Day::all();

        //$place->load('categories', 'created_by', 'days');
        $place->load('categories', 'created_by');

        //return view('admin.places.edit', compact('categories', 'place', 'days'));
        return view('admin.places.edit', compact('categories', 'place'));
    }

    public function update(UpdatePlaceRequest $request, Place $place)
    {
        if(!$request->active){
            $request->merge([
                'active' => 0
            ]);
        }
        $place->update($request->all());
        $place->categories()->sync($request->input('categories', []));

        /*$hours = collect($request->input('from_hours'))->mapWithKeys(function($value, $id) use ($request) {
            return $value ? [ 
                    $id => [
                        'from_hours'    => $value, 
                        'from_minutes'  => $request->input('from_minutes.'.$id), 
                        'to_hours'      => $request->input('to_hours.'.$id),
                        'to_minutes'    => $request->input('to_minutes.'.$id)
                    ]
                ] 
                : [];
        });
        $place->days()->sync($hours);*/

        if (count($place->photos) > 0) {
            foreach ($place->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $place->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $place->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.places.index');
    }

    public function show(Place $place)
    {
        abort_if(Gate::denies('place_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$days = Day::all();
        $place->load('categories', 'created_by');

        //return view('admin.places.show', compact('place', 'days'));
        return view('admin.places.show', compact('place'));
    }

    public function destroy(Place $place)
    {
        abort_if(Gate::denies('place_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $place->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlaceRequest $request)
    {
        Place::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
