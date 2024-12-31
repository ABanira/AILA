<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanupOldCatalogActions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:old-catalog-actions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus data catalog_actions yang lebih lama dari 5 tahun';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoffDate = now()->subYears(5); // Hitung tanggal batas 5 tahun ke belakang

        $deleted = DB::table('catalog_actions')
            ->where('created_at', '<', $cutoffDate)
            ->delete();

        $this->info("Berhasil menghapus {$deleted} record dari tabel catalog_actions.");
        return 0;
    }
}
