<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailEvidence;
use Illuminate\Http\Request;

class DetailEvidenceController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if($id)
        {
            $detail_evidence = DetailEvidence::with('register', 'criteria', 'images')
                                                ->where('register_id', $id)
                                                ->get();

            if($detail_evidence)
            {
                return ResponseFormatter::success($detail_evidence, 'Data berhasil diambil');
            }
            else
            {
                return ResponseFormatter::error(null, 'Data tidak ditemukan', 404);
            }
        }
    }
}
