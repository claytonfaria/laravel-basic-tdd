<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LeadController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(StoreLeadRequest $request): LeadResource
    {

       $validated =  $request->validated();

        $lead = Lead::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
        ]);
        return new LeadResource($lead);
    }

}
