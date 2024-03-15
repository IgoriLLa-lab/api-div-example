<?php

namespace App\Repositories;

use App\Http\Requests\GetApplicationsRequest;
use App\Models\Application;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplicationRepository implements ApplicationRepositoryInterface
{

    public function getApplications(GetApplicationsRequest $request)
    {
        $status = $request->input('status');
        $createdAt = $request->input('created_at');

        $query = Application::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        if ($createdAt !== null) {
            $query->whereDate('created_at', $createdAt);
        }

        $applications = $query->paginate(10);

        if ($applications->isEmpty()) {
            return response()->json(['message' => 'По вашему запросу ничего не найдено']);
        }

        return $applications;
    }

    public function respondToApplication(Request $request, $id)
    {
        $requestModel = Application::findorFail($id);

        $requestModel->update([
            'status' => 'resolved',
            'comment' => $request->input('comment'),
        ]);

        return $requestModel;
    }

    public function submitApplication(Request $request)
    {
        return Application::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => 'active',
            'message' => $request->input('message'),
        ]);
    }
}
