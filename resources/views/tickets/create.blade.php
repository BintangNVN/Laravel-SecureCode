@extends('layouts.app')

@section('title', 'Buat Tiket Baru')

@section('content')
<div class="mb-4">
    <a href="{{ route('tickets.index') }}" class="d-inline-flex align-items-center gap-2 text-secondary text-decoration-none fw-medium mb-3">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h1 class="h4 fw-bold text-dark mb-1">Buat Tiket Baru</h1>
    <p class="text-muted mb-0">Isi form di bawah untuk membuat tiket baru.</p>
</div>

<div class="card">
    <div class="card-body p-4 p-sm-5">
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="form-label fw-medium">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="form-control @error('title') is-invalid @enderror"
                    placeholder="Contoh: Error saat login">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label fw-medium">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Jelaskan masalah atau permintaan...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-4 mb-4">
                <div class="col-12 col-sm-6">
                    <label for="status" class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" required
                        class="form-select @error('status') is-invalid @enderror">
                        <option value="open"        {{ old('status', 'open') === 'open'        ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ old('status') === 'in_progress'         ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved"    {{ old('status') === 'resolved'            ? 'selected' : '' }}>Resolved</option>
                        <option value="closed"      {{ old('status') === 'closed'              ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="priority" class="form-label fw-medium">Prioritas <span class="text-danger">*</span></label>
                    <select name="priority" id="priority" required
                        class="form-select @error('priority') is-invalid @enderror">
                        <option value="low"    {{ old('priority') === 'low'                    ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', 'medium') === 'medium'       ? 'selected' : '' }}>Medium</option>
                        <option value="high"   {{ old('priority') === 'high'                   ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 pt-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i> Simpan Tiket
                </button>
                <a href="#" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection