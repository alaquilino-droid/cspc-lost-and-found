<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','type','name','description','date_reported','location','status','photo_path','reporter_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'date_reported' => 'date',
    ];
}
?>