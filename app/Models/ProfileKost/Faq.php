<?php

namespace App\Models\ProfileKost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'profile_kost_faq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
    ];
}
