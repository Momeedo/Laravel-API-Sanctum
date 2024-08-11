<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Resources\TaskSummaryResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tasks = $request->user()->tasksSummary($request->period);
        return $tasks->mapToGroups(function ($item, $key) {
            return [
                ($item->is_completed ? 'completed' : 'uncompleted') => TaskSummaryResource::make($item)
            ];
        });
    }
}
