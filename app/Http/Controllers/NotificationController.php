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
       
        // Get current user ID
        $userId = Auth::id();

        // Retrieve forwarded documents for the current user
        $forwardedDocuments = ForwardedDocument::where('forwarded_to', $userId)
            ->with(['forwardedToEmployee', 'document']) // eager load relationships
            ->get();

        // Retrieve sent documents for the current user
        $sentDocuments = SendDocument::where('recipient_id', $userId)->with('sender')->get();

        // Pass the data to the view
        return view('notifications', [
            'forwardedDocuments' => $forwardedDocuments,
            'sentDocuments' => $sentDocuments,
        ]);
    }
}
