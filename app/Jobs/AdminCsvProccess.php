<?php

namespace App\Jobs;

use Throwable;
use App\Models\AdminData;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AdminCsvProccess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;

     /**
     * Create a new job instance.
     * @return void
     */

    public function __construct($data, $header)
    {
        $this->data   = $data;
        $this->header = $header;
    }

     /**
     * Execute the job.
     * @return void
     */

    public function handle()
    {
        foreach ($this->data as $sale) {
            $saleData = array_combine($this->header, $sale);
            AdminData::create($saleData);
         }
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}