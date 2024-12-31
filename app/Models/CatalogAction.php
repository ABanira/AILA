<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id',
        'action_type',
        'action_detail',
        'user_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Relasi ke model Catalog
     */
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relasi ke model Lemari
     */
    public function lemari()
    {
        return $this->belongsTo(Lemari::class);
    }

    /**
     * Fungsi untuk mencatat aksi ke tabel CatalogAction.
     *
     * @param int|null $catalogId ID dari catalog yang terkait (null jika tidak ada katalog terkait)
     * @param string $actionType Jenis aksi (e.g., 'manual', 'borrow', 'return')
     * @param string $action_detail Deskripsi aksi
     * @param int $userId ID pengguna yang melakukan aksi
     */
    public static function logAction(?int $catalogId, string $actionType, string $action_detail, int $userId)
    {
        self::create([
            'catalog_id' => $catalogId,
            'action_type' => $actionType,
            'action_detail' => $action_detail,
            'user_id' => $userId,
        ]);
    }
}
