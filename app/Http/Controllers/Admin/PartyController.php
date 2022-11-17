<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartyRequest;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use App\Models\Party;
use App\Models\Vote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('party_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parties = Party::with(['party'])->get();

        return view('admin.parties.index', compact('parties'));
    }

    public function create()
    {
        abort_if(Gate::denies('party_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parties = Vote::pluck('party', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.parties.create', compact('parties'));
    }

    public function store(StorePartyRequest $request)
    {
        $party = Party::create($request->all());

        return redirect()->route('admin.parties.index');
    }

    public function edit(Party $party)
    {
        abort_if(Gate::denies('party_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parties = Vote::pluck('party', 'id')->prepend(trans('global.pleaseSelect'), '');

        $party->load('party');

        return view('admin.parties.edit', compact('parties', 'party'));
    }

    public function update(UpdatePartyRequest $request, Party $party)
    {
        $party->update($request->all());

        return redirect()->route('admin.parties.index');
    }

    public function show(Party $party)
    {
        abort_if(Gate::denies('party_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $party->load('party');

        return view('admin.parties.show', compact('party'));
    }

    public function destroy(Party $party)
    {
        abort_if(Gate::denies('party_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $party->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartyRequest $request)
    {
        Party::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
