<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        $contactMessage = ContactMessage::create($validated);

        Mail::raw(
            "New contact message from The Silken Manuscript\n\n" .
            "Name: {$contactMessage->name}\n" .
            "Email: {$contactMessage->email}\n" .
            "Subject: {$contactMessage->subject}\n\n" .
            "Message:\n{$contactMessage->message}",
            function ($mail) use ($contactMessage) {
                $mail->to('admin@ehb.be')
                    ->subject('New contact message: ' . $contactMessage->subject)
                    ->replyTo($contactMessage->email, $contactMessage->name);
            }
        );

        return redirect()
            ->route('contact.create')
            ->with('success', 'Your message has been sent successfully. The curators will review it as soon as possible.');
    }

    public function adminIndex()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact-messages', compact('messages'));
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->update([
            'is_read' => true,
        ]);

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'The message has been marked as read.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'The message has been deleted.');
    }
}
