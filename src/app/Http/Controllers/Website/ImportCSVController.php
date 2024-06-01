<?php

namespace App\Http\Controllers\Website;

use App\Jobs\ImportSubscriptionJob;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Http\Request;
use League\Csv\Reader;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Redis;

class ImportCSVController extends WebsiteController
{
    public function upload(Request $request)
    {
        // Redis::command('flushdb');
        // die;
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->store('csv_files');

        $csv = Reader::createFromPath(storage_path('app/' . $path), 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        $data = [];
        foreach ($records as $record) {
            $data[] = $record;
        }

        $job = (new ImportSubscriptionJob($data));
        dispatch($job);

        return redirect('/')->with('success', 'CSV uploaded and data saved successfully');
    }
}
