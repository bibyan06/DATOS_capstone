<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ForwardedDocument;
use App\Models\SendDocument;

class NotificationController extends Controller
{
    public function showNotifications()
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::id();
        // dd($userId);

        $forwardedDocuments = ForwardedDocument::where('forwarded_to', $userId)->with(['forwardedToEmployee', 'document'])->get();
        $sentDocuments = SendDocument::where('recipient_id', $userId)->with('document')->get();
    
        // Debug output to check data
        // dd($forwardedDocuments, $sentDocuments);

        // Return the view and pass the data
        return view('admin.admin_notification', [
            'forwardedDocuments' => $forwardedDocuments,
            'sentDocuments' => $sentDocuments,
        ]);
    }
}
