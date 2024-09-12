@extends('layouts.admin_layout')

@section('title', 'Request Document' )

@section('custom-css')
    <link rel="stylesheet" href="{{ asset ('css/request.css') }}">
@endsection

@section('main-id','dashboard-content')

@section('content') 
        <section class="title">
            <div class="title-content">
                <h3>Requested Documents</h3>
                <div class="date-time">
                    <i class="bi bi-calendar2-week-fill"></i>
                    <p id="current-date-time"></p>
                </div>
            </div>
        </section>

        <div id="dashboard-section">
            <div class="dashboard-container">
                <table>
                    <thead>
                        <tr>
                            <th>Document Subject</th>
                            <th>Purpose</th>
                            <th>Requested Date</th>
                            <th>Requested By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Official Memorandum No. 84</td>
                            <td>In commemoration of the founding anniversary of the company on Wednesday, April 1, 2024.</td>
                            <td>May 19, 2024</td>
                            <td>Marie Lee</td>
                            <td class="approved">Approved</td>
                            <td class="action-buttons">
                                <i class="bi bi-pencil-square" title="Send Document" onclick="showPopupForm()"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Official Memorandum No. 90</td>
                            <td>Lorem Ipsum</td>
                            <td>May 22, 2024</td>
                            <td>Jose Manalo</td>
                            <td class="pending">Pending</td>
                            <td class="action-buttons">
                                <i class="bi bi-pencil-square" title="Send Document" onclick="showPopupForm()"></i>
                            </td>
                        </tr>
                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>
            </div>
            <div id="overlay" class="overlay" onclick="hidePopupForm()"></div>
            <div id="popup-form" class="popup-form">
                <h2>Send Document</h2>
                <form id="dean-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sender-name">Sender Name</label>
                            <input type="text" id="sender-name" name="sender-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="document-subject">Document Subject</label>
                            <input type="text" id="document-subject" name="document-subject">
                        </div>
                        <div class="form-group">
                            <label for="document-purpose">Document Purpose</label>
                            <input type="text" id="document-purpose" name="document-purpose">
                        </div>
                        <div class="form-group">
                            <label for="document-id">Document ID</label>
                            <input type="text" id="document-id" name="document-id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="file-name">File</label>
                            <input type="text" id="file-name" name="file-name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Sent Date</label>
                            <input type="text" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-buttons">
                        <button type="button" id="cancel-btn" onclick="hidePopupForm()">Cancel</button>
                        <button type="button" id="send-document-btn" onclick="sendDocument()">Send Document</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('custom-js')
    <script src="{{ asset('js/request.js') }}"></script>
@endsection

</body>
</html>