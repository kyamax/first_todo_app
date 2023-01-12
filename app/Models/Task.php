<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["text", "title", "importance_id"];
    // 配列で値を一括設定する

    public function importance()
    {
        return $this->belongsTo(Importance::class);
    }
}
