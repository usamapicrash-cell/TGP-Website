<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\ContactSetting;
use \App\Models\Faq;
use App\Mail\ContactEnquiryMail;
use App\Mail\ClientAcknowledgmentMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index()
    {
        // Pehli row uthayein settings ki
        $settings = ContactSetting::first();
        // FAQs order ke mutabiq fetch karein
        $faqs = Faq::orderBy('order_position', 'asc')->get();

        return view('contact', compact('settings', 'faqs'));
    }


    public function storeContractorEnquiry(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'con_name' => 'required|string|max:255',
            'con_phone' => 'required|string|max:20',
            'con_email' => 'required|email',
            'service_type' => 'required',
            'con_message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()->all()], 422);
        }

        try {
            \App\Models\ContractorEnquiry::create([
                'name' => $request->con_name,
                'phone' => $request->con_phone,
                'email' => $request->con_email,
                'service_type' => $request->service_type,
                'message' => $request->con_message,
            ]);

            return response()->json(['status' => 'success', 'responseText' => 'Thank you! Your RFQ has been submitted successfully.']);
        } catch (\Exception $e) {
            \Log::error("Contractor Enquiry Submission Error: " . $e->getMessage(), [
                'input' => $request->all(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return response()->json(['status' => 'error', 'responseText' => 'Something went wrong. Please try again.'], 500);
        }
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'service_type' => 'required',
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'email'        => 'required|email',
            'phone'        => 'required',
            'zip_code'     => 'required',
            'message'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()->all()], 422);
        }

        try {
            
            $data = $request->all();
            $enquiry = \App\Models\ContactEnquiry::create($data);

            $adminEmail = env('CONTACT_EMAIL', 'admin@theglasspeople.com');

            // 1. Client Acknowledgment Mail ka data tayyar karein
            $extraData = [
                'contact'  => \App\Models\ContactSetting::first(),
                'services' => \App\Models\Service::orderBy('order')->take(3)->get(),
                'gallery'  => \App\Models\GalleryItem::latest()->take(3)->get(),
            ];

            // --- MAGIC LINE: HTML Render karein ---
            $mailable = new ClientAcknowledgmentMail($data, $extraData);
            $renderedHtml = $mailable->render(); // Ye pura HTML string nikal dega

            // 2. CRM API ko hit karein (Ab rendered HTML bhi bhej rahe hain)
            $apiUrl = env('WEBAPP_API_URL') . '/api/website/lead'; 
            $apiResponse = Http::post($apiUrl, [
                'client_name' => $request->first_name . ' ' . $request->last_name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'source'      => 'website',
                'address'     => $request->zip_code,
                'message'     => $request->message,
                'service'     => $request->service_type,
                'ack_html'    => $renderedHtml, // Ye line rendered HTML bhej rahi hai
            ]);

            // 3. Asli Emails Send karein
            Mail::to($adminEmail)->send(new ContactEnquiryMail($data));
            Mail::to($data['email'])->send($mailable);
            return response()->json(['status' => 'success', 'responseText' => 'Your message has been sent successfully!']);
        } catch (\Exception $e) {
            \Log::error("Contact Form Error: " . $e->getMessage());
            return response()->json(['status' => 'error', 'responseText' => 'Server error, please try again.'], 500);
        }
    }
}
