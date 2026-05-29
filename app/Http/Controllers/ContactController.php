<?php

namespace App\Http\Controllers;

use App\Actions\SubmitContactAction;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function show(): View
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     */
    public function store(ContactRequest $request, SubmitContactAction $action): RedirectResponse
    {
        $action->execute($request->validated(), $request->ip());

        return redirect()
            ->route('contact.show')
            ->with('success', 'Mesej anda telah dihantar. Kami akan hubungi anda dalam masa 24 jam.');
    }
}
