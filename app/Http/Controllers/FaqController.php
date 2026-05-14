<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category')
            ->orderBy('question')
            ->get()
            ->groupBy('category');

        return view('faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        Faq::create($validated);

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ item created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq-edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
        ]);

        $faq->update($validated);

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ item updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()
            ->route('faq.index')
            ->with('success', 'FAQ item deleted successfully.');
    }
}