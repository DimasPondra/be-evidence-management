<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailEvidenceRequest;
use App\Models\RegisterEvidence;
use App\Models\CriteriaEvidence;
use App\Models\DetailEvidence;
use Illuminate\Http\Request;

class DetailEvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DetailEvidence::with([
            'register', 'criteria', 'images'
        ])->get();

        return view('evidences.detail.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $register = RegisterEvidence::all();
        $criteria = CriteriaEvidence::all();

        return view('evidences.detail.create', [
            'register' => $register,
            'criteria' => $criteria
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailEvidenceRequest $request)
    {
        $data = $request->all();

        DetailEvidence::create($data);

        return redirect()->route('detail-evidence.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = RegisterEvidence::all();
        $criteria = CriteriaEvidence::all();

        $item = DetailEvidence::with([
            'register', 'criteria'
        ])->findOrFail($id);

        return view('evidences.detail.edit', [
            'register' => $register,
            'criteria' => $criteria,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailEvidenceRequest $request, $id)
    {
        $data = $request->all();

        $item = DetailEvidence::findOrFail($id);
        $item->update($data);

        return redirect()->route('detail-evidence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DetailEvidence::findOrFail($id);
        $item->delete();

        return redirect()->route('detail-evidence.index');
    }
}
