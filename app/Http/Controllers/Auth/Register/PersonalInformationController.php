<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalInformationRequest;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PersonalInformationController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/PersonalInformation');
    }

    public function store(PersonalInformationRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        PersonalInformation::query()
            ->create($data);

        return redirect()->route('profile-information.index');
    }
}
