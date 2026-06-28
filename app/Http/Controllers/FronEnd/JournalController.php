<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Journal;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::where('status', 'published')->orderBy('published_at', 'desc')->paginate(12);
        return view('frontend.journals.index', compact('journals'));
    }

    public function show($slug)
    {
        $journal = Journal::where('slug', $slug)->firstOrFail();
        return view('frontend.journals.show', compact('journal'));
    }
}
