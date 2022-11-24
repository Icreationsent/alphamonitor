<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLgaRequest;
use App\Http\Requests\StoreLgaRequest;
use App\Http\Requests\UpdateLgaRequest;
use App\Models\Lga;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LgaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('lga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lgas = Lga::all();

        return view('admin.lgas.index', compact('lgas'));
    }

    public function create()
    {
        abort_if(Gate::denies('lga_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lgas.create');
    }

    public function store(StoreLgaRequest $request)
    {
        $lga = Lga::create($request->all());

        return redirect()->route('admin.lgas.index');
    }

    public function edit(Lga $lga)
    {
        abort_if(Gate::denies('lga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lgas.edit', compact('lga'));
    }

    public function update(UpdateLgaRequest $request, Lga $lga)
    {
        $lga->update($request->all());

        return redirect()->route('admin.lgas.index');
    }

    public function show(Lga $lga)
    {
        abort_if(Gate::denies('lga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lgas.show', compact('lga'));
    }

    public function destroy(Lga $lga)
    {
        abort_if(Gate::denies('lga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lga->delete();

        return back();
    }

    public function massDestroy(MassDestroyLgaRequest $request)
    {
        Lga::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
