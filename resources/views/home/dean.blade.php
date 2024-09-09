@extends('layouts.dean_layout')

@section('title', 'Dean Home' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/dean/dean_home.css') }}">
@endsection

@section('main-id','home-section')

@section('content')
<section class="welcome-section">
            <div class="welcome-message">
                <h2>Welcome Back Kent Dela Pena</h2>
                <p>Streamlining document management and access for all Bicol University personnel.</p>
            </div>
        </section>

        <section class="shortcuts">
            <div class="container square" id="documents-shortcut">
                <img src="{{ asset ('images/document-logo.png') }}" alt="Documents Logo">
                <p>See Documents Here</p>
            </div>
            <div class="container square" id="upload-shortcut">
                <img src="{{ asset ('images/upload-logo.png') }}" alt="Upload Logo">
                <p>Upload Documents Here</p>
            </div>
            <div class="container rectangle" id="notifications">
                <h4>Notifications</h4>
                <div class="notification-content">
                    <div class="notification-list">
                        <div class="notification-item">
                            <img src="{{ asset ('images/boy-2.png') }}" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">New Memorandum Available</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src="images/girl-1.png" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">Audited Disbursement Voucher</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                        <div class="notification-item">
                            <img src="images/boy-2.png" alt="Profile Icon" class="profile-icon-notif">
                            <div class="notification-content-item">
                                <span class="sender-name">DATOS</span>
                                <span class="document-title">Claim Monitoring Sheet</span>
                            </div>
                            <i class="bi bi-envelope-fill mail-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="title">
            <div class="title-content">
                <h3>Announcements</h3>
                <div class="date-time">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <p id="current-date-time"></p>
                </div>
            </div>
        </section>

        <section class="dashboard-overview">
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="dean_view.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="dean_edit.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="documents">
                <div class="documents-content">
                    <div class="document-card">
                        <iframe src="digitized_documents/CERTIFICATION.pdf#toolbar=0" width="100%" height="200px"></iframe>
                    </div>                        
                    <div class="content">
                        <div class="row">
                            <div class="column left">
                                <h3>Office Memorandum No. 84</h3>
                                <p>In observance of the Holy Week...</p>
                            </div>
                            <div class="column right">
                                <a href="#" class="dropdown-toggle"><i class="bi bi-three-dots-vertical" style="cursor: pointer;"></i></a>
                                <div class="dropdown-more">
                                    <a href="view-document.html">View</a>
                                    <a href="#">Download</a>
                                    <a href="edit-document.html">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="upload-date">
                            <p>Date Uploaded: April 2, 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repeat the document block for more entries -->
        </section>
@endsection

@section('custom-js')
    <script src="{{ asset('js/dean/dean_home.js') }}"></script>
@endsection

</body>
</html>