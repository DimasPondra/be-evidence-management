<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterEvidenceRequest;
use App\Models\RegisterEvidence;
use Illuminate\Http\Request;

class RegisterEvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RegisterEvidence::paginate(10);
        // dd($data);

        return view('evidences.register.index', [
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
        return view('evidences.register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterEvidenceRequest $request)
    {
        $data = $request->all();

        RegisterEvidence::create($data);

        return redirect()->route('register-evidence.index');
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
        $item = RegisterEvidence::findOrFail($id);

        return view('evidences.register.edit', [
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
    public function update(RegisterEvidenceRequest $request, $id)
    {
        $data = $request->all();

        $item = RegisterEvidence::findOrFail($id);
        $item->update($data);

        return redirect()->route('register-evidence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RegisterEvidence::findOrFail($id);
        $item->delete();

        return redirect()->route('register-evidence.index');
    }
}
