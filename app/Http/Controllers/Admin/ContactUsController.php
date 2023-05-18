<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendCotactReplyEmail;
use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact_us', ['only' => ['index', 'show']]);
        $this->middleware('permission:edit_contact_us', ['only' => ['update', 'updateStatus']]);
        $this->middleware('permission:reply_contact', ['only' => ['update']]);
    }

    public function index()
    {
        $contact = ContactUs::latest()->paginate(20)->appends(\request()->all());

        return view('Admin.Contact.indexcontact', compact('contact'));
    }

    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);

        return view('Admin.Contact.replycontact', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->reply_msg = $request->reply;
        $contact->user_id = auth()->id();
        $contact->reply_at = Carbon::now();
        $contact->status = 2;
        $contact->save();

        $email['email_title'] = 'Lamore';
        $email['email_body'] = $request->reply_msg;
        $email['email_to'] = $request->email_to;

        Mail::to($request->email_to)
            ->send(new SendCotactReplyEmail($email));

        return redirect(route('contact_us.index'))->with('success', 'تم إرسال الرسالة بنجاح');
    }

    public function updateStatus(Request $request)
    {
        $contact = ContactUs::with('user:id,name')->findOrFail($request->id);
        $contact->status = $request->status;
        $contact->save();

        return response()->json(['message' => 'تم تعديل الحالة بنجاح']);
    }

    public function destroy($id)
    {
        $delete = ContactUs::find($id);
        $delete->delete();
        if ($delete) {
            return 1;
        }
    }
}
