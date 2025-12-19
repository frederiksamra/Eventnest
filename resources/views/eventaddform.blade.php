@extends('layouts.main')
@section('title','Event')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Event</h2>
    </div>
    <div class="card-body">
        <form action="/event/save" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="event_name">Nama Event</label>
                <input type="text" name="event_name" id="event_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="organizer">Penyelenggara</label>
                <input type="text" name="organizer" id="organizer" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Music">Music</option>
                    <option value="Sport">Sport</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Festival">Festival</option>
                    <option value="Workshop">Workshop</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="event_date">Tanggal Event</label>
                <input type="date" name="event_date" id="event_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_time">Waktu Mulai</label>
                <input type="time" name="start_time" id="start_time" class="form-control">
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai</label>
                <input type="time" name="end_time" id="end_time" class="form-control">
            </div>

            <div class="form-group">
                <label for="ticket_price">Harga Tiket</label>
                <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control" value="0">
            </div>

            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input type="number" name="capacity" id="capacity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Gambar Poster</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
            </div>

            <div class="form-group">
                <label for="status">Status Event</label>
                <select name="status" id="status" class="form-control">
                    <option value="upcoming">Upcoming</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>
@endsection
