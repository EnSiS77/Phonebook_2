<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use HasFactory;

    const UNKNOWN_USER = 1;

    /**
     * Автор контакта
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     public function user()
     {
        //Контакты принадлежат пользователю
        return $this->belongsTo(User::class);
        
      }
      
      protected $fillable = ['name', 'email', 'phone', ];
}
