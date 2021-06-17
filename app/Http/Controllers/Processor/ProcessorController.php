<?php

namespace App\Http\Controllers\Processor;

use App\Models\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProcessorResource;
use App\Http\Resources\ProcessorCollection;

class ProcessorController extends Controller
{
    
    public function index()
    {
        $processors = Processor::paginate(6);
        return new ProcessorCollection($processors);
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Processor $processor)
    {
        return new ProcessorResource($processor);
    }

    public function update(Request $request, Processor $processor)
    {
        //
    }

    public function destroy(Processor $processor)
    {
        //
    }
}
