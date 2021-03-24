<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriteriaEvidenceRequest;
use App\Models\CriteriaEvidence;
use Illuminate\Http\Request;

class CriteriaEvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CriteriaEvidence::paginate(10);
        
        return view('evidences.criteria.index', [
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
        return view('evidences.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriteriaEvidenceRequest $request)
    {
        $data = $request->all();

        CriteriaEvidence::create($data);

        return redirect()->route('criteria-evidence.index');
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
        $item = CriteriaEvidence::findOrFail($id);

        return view('evidences.criteria.edit', [
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
    public function update(CriteriaEvidenceRequest $request, $id)
    {
        $data = $request->all();

        $item = CriteriaEvidence::findOrFail($id);
        $item->update($data);

        return redirect()->route('criteria-evidence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CriteriaEvidence::findOrFail($id);

        $item->delete();

        return redirect()->route('criteria-evidence.index');
    }
}
