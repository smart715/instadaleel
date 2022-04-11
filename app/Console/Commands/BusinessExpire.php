<?php

namespace App\Console\Commands;

use App\Models\AppDataModule\BusinessPackage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BusinessExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'business:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All business will be expired after passed the expiry date.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $business_packages = BusinessPackage::where("status","Running")->where("expiry_date","<",Carbon::now()->toDateString())->get();

        foreach( $business_packages as $business_package ){
            $business_package->status = "Expired";
            if( $business_package->save() ){
                DB::statement("UPDATE businesses SET status = 'Expired', is_pinned = 0 WHERE id = $business_package->business_id");
            }
        }
    }
}
