<?php

namespace App\Http\Controllers\API;

use App\Artikel;
use App\Bookmark;
use App\EDokumen;
use App\Http\Controllers\Controller;
use App\Konten;
use App\User;
use App\VideoAudio;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    //
    /** Private function */
    private function get_isi($tipe, $id)
    {
        if ($tipe == "Artikel") {
            $temp = Artikel::where('id', '=', $id)->first();
            $var = array([
                'isi' => $temp->isi,
                'foto' => $temp->foto,
            ]);
//        }
        } elseif ($tipe == "Video") {
            $temp = VideoAudio::where('id', '=', $id)->first();
            $var = array([
                'isi' => $temp->isi,
                'video_audio' => $temp->video_audio
            ]);
        } elseif ($tipe == "EDokumen") {
            $temp = EDokumen::where('id', '=', $id)->first();
            $var = array([
                'penulis' => $temp->penulis,
                'tahun' => $temp->tahun,
                'penerbit' => $temp->penerbit,
                'halaman' => $temp->halaman,
                'bahasa' => $temp->bahasa,
                'deskripsi' => $temp->deskripsi,
                'file' => $temp->file,
            ]);
        }
        return $var;
    }

    private function get_penulis($id)
    {
        $var = User::where('id', $id)->first();
        $user = array([
            'nama' => $var->nama,
            'peran' => $var->peran,
        ]);
        return $user;
    }

    private function get_data($list)
    {
        $var = array();
        foreach ($list as $l) {
            $konten = Konten::where('id', $l->konten_id)->first();
            $isi = $this->get_isi($konten->tipe, $konten->id_tipe);
            $penulis = $this->get_penulis($konten->user_id);
            $temp = array(
                'id' => $l->id,
                'konten_id' => $konten->id,
                'tipe' => $konten->tipe,
                'judul' => $konten->judul,
                'tanggal' => $konten->tanggal,
                'konten' => $isi,
                'penulis' => $penulis
            );
            array_push($var, $temp);
        }
        return $var;
    }

    public function get_all()
    {
        try {
            $user = Auth::guard('api')->user();

            $list = $user->riwayat;
            $bookmark = $this->get_data($list);

            return response()->json([
                'success' => true,
                'message' => 'Riwayat Anda',
                'bookmark' => $bookmark,
                'Status' => 200
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'Status' => 500
            ], 500);
        }
    }
}
