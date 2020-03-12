<?php

namespace App\Http\Controllers\Admin;

use App\Guardian;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGuardianRequest;
use App\Http\Requests\StoreGuardianRequest;
use App\Http\Requests\UpdateGuardianRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GuardiansController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('guardian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guardians = Guardian::all();

        return view('admin.guardians.index', compact('guardians'));
    }

    public function create()
    {
        abort_if(Gate::denies('guardian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guardians.create');
    }

    public function store(StoreGuardianRequest $request)
    {
        $guardian = Guardian::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $guardian->id]);
        }

        return redirect()->route('admin.guardians.index');
    }

    public function edit(Guardian $guardian)
    {
        abort_if(Gate::denies('guardian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.guardians.edit', compact('guardian'));
    }

    public function update(UpdateGuardianRequest $request, Guardian $guardian)
    {
        $guardian->update($request->all());

        return redirect()->route('admin.guardians.index');
    }

    public function show(Guardian $guardian)
    {
        abort_if(Gate::denies('guardian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guardian->load('parentStudents');

        return view('admin.guardians.show', compact('guardian'));
    }

    public function destroy(Guardian $guardian)
    {
        abort_if(Gate::denies('guardian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guardian->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuardianRequest $request)
    {
        Guardian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('guardian_create') && Gate::denies('guardian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Guardian();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
