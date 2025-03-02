<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\PendidikanUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserPendidikanController extends Controller {

    public function index() {
        $pendidikan = Auth::user()->pendidikan;
        return response()->json($pendidikan);
    }

    public function store(Request $request) {
        $request->validate([
            'pendidikan_terakhir' => 'required|string',
            'universitas' => 'required|string',
            'tahun_lulus' => 'required|integer',
        ]);

        $pendidikan = PendidikanUser::create([
            'user_id' => Auth::id(),
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'universitas' => $request->universitas,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return response()->json($pendidikan, 201);
    }

    public function update(Request $request, $id) {
        $pendidikan = PendidikanUser::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'pendidikan_terakhir' => 'required|string',
            'universitas' => 'required|string',
            'tahun_lulus' => 'required|integer',
        ]);

        $pendidikan->update([
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'universitas' => $request->universitas,
            'tahun_lulus' => $request->tahun_lulus,
        ]);

        return response()->json($pendidikan);
    }

    public function destroy($id) {
        $pendidikan = PendidikanUser::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $pendidikan->delete();

        return response()->json(['message' => 'Data pendidikan berhasil dihapus']);
    }
}
