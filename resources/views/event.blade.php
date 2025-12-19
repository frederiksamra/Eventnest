@extends('layouts.main')
@section('title','Event')
@section('content')
<div class="card">
        <div class="card-header">
            <a href="/event/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i> Event</a>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Event Name</th>
                        <th>Organizer</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Event Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Ticket Price</th>
                        <th>Capasity</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ev as $idx => $e)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $e->id }}</td>
                        <td>{{ $e->event_name }}</td>
                        <td>{{ $e->organizer }}</td>
                        <td>{{ $e->category }}</td>
                        <td>{{ $e->location }}</td>
                        <td>{{ $e->event_date }}</td>
                        <td>{{ $e->start_time }}</td>
                        <td>{{ $e->end_time }}</td>
                        <td>{{ $e->ticket_price }}</td>
                        <td>{{ $e->capacity }}</td>
                        <td>{{ $e->description }}</td>
                        <td>
                            @if ($e->image)
                                <img src="{{ asset('/storage/image/'.$e->image) }}" alt="image" width="80" height="80">
                            @else
                                <img src="/storage/image/No_Image_Available.jpg" alt="no image" width="80" height="80">
                            @endif
                        </td>
                        <td>{{ $e->status }}</td>
                        <td>
                            <a href="/event/editform/{{ $e->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="/event/delete/{{ $e->id }}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection