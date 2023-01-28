<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ["text", "title", "importance_id", "user_id", "check"];
    public $sortable = ["importance_id"];

    public function importance()
    {
        return $this->belongsTo(Importance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
