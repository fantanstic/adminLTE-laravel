<?php

namespace App\Console\Commands;

//use App\Http\Controllers\v1\TotalController as TotalV1;
//use App\Http\Controllers\v2\TotalController as TotalV2;
//use App\Http\Controllers\v4\TotalController as TotalV4;
//use App\Http\Controllers\v6\TotalController as TotalV6;
//use App\Http\Controllers\v5\TotalController as TotalV5;
//use App\Http\Controllers\v7\TotalController as TotalV7;
//use App\Http\Controllers\v3\TotalController as TotalV3;
//use App\Http\Controllers\v10\TotalController as TotalV10;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class cacheUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update daily redis cache at 23:59';

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
     * @return mixed
     */
    public function handle()
    {
        $dst = date('Y-m-d 00:00:00', time());
        $day = strtotime($dst);
        $maxarr = [];
        for ($i = 0; $i < 2; $i++) {
            $dtime = date('Y-m-d', ($day - $i * 24 * 60 * 60));
            $maxarr[] = ['reg' => $dtime];
        }
        foreach($maxarr as $k=>$v){
//            $request = new Request(['date' => date('Y-m-d', strtotime('-1 day'))]);
            $request = new Request(['date' => $v['reg']]);
            $array=[
                'App\Http\Controllers\v1\TotalController',
                'App\Http\Controllers\v2\TotalController',
                'App\Http\Controllers\v3\TotalController',
                'App\Http\Controllers\v4\TotalController',
                'App\Http\Controllers\v5\TotalController',
                'App\Http\Controllers\v6\TotalController',
                'App\Http\Controllers\v7\TotalController',
                'App\Http\Controllers\v8\TotalController',
                'App\Http\Controllers\v10\TotalController',
                'App\Http\Controllers\v9\TotalController',
            ];
            foreach ($array as $v){
                $model=new $v();
                $model->index($request);
            }
        }

        Log::info($request->input('date'). ' cache:update!');
    }
}
        