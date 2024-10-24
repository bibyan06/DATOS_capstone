@extends('layouts.office_staff_layout')

@section('title', 'Notification')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/os/staff_notification.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content')
<section class="title">
    <div class="title-content">
        <h3>Notification</h3>
        <div class="date-time">
            <i class="bi bi-calendar2-week-fill"></i>
            <p id="current-date-time"></p>
        </div>
    </div>
</section>

<div id="dashboard-section">
    <div class="dashboard-container">
        @if($forwardedDocuments->isEmpty() && $sentDocuments->isEmpty())
            <p class="no-notifications">You have no notifications at this time.</p>
        @else
            <table class="email-list">
                {{-- Display Forwarded Documents --}}
                @foreach($forwardedDocuments as $forwarded)
                    <tr class="email-item {{ $forwarded->status !== 'seen' ? 'delivered' : '' }}" 
                        data-id="{{ $forwarded->id }}" 
                        data-sender="{{ $forwarded->forwardedByEmployee->first_name ?? 'Unknown' }} {{ $forwarded->forwardedByEmployee->last_name ?? '' }}" 
                        data-document="{{ $forwarded->document->document_name ?? 'No Title' }}" 
                        data-snippet="{{ $forwarded->message ?? 'No message' }}"
                        data-file-url="{{ asset('storage/' . $forwarded->document->file_path) }}">
                        <td class="checkbox"><input type="checkbox"></td>
                        <td class="star">★</td>
                        <td class="sender">{{ $forwarded->forwardedByEmployee->first_name ?? 'Unknown' }} {{ $forwarded->forwardedByEmployee->last_name ?? '' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $forwarded->document->document_name ?? 'No Title' }}</span>
                            <span class="snippet"> - {{ $forwarded->message ?? 'No message' }}</span>
                        </td>
                        <td class="date">{{ \Carbon\Carbon::parse($forwarded->forwarded_date)->format('M d') }}</td>
                        <td class="email-actions">
                            <i class="bi bi-archive"></i>
                            <i class="bi bi-trash"></i>
                        </td>
                    </tr>
                @endforeach

                {{-- Display Sent Documents --}}
                @foreach($sentDocuments as $sentDocument)
                    <tr class="email-item {{ $sentDocument->status !== 'seen' ? 'delivered' : '' }}" 
                        data-id="{{ $sentDocument->id }}" 
                        data-sender="{{ $sentDocument->sender->first_name ?? 'Unknown Sender' }} {{ $sentDocument->sender->last_name ?? '' }}" 
                        data-document="{{ $sentDocument->document->document_name ?? 'No Title' }}"
                        data-file-url="{{ asset('storage/' . $sentDocument->document->file_path) }}">
                        <td class="checkbox"><input type="checkbox"></td>
                        <td class="star">★</td>
                        <td class="sender">{{ $sentDocument->sender->first_name ?? 'Unknown Sender' }} {{ $sentDocument->sender->last_name ?? '' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $sentDocument->document->document_name ?? 'No Title' }}</span>
                        </td>
                        <td class="date">{{ \Carbon\Carbon::parse($sentDocument->issued_date)->format('M d') }}</td>
                        <td class="email-actions">
                            <i class="bi bi-archive"></i>
                            <i class="bi bi-trash"></i>
                        </td>
                    </tr>
                @endforeach

            </table>
        @endif
    </div>
</div>

@endsection

@section('custom-js')
    <script src="{{ asset('js/os/staff_notification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
