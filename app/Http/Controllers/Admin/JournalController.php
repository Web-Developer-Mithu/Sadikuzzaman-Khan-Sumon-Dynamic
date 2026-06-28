<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.journal.journal_list', compact('journals'));
    }

    public function create()
    {
        return view('admin.journal.create_journal');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:journals,slug',
            'journal_name' => 'nullable|string|max:255',
            'authors' => 'nullable|string|max:500',
            'affiliation' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'volume' => 'nullable|string|max:50',
            'issue' => 'nullable|string|max:50',
            'pages' => 'nullable|string|max:50',
            'doi' => 'nullable|string|max:255',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'status' => 'nullable|in:draft,published'
        ]);

        $journal = new Journal($data);
        // default to published if not explicitly set
        $journal->status = $data['status'] ?? 'published';
        if (empty($journal->slug)) {
            $journal->slug = Str::slug($journal->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = time().'_'.preg_replace('/[^a-zA-Z0-9\.\-_]/','', $img->getClientOriginalName());
            $img->move(public_path('journal-images'), $name);
            $journal->image = $name;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pname = time().'_'.preg_replace('/[^a-zA-Z0-9\.\-_]/','', $pdf->getClientOriginalName());
            $pdf->move(public_path('journal-files'), $pname);
            $journal->pdf = $pname;
        }

        if ($journal->status === 'published' && !$journal->published_at) {
            $journal->published_at = now();
        }

        $journal->save();
        return redirect(url('/admin/journals'))->with('success', 'Journal saved');
    }

    public function edit($id)
    {
        $journal = Journal::findOrFail($id);
        return view('admin.journal.edit_journal', compact('journal'));
    }

    public function update(Request $request, $id)
    {
        $journal = Journal::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:journals,slug,'.$journal->id,
            'journal_name' => 'nullable|string|max:255',
            'authors' => 'nullable|string|max:500',
            'affiliation' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'volume' => 'nullable|string|max:50',
            'issue' => 'nullable|string|max:50',
            'pages' => 'nullable|string|max:50',
            'doi' => 'nullable|string|max:255',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'pdf' => 'nullable|mimes:pdf|max:5120',
            'status' => 'nullable|in:draft,published'
        ]);

        $journal->fill($data);
        // ensure status remains published by default when not provided
        $journal->status = $data['status'] ?? $journal->status ?? 'published';
        if (empty($journal->slug)) {
            $journal->slug = Str::slug($journal->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = time().'_'.preg_replace('/[^a-zA-Z0-9\.\-_]/','', $img->getClientOriginalName());
            $img->move(public_path('journal-images'), $name);
            $journal->image = $name;
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pname = time().'_'.preg_replace('/[^a-zA-Z0-9\.\-_]/','', $pdf->getClientOriginalName());
            $pdf->move(public_path('journal-files'), $pname);
            $journal->pdf = $pname;
        }

        if ($journal->status === 'published' && !$journal->published_at) {
            $journal->published_at = now();
        }

        $journal->save();
        return redirect(url('/admin/journals'))->with('success', 'Journal updated');
    }

    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();
        return redirect(url('/admin/journals'))->with('success', 'Journal deleted');
    }
}
