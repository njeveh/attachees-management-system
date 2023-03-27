<?php

namespace App\Http\Controllers;

use App\Models\ApplicationAccompaniment;
use App\Utilities\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;
use PDF;
use App\Models\Application;
use Symfony\Component\HttpFoundation\Response;

class ApplicationResponseController extends Controller
{
    public function generateApplicationResponseLetter(Request $request, $id)
    {
        $dompdf = new PDF();
        //links for revocation letters use notification id as the route parameter
        if (auth()->user()->notifications->where('id', $id)->first()) {
            $notification = auth()->user()->notifications->find($id);
            $application = Application::find($notification->data['application_id']);
            $dompdf = PDF::loadView('application_responses.acceptance-revocation-letter', ['application' => $application, 'reasons' => $notification->data['revocation_reasons']]);
        } else {
            //links for acceptance and rejection letters supply application id as the route parameter
            $application = Application::find($id);
            if ($application->status === 'accepted') {
                $quarter = Utilities::get_quarters_data()[$application->quarter];
                $reponsibilities = $application->advert->accompaniments->where('type', 'intern_responsibility');
                $dompdf = PDF::loadView('application_responses.offer-letter', ['application' => $application, 'quarter' => $quarter, 'responsibilities' => $reponsibilities,]);
            } elseif ($application->status === 'rejected') {
                $dompdf = PDF::loadView('application_responses.reject-letter', ['application' => $application]);
            } else {
                return Response('', $status = 404);
            }
        }
        $dompdf->render();
        return $dompdf->stream();
    }

    public function generateOfferAcceptanceForm(Request $request, $id)
    {
        $application = Application::find($id);
        if ($application->status != 'accepted') {
            return Response('', $status = 404);
        }
        $dompdf = new PDF();
        if ($application->status === 'accepted') {
            $dompdf = PDF::loadView('application_responses.offer-acceptance-form');
        }
        //$dompdf->setOption('filename', 'Offer Acceptance Form');
        $dompdf->render();
        return $dompdf->stream();
    }
    public function UploadOfferAcceptanceForm(Request $request, $id)
    {
        $application = Application::find($id);
        $applicant = $application->applicant;
        if ($application->status != 'accepted') {
            return Response('', $status = 404);
        }
        //     $validationAttributes = [
        //         'offer_acceptance_form' => 'emergency contact name',
        // ];
        $request->validate([
            'offer_acceptance_form' => 'required|file|mimes:pdf,jpg,jpeg,png',
        ]);
        DB::beginTransaction();
        try {
            $path = $request->offer_acceptance_form->storePubliclyAs(
                preg_replace('/\s+/', '_', $application->advert->department->name) . 'offer_acceptance_forms/' . '/' .
                preg_replace('/\//', '_', $application->advert->year) . '/' . 'quarter_' . $application->quarter . '/' . preg_replace('/[\W\s\/]+/', '_', $application->advert->title) . '/' .
                $application->applicant->national_id,
                'offer_acceptance_form',
                'public'
            );
            if (!ApplicationAccompaniment::where('application_id', $id)->where('name', 'offer_acceptance_form')->exists()) {

                ApplicationAccompaniment::create([
                    'name' => 'offer_acceptance_form',
                    'application_id' => $id,
                    'path' => $path,
                ]);
                if ($applicant->engagement_level < 3) {
                    $applicant->engagement_level = 3;
                    $applicant->save();
                }
                DB::commit();
            }
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            return back()->with(
                'server_error',
                'Sorry!! Something went wrong.'
            )->withInput();
        }

        return back()->with('upload_feedback', 'Acceptance form successfuly uploaded.');

    }
    public function showOfferAcceptanceFormUploadPage(Request $request, $id)
    {
        $application = Application::find($id);
        if ($application->status != 'accepted') {
            return Response('', $status = 404);
        }
        return view('application_responses.offer-acceptance-form-upload', ['application_id' => $application->id]);

    }
}