@extends('layouts.office_staff_layout')

@section('title', 'Sent and Forwarded Documents')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/sent_document.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content')
    <section class="title">
        <div class="title-content">
            <h3>Sent Documents</h3>
            <div class="date-time">
                <i class="bi bi-calendar2-week-fill"></i>
                <p id="current-date-time"></p>
            </div>
        </div>
    </section>

    <div id="dashboard-section">
        <div class="dashboard-container">
            @if($forwardedDocuments->isEmpty() && $sentDocuments->isEmpty())
                <p class="no-notifications">You have no sent or forwarded documents at this time.</p>
            @else
                <table class="email-list">
                    <!-- Loop through Forwarded Documents -->
                    @foreach($forwardedDocuments as $forwarded)
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                To: 
                                <span class="receiver">
                                    {{ $forwarded->forwardedToEmployee->first_name ?? 'Unknown' }} 
                                    {{ $forwarded->forwardedToEmployee->last_name ?? 'User' }}
                                </span>
                            </td>
                            <td class="document-name">{{ $forwarded->document->document_name ?? 'Unknown Document' }}</td>
                            <td class="date">{{ \Carbon\Carbon::parse($forwarded->forwarded_date)->format('M d') }}</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Loop through Sent Documents -->
                    @foreach($sentDocuments as $sent)
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Sent Document</span>
                                <span class="snippet">
                                    Employee: 
                                    {{ $sent->employee->first_name ?? 'Unknown' }} 
                                    {{ $sent->employee->last_name ?? 'User' }} 
                                    sent a document titled {{ $sent->document->document_name ?? 'Unknown Document' }}.
                                </span>
                            </td>
                            <td class="date">{{ \Carbon\Carbon::parse($sent->issued_date)->format('M d') }}</td>
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
