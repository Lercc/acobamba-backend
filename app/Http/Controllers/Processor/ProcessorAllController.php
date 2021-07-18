<?php

namespace App\Http\Controllers\Processor;

use App\Models\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProcessorCollection;

class ProcessorAllController extends Controller
{
    public function getProcessorAll()
    {
        $processors = Processor::get();
        return new ProcessorCollection($processors);
    }
}
