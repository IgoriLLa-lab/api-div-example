<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\GetApplicationsRequest;
use Illuminate\Http\Request;

interface ApplicationRepositoryInterface
{
    public function getApplications(GetApplicationsRequest $request);
    public function respondToApplication(Request $request, $id);
    public function submitApplication(Request $request);
}
