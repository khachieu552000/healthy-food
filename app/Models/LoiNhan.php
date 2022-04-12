<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoiNhan extends Model
{
    use HasFactory;
    protected $table = 'loi_nhan';
    protected $fillable = [
        'ho_ten',
        'email',
        'dien_thoai',
        'noi_dung',
        'status',
    ];
}
