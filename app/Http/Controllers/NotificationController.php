<?php

namespace App\Http\Controllers;

use App\Models\ForwardedDocument;
use App\Models\SendDocument;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException; // For throwing custom errors

class NotificationController extends Controller
{
    public function showNotifications(string $viewName = null)
    {
        // Get the current user's ID and role_id
        $currentUserId = Auth::id();

           // Check if the user is authenticated
        if (!$currentUserId) {
            // Handle unauthenticated user, e.g., redirect or throw an exception
            throw new HttpException(403, 'Unauthorized: Please log in.');
        }
        
        $roleId = Auth::user()->role_id; // Use role_id from the users table

        // If no specific view is provided, determine it based on the user's role_id
        if (is_null($viewName)) {
            $viewName = $this->getViewByRoleId($roleId);
        }

        // Fetch forwarded documents for the current user
        $forwardedDocuments = ForwardedDocument::with(['forwardedBy', 'document'])
            ->where('forwarded_to', $currentUserId)
            ->get();

        // Fetch sent documents for the current user
        $sentDocuments = SendDocument::with(['sender', 'document'])
            ->where('issued_to', $currentUserId)
            ->get();

        // Return the appropriate view with the documents
        return view($viewName, compact('forwardedDocuments', 'sentDocuments'));
    }

    /**
     * Determine the view based on the user's role_id.
     * Throws an error if the role_id doesn't match any defined role.
     */
    protected function getViewByRoleId($roleId)
    {
        switch ($roleId) {
            case 1:
                return 'admin.admin_notification'; 
            case 2:
                return 'office_staff.os_notification'; 
            case 3:
                return 'dean.documents.dean_notification'; 
            default:
                // Throw a 403 Forbidden error if role_id is invalid
                throw new HttpException(403, 'Unauthorized: Invalid user role.');
        }
    }
}
