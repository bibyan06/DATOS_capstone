@extends('layouts.admin_layout')

@section('title', 'Notification')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
@endsection

@section('main-id', 'dashboard-content')

@section('content') 

<main id="dashboard-content">
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
            <table class="email-list">
                @foreach($forwardedDocuments as $forwarded)
                    <tr class="email-item">
                        <td class="checkbox"><input type="checkbox"></td>
                        <td class="star">★</td>
                        <td class="sender">{{ $forwarded->forwardedToEmployee->first_name ?? 'Unknown' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $forwarded->document->document_name ?? 'No Title' }}</span>
                            <span class="snippet"> - {{ $forwarded->document->description ?? 'No description available' }}</span>
                        </td>
                        <td class="date">{{ \Carbon\Carbon::parse($forwarded->forwarded_date)->format('M d') }}</td>
                        <td class="email-actions">
                            <i class="bi bi-archive"></i>
                            <i class="bi bi-trash"></i>
                            <i class="bi bi-envelope"></i>
                            <i class="bi bi-clock"></i>
                        </td>
                    </tr>
                @endforeach

                @foreach($sentDocuments as $sentDocument)
                    <tr class="email-item">
                        <td class="checkbox"><input type="checkbox"></td>
                        <td class="star">★</td>
                        <td class="sender">{{ $sentDocument->sender->name ?? 'Unknown Sender' }}</td>
                        <td class="subject">
                            <span class="subject-text">{{ $sentDocument->document_title ?? 'No Title' }}</span>
                            <span class="snippet"> - {{ $sentDocument->description ?? 'No description available' }}</span>
                        </td>
                        <td class="date">{{ \Carbon\Carbon::parse($sentDocument->created_at)->format('M d') }}</td>
                        <td class="email-actions">
                            <i class="bi bi-archive"></i>
                            <i class="bi bi-trash"></i>
                            <i class="bi bi-envelope"></i>
                            <i class="bi bi-clock"></i>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</main>

@endsection

@section('custom-js')
    <script src="{{ asset('js/notification.js') }}"></script>
@endsection
