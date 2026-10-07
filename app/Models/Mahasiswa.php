<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'email',
        'prodi_id',
    ];
    protected $casts = [
    'tanggal_lahir' => 'date',
    ];
    /**
     * Relasi ke model Prodi.
     */
    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}