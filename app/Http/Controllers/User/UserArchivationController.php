<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Archivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArchivationCollection;

class UserArchivationController extends Controller
{
    public function index(User $user) {
        $archivations = Archivation::where('user_id', $user->id)->paginate(15);
        
        if (sizeof($archivations) != 0) {
            return new ArchivationCollection($archivations);
        } else {
            return response()->json([
                'message' => 'El usuario no tiene archivaciones realizadas'
            ], 200);
        }
    }
}
