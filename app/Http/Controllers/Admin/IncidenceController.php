<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyIncidenceRequest;
use App\Http\Requests\StoreIncidenceRequest;
use App\Http\Requests\UpdateIncidenceRequest;
use App\Models\Incidence;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class IncidenceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('incidence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidences = Incidence::with(['created_by', 'media'])->get();

        return view('admin.incidences.index', compact('incidences'));
    }

    public function create()
    {
        abort_if(Gate::denies('incidence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.incidences.create');
    }

    public function store(StoreIncidenceRequest $request)
    {
        $incidence = Incidence::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $incidence->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        foreach ($request->input('videos', []) as $file) {
            $incidence->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('videos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $incidence->id]);
        }

        return redirect()->route('admin.incidences.index');
    }

    public function edit(Incidence $incidence)
    {
        abort_if(Gate::denies('incidence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidence->load('created_by');

        return view('admin.incidences.edit', compact('incidence'));
    }

    public function update(UpdateIncidenceRequest $request, Incidence $incidence)
    {
        $incidence->update($request->all());

        if (count($incidence->images) > 0) {
            foreach ($incidence->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $incidence->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $incidence->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if (count($incidence->videos) > 0) {
            foreach ($incidence->videos as $media) {
                if (!in_array($media->file_name, $request->input('videos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $incidence->videos->pluck('file_name')->toArray();
        foreach ($request->input('videos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $incidence->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('videos');
            }
        }

        return redirect()->route('admin.incidences.index');
    }

    public function show(Incidence $incidence)
    {
        abort_if(Gate::denies('incidence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidence->load('created_by');

        return view('admin.incidences.show', compact('incidence'));
    }

    public function destroy(Incidence $incidence)
    {
        abort_if(Gate::denies('incidence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incidence->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncidenceRequest $request)
    {
        Incidence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('incidence_create') && Gate::denies('incidence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Incidence();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
