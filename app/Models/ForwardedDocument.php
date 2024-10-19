<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForwardedDocument extends Model
{
    protected $table = 'forwarded_documents';
    protected $fillable = ['forwarded_document_id', 'document_id', 'forwarded_by', 'forwarded_date', 'status', 'message'];


    public function forwardedToEmployee()
    {
        return $this->belongsTo(Employee::class, 'forwarded_to', 'id'); // Adjust 'employee_id' as per your Employee table's primary key
    }

    // Define the relationship to the Document model (for document_id)
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id', 'document_id'); // Adjust 'document_id' as per your Document table's primary key
    }

}

