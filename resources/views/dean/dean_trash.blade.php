@extends('layouts.dean_layout')

@section('title', 'Deleted Documents' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/trash.css') }}">
@endsection

@section('main-id','dashboard-content')

@section('content') 
<section class="title">
            <div class="title-content">
                <h3>Trash</h3>
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
                        <td class="sender">DATOS</td>
                        <td class="subject">
                            <span class="subject-text">Forwarded Document</span>
                            <span class="snippet"> - Employee Vivian Vivo forwarded a document regarding the Office Memorandum No. 108 Series of 2024.</span>
                        </td>
                        <td class="date">Jul 31</td>
                        <td class="email-actions">
                            <i class="bi bi-arrow-counterclockwise" title="Restore"></i>
                            <i class="bi bi-trash3-fill" title="Delete Forever"></i>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
@endsection


@section('custom-js')
    <script src="js/trash.js"></script>
@endsection