<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["text", "title", "importance_id", "user_id", "check"];
    // 配列で値を一括設定する

    public function importance()
    {
        return $this->belongsTo(Importance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
