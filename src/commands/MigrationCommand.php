<?php

namespace Unikat\LaravelRating;

use Illuminate\Console\Command;

class MigrationCommand extends Command
{
    
    /**
     * @var string
     */
    protected $name = 'rating:migration';
    
    /**
     * @var string
     */
    protected $description = 'Creates a migration';
    
    /**
     *
     */
    public function fire()
    {
        $this->handle();
    }
    
    /**
     * Execute the console command
     */
    public function handle()
    {
        $this->line('');
        $this->info('Create a rating migration');
        $this->comment('A "ratings" migration will be created in the migrations directory');
        $this->line('');
        if($this->confirm('Proceed with the creation?')) {
            $this->line('');
            $this->info('Creating migration...');
            if($this->createMigration()) {
                $this->info('Migration successfully created!');
            }
            else {
                $this->error('Couldn\'t create migration. Check the write permissions');
            }
            $this->line('');
        }
    }
    
    /**
     * @return bool
     */
    private function createMigration()
    {
        $migration_file = base_path('/database/migrations').'/'.date('Y_m_d_His').'_create_ratings_table.php';
        if(!file_exists($migration_file) && $fs = fopen($migration_file, 'x')) {
            fwrite($fs, file_get_contents(__DIR__ . '/../migrations/create_ratings_table.php'));
            fclose($fs);
            return true;
        }
        return false;
    }
}