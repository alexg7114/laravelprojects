<?php

namespace App\Jobs;

use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected string $url;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $url)
    {

        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @param ParserService $service
     * @return void
     */
    public function handle(ParserService $service)
    {

        $service->getNews($this->url);

    }
}
