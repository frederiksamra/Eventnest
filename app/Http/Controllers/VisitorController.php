<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class VisitorController extends Controller
{
    public function searchevent(Request $request)
    {
        // Mengambil keyword dari input 'q'
        $keyword = $request->input('q');

        // Logika Pencarian:
        // Jika ada keyword, cari berdasarkan Nama, Kategori, atau Lokasi
        // Jika tidak ada, tampilkan semua event (atau kosong, sesuai selera)
        
        if($keyword){
            $event = Event::where('event_name', 'like', '%' . $keyword . '%')
                        ->orWhere('category', 'like', '%' . $keyword . '%')
                        ->orWhere('location', 'like', '%' . $keyword . '%')
                        ->orWhere('organizer', 'like', '%' . $keyword . '%')
                        ->latest()
                        ->get();
        } else {
            // Tampilkan event terbaru jika user belum mencari apa-apa
            $event = Event::latest()->get(); 
        }

        // Return view dengan data
        return view('searchevent', ["ev" => $event]);
    }
}
