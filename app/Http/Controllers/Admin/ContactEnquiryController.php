<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ContactEnquiryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contact_enquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enquiries = ContactEnquiry::latestFirst()->get();

        return view('admin.contact-enquiries.index', compact('enquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->update([
            'is_read' => true,
        ]);

        return view('admin.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        abort_if(Gate::denies('contact_enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactEnquiry->delete();

        return back()->with('message', 'Enquiry deleted successfully.');
    }
}