<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RegisterEvidence;
use Illuminate\Http\Request;

class RegisterEvidenceController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if($id)
        {
            $evidence = RegisterEvidence::with('details')->find($id);

            if($evidence)
            {
                return ResponseFormatter::success($evidence, 'Data berhasil diambil');
            }
            else
            {
                return ResponseFormatter::error(null, 'Data tidak ditemukan', 404);
            }
        }

        $evidence = RegisterEvidence::with('details')->get();

        return ResponseFormatter::success($evidence, 'Data berhasil diambil');
    }
}
