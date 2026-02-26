@extends('layouts.app')

@section('title', 'Daftar Tiket')

@section('content')
<div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between gap-3 mb-4">
    <h1 class="h4 fw-bold text-dark mb-0">Daftar Tiket</h1>
</div>

@if ($tickets->isEmpty())
    <div class="card text-center py-5">
        <div class="card-body py-5">
            <i class="bi bi-clipboard-x text-secondary" style="font-size: 3.5rem;"></i>
            <p class="text-muted mt-3 mb-4">Belum ada tiket. Buat tiket pertama Anda.</p>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Buat Tiket
            </a>
        </div>
    </div>
@else
    <div class="card">
        <ul class="list-group list-group-flush">
            @foreach ($tickets as $ticket)
                <li class="list-group-item list-group-item-action p-0">
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="d-block d-sm-flex align-items-sm-center justify-content-sm-between gap-3 px-4 py-3 text-decoration-none">
                        <div class="flex-grow-1 text-truncate">
                            <p class="fw-semibold text-dark mb-0 text-truncate">{{ $ticket->title }}</p>
                            <small class="text-muted">#{{ $ticket->id }} · {{ $ticket->created_at->format('d M Y') }}</small>
                        </div>
                        <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0 flex-shrink-0">
                            @php
                                $statusClass = match($ticket->status) {
                                    'open'        => 'bg-primary-subtle text-primary',
                                    'in_progress' => 'bg-warning-subtle text-warning-emphasis',
                                    'resolved'    => 'bg-success-subtle text-success',
                                    'closed'      => 'bg-secondary-subtle text-secondary',
                                    default       => 'bg-secondary-subtle text-secondary',
                                };
                                $priorityClass = match($ticket->priority) {
                                    'high'   => 'text-danger fw-semibold',
                                    'medium' => 'text-warning fw-semibold',
                                    'low'    => 'text-secondary',
                                    default  => 'text-secondary',
                                };
                            @endphp
                            <span class="badge rounded-pill {{ $statusClass }}">{{ $ticket->status_label }}</span>
                            <small class="{{ $priorityClass }}">{{ $ticket->priority_label }}</small>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="card-footer bg-light border-top py-2">
            {{ $tickets->links() }}
        </div>
    </div>
@endif
@endsection