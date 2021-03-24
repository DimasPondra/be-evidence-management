<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageEvidenceRequest;
use App\Models\DetailEvidence;
use App\Models\ImageEvidence;
use Illuminate\Http\Request;

class ImageEvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ImageEvidence::with([
            'detail'
        ])->get();

        return view('evidences.image.index', [
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
        $detail = DetailEvidence::all();

        return view('evidences.image.create', [
            'detail' => $detail
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageEvidenceRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/image', 'public'
        );

        ImageEvidence::create($data);

        return redirect()->route('image-evidence.index');
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
        $data = ImageEvidence::with([
            'detail'
        ])->findOrFail($id);

        $detail = DetailEvidence::all();

        return view('evidences.image.edit', [
            'data' => $data,
            'detail' => $detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageEvidenceRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/image', 'public'
        );

        $item = ImageEvidence::findOrFail($id);
        $item->update($data);

        return redirect()->route('image-evidence.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ImageEvidence::findOrFail($id);
        $data->delete();

        return redirect()->route('image-evidence.index');
    }
}
