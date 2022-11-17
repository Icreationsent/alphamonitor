<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPoolingUnitRequest;
use App\Http\Requests\StorePoolingUnitRequest;
use App\Http\Requests\UpdatePoolingUnitRequest;
use App\Models\PoolingUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoolingUnitController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pooling_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolingUnits = PoolingUnit::all();

        return view('admin.poolingUnits.index', compact('poolingUnits'));
    }

    public function create()
    {
        abort_if(Gate::denies('pooling_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poolingUnits.create');
    }

    public function store(StorePoolingUnitRequest $request)
    {
        $poolingUnit = PoolingUnit::create($request->all());

        return redirect()->route('admin.pooling-units.index');
    }

    public function edit(PoolingUnit $poolingUnit)
    {
        abort_if(Gate::denies('pooling_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poolingUnits.edit', compact('poolingUnit'));
    }

    public function update(UpdatePoolingUnitRequest $request, PoolingUnit $poolingUnit)
    {
        $poolingUnit->update($request->all());

        return redirect()->route('admin.pooling-units.index');
    }

    public function show(PoolingUnit $poolingUnit)
    {
        abort_if(Gate::denies('pooling_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poolingUnits.show', compact('poolingUnit'));
    }

    public function destroy(PoolingUnit $poolingUnit)
    {
        abort_if(Gate::denies('pooling_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poolingUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoolingUnitRequest $request)
    {
        PoolingUnit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
