<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SyncImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:sync';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Sync uploaded images from storage/app/public to public folder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sourceDir = storage_path('app/public/gambarbarang');
        $destinationDir = public_path('gambarbarang');

        // Create destination directory if it doesn't exist
        if (!File::isDirectory($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
            $this->info("Created directory: {$destinationDir}");
        }

        // Copy files from source to destination
        if (File::isDirectory($sourceDir)) {
            $files = File::files($sourceDir);
            
            foreach ($files as $file) {
                $filename = $file->getBasename();
                $source = $sourceDir . DIRECTORY_SEPARATOR . $filename;
                $destination = $destinationDir . DIRECTORY_SEPARATOR . $filename;
                
                File::copy($source, $destination);
            }

            $this->info("✓ Image sync completed successfully!");
            $this->info("Files synced: " . count($files));
            $this->info("Destination: {$destinationDir}");
        } else {
            $this->warn("Source directory not found: {$sourceDir}");
        }
    }
}
