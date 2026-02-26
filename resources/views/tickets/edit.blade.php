@extends('layouts.app')

@section('title', 'Edit Tiket #' . $ticket->id)

@section('content')
<div class="mb-4">
    <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali ke Detail
    </a>
    <h1 class="h4 fw-bold text-dark mb-1">Edit Tiket #{{ $ticket->id }}</h1>
    <p class="text-muted mb-0">Perbarui informasi tiket di bawah.</p>
</div>

<div class="card">
    <div class="card-body p-4 p-sm-5">
        <form action="{{ route('tickets.update', $ticket) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="form-label fw-medium">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $ticket->title) }}" required
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
                    placeholder="Jelaskan masalah atau permintaan...">{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-4 mb-4">
                <div class="col-12 col-sm-6">
                    <label for="status" class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" required
                        class="form-select @error('status') is-invalid @enderror">
                        <option value="open" {{ old('status', $ticket->status) === 'open' ? 'selected' : '' }}>Open</option>
                        <option value="in_progress" {{ old('status', $ticket->status) === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="resolved" {{ old('status', $ticket->status) === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        <option value="closed" {{ old('status', $ticket->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-sm-6">
                    <label for="priority" class="form-label fw-medium">Prioritas <span class="text-danger">*</span></label>
                    <select name="priority" id="priority" required
                        class="form-select @error('priority') is-invalid @enderror">
                        <option value="low" {{ old('priority', $ticket->priority) === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', $ticket->priority) === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority', $ticket->priority) === 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>
                    Simpan Perubahan
                </button>
                <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-outline-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
