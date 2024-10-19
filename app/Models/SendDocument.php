<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendDocument extends Model
{
    protected $table = 'send_document';
    protected $fillable = ['send_id', 'recipient_id', 'document_id', 'issued_by', 'status','issued_date'];

   // Define the relationship to the Employee model (for employee_id)
   public function employee()
   {
       // 'employee_id' refers to the employee_id in the Employee table
       return $this->belongsTo(Employee::class, 'employee_id', 'id');
   }

   // Define the relationship to the Document model (for document_id)
   public function document()
   {
       // 'document_id' refers to the document_id in the Documents table
       return $this->belongsTo(Document::class, 'document_id', 'document_id');
   }



}
