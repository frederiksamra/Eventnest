<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }
    public function users()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view("users", ["key" => "users", "usr" => $users]);
    }
    public function event()
    {
        $event = Event::orderby('id', 'desc')->get();
        return view("event", ["key" => "event", "ev" => $event]);
    }
    public function eventaddform()
    {
        return view("eventaddform", ["key" => "event"]);
    }
    public function eventsave(Request $request) //Sebelah kiri untuk kolom database dan kanan untuk name form
    {
        if ($request->hasFile('image'))
        {
            $file_name = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $file_name,  'public');
        }
        else
        {    
            $file_name = null;
            $path = null;
        }

        Event::create([
            'event_name'   => $request->event_name,
            'organizer'    => $request->organizer,
            'category'     => $request->category,
            'location'     => $request->location,
            'event_date'   => $request->event_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'ticket_price' => $request->ticket_price,
            'capacity'     => $request->capacity,
            'description'  => $request->description,
            'image'        => $file_name,
            'status'       => $request->status,
        ]);
        return redirect('/event')->with('alert', 'Data Berhasil Disimpan');
    }
    public function eventeditform($id)
    {
        $event = Event::find($id);
        return view('eventeditform',["key" => "event", "ev" => $event]);
    }

    public function eventupdate($id, Request $request)
    {
        $event = Event::find($id);
        $event->event_name = $request-> event_name;
        $event->organizer = $request-> organizer;
        $event->category = $request-> category;
        $event->location = $request-> location;
        $event->event_date = $request-> event_date;
        $event->start_time = $request-> start_time;
        $event->end_time = $request-> end_time;
        $event->ticket_price = $request-> ticket_price;
        $event->capacity = $request-> capacity;
        $event->description = $request-> description;
        $event->status = $request-> status;
        
        if ($request->image)
        {
            if ($event->image)
            {
                Storage::disk('public')->delete('image/'.$event->image);
            }
            $file_name = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $file_name,  'public');
            $event->image = $file_name;
        }
        $event->save();
        return redirect('/event')->with('alert', 'Data Berhasil Diupdate');
    }

    public function eventdelete($id)
    {
        $event = Event::find($id);

        if($event->image)
        {
            Storage::disk('public')->delete('image/'.$event->image);
        }
        $event->delete();
        return redirect('/event')->with('alert', 'Data Berhasil Dihapus');
    }

    public function usersaddform()
    {
        return view("useraddform", ["key" => "users"]);
    }

    public function userssave(Request $request) //Sebelah kiri untuk kolom database dan kanan untuk name form
    {
        if ($request->hasFile('image'))
        {
            $file_name = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image', $file_name,  'public');
        }
        else
        {    
            $file_name = null;
            $path = null;
        }

        User::create([
            'name'=> $request-> name,
            'email'=> $request -> email,
            'password'=> bcrypt($request -> password),
            'image'=> $file_name,
        ]);
        return redirect('/users')->with('alert', 'Data Berhasil Disimpan');
    }

    public function usersdelete($id)
    {
        $users = User::find($id);

        if($users->image)
        {
            Storage::disk('public')->delete('image/'.$users->image);
        }
        $users->delete();
        return redirect('/users')->with('alert','Data Berhasil Dihapus');
    }

    public function changepass()
    {
        return view('changepassform', ["key" => "users"]);
    }

    public function passwordupdate(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_konfirmasi' => 'required|same:password_baru'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('alert', 'Password lama salah!');
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return redirect('/home')->with('alert', 'Password berhasil diubah!');
    }

    public function chart()
    {
        $totalUser = User::count();
        $totalEvent = Event::count();
        $chartLabels = ['Total User', 'Total Event'];
        $chartData   = [$totalUser, $totalEvent];
        $key = 'unggulan';
    
        return view('chart', compact('totalUser', 'totalEvent', 'chartLabels', 'chartData', 'key'));
    }
}
