@php
    $statusClass = match ($status) {
        'Submitted', 'Under review' => 'status-badge status-badge--blue',
        'Correction requested' => 'status-badge status-badge--amber',
        'Appointment scheduled', 'Appointment approved', 'ID processing', 'Active' => 'status-badge status-badge--green',
        'Ready for claiming' => 'status-badge status-badge--gold',
        'Inactive' => 'status-badge status-badge--muted',
        default => 'status-badge status-badge--muted',
    };
@endphp

<span class="{{ $statusClass }}">{{ $status }}</span>
