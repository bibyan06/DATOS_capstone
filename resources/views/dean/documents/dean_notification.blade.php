@extends('layouts.dean_layout')

@section('title', 'Notification' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/dean/notification.css') }}">
@endsection

@section('main-id','dashboard-content')

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
            <table class="email-list">
                <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Vivian Vivo forwarded a document regarding the Office Memorandum No. 108 Series of 2024.</span>
                            </td>
                            <td class="date">Jul 31</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Allana Nual forwarded a document regarding the Annual Financial Report 2024.</span>
                            </td>
                            <td class="date">Jul 18</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Kent Dela Pena forwarded a document regarding the Quarterly Budget Report Q2 2024.</span>
                            </td>
                            <td class="date">Jul 10</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                        <tr class="email-item">
                            <td class="checkbox"><input type="checkbox"></td>
                            <td class="star">★</td>
                            <td class="sender">DATOS</td>
                            <td class="subject">
                                <span class="subject-text">Forwarded Document</span>
                                <span class="snippet"> - Employee Kim Bolata forwarded a document regarding the New Research Project Proposal.</span>
                            </td>
                            <td class="date">Jul 03</td>
                            <td class="email-actions">
                                <i class="bi bi-archive"></i>
                                <i class="bi bi-trash"></i>
                                <i class="bi bi-envelope"></i>
                                <i class="bi bi-clock"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
    @endsection

    
@section('custom-js')
    <script src="{{ asset('js/dean/notification.js') }}"></script>
@endsection
    
</body>
</html>