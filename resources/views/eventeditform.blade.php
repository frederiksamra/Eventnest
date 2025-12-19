@extends('layouts.main')
@section('title','Event')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Event</h2>
    </div>
    <div class="card-body">
        <form action="/event/update/{{ $ev->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="event_name">Nama Event</label>
                <input type="text" name="event_name" id="event_name" class="form-control" value="{{ $ev->event_name }}" required>
            </div>

            <div class="form-group">
                <label for="organizer">Penyelenggara</label>
                <input type="text" name="organizer" id="organizer" class="form-control" value="{{ $ev->organizer }}" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="Music" {{ $ev->category == "Music" ? "selected" : "" }}>Music</option>
                    <option value="Sport" {{ $ev->category == "Sport" ? "selected" : "" }}>Sport</option>
                    <option value="Seminar" {{ $ev->category == "Seminar" ? "selected" : "" }}>Seminar</option>
                    <option value="Festival" {{ $ev->category == "Festival" ? "selected" : "" }}>Festival</option>
                    <option value="Workshop" {{ $ev->category == "Workshop" ? "selected" : "" }}>Workshop</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ $ev->location }}" required>
            </div>

            <div class="form-group">
                <label for="event_date">Tanggal Event</label>
                <input type="date" name="event_date" id="event_date" class="form-control" value="{{ $ev->event_date }}" required>
            </div>

            <div class="form-group">
                <label for="start_time">Waktu Mulai</label>
                <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $ev->start_time }}">
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai</label>
                <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $ev->end_time }}">
            </div>

            <div class="form-group">
                <label for="ticket_price">Harga Tiket</label>
                <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control" value="{{ $ev->ticket_price }}">
            </div>

            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $ev->capacity }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control">{{ $ev->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar Poster</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group mt-2">
                @if ($ev->image)
                    <img src="{{ asset('/storage/image/'.$ev->image) }}" alt="image" width="80" height="80">
                @else
                    <img src="/images/no_image.png" alt="no image" width="80" height="80">
                @endif
                <br><small><i>*Gambar sebelumnya</i></small>
            </div>

            <div class="form-group">
                <label for="status">Status Event</label>
                <select name="status" id="status" class="form-control">
                    <option value="upcoming" {{ $ev->status == "upcoming" ? "selected" : "" }}>Upcoming</option>
                    <option value="ongoing" {{ $ev->status == "ongoing" ? "selected" : "" }}>Ongoing</option>
                    <option value="completed" {{ $ev->status == "completed" ? "selected" : "" }}>Completed</option>
                    <option value="cancelled" {{ $ev->status == "cancelled" ? "selected" : "" }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>

        </form>
    </div>
</div>
@endsection
