<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetApplicationsRequest;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function getApplications(GetApplicationsRequest $request)
    {
        return $this->applicationService->getApplications($request);
    }

    public function respondToApplication(Request $request, $id)
    {
        return $this->applicationService->respondToApplication($request, $id);
    }

    public function submitApplication(Request $request)
    {
        return $this->applicationService->submitApplication($request);
    }
}
