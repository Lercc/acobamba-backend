<?php

namespace App\Http\Controllers\Processor;

use App\Models\Processor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessorRequest;
use App\Http\Requests\ProcessorUpdateRequest;
use App\Http\Resources\ProcessorResource;
use App\Http\Resources\ProcessorCollection;
use Illuminate\Support\Facades\DB;

class ProcessorController extends Controller
{
    
    public function index()
    {
        $processors = Processor::paginate(6);
        return new ProcessorCollection($processors);
    }


    public function store(ProcessorRequest $request)
    {
        // return $request;
        try {
            DB::beginTransaction();
            $user = User::create($request->validated());
            $user->password = bcrypt($user->password);
            $user->save();

            $processor = Processor::create(['user_id' => $user->id]);

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
        return new ProcessorResource($processor);
    }

    public function show(Processor $processor)
    {
        return new ProcessorResource($processor);
    }

    public function update(ProcessorUpdateRequest $request, Processor $processor)
    {
        // campos que se van a actualizar
        // USER : 'role_id', 'name', 'last_name', 'doc_type', 'doc_number', 'email', 'status'
        // EMPLEADO : 'user_id'
        try {
            DB::beginTransaction();

             // user
            $user = User::find($processor->user_id);
            $user->update($request->except(['id']));

            // processor
            $processor->update($request->validated());

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
        return new ProcessorResource($processor);
    }

    public function destroy(Processor $processor)
    {
        //
    }
}
