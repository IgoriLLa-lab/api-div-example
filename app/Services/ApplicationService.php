<?php

namespace App\Services;

use App\Http\Requests\GetApplicationsRequest;
use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class ApplicationService
{
    private $applicationRepository;
    private $mailer;

    public function __construct(ApplicationRepository $applicationRepository, Mailer $mailer)
    {
        $this->applicationRepository = $applicationRepository;
        $this->mailer = $mailer;
    }

    public function getApplications(GetApplicationsRequest $request)
    {
        return $this->applicationRepository->getApplications($request);
    }

    public function respondToApplication(Request $request, $id)
    {
        $newRequest = $this->applicationRepository->respondToApplication($request, $id);

        $recipientEmail = $newRequest->email;

        Mail::send('email.request', ['newRequest' => $newRequest], function ($message) use ($recipientEmail) {
            $message->to($recipientEmail)->subject('Subject of the email');
        });
    }

    public function submitApplication(Request $request)
    {
        return $this->applicationRepository->submitApplication($request);
    }
}
