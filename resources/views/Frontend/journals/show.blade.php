@extends('layout.master')

@section('content')
<div class="container">
    <h2>{{ $journal->title }}</h2>
    <p><strong>{{ $journal->authors }}</strong> — {{ $journal->journal_name }}</p>
    @if($journal->image)
        <img src="{{ asset('journal-images/'.$journal->image) }}" alt="" style="max-width:300px">
    @endif
    <div class="mt-3">
        <p><strong>Affiliation:</strong> {{ $journal->affiliation }}</p>
        <p><strong>Role:</strong> {{ $journal->role }}</p>
        <p><strong>Publication:</strong> {{ $journal->publication_date ? $journal->publication_date->format('F j, Y') : '' }} @if($journal->volume) | Vol: {{ $journal->volume }}@endif @if($journal->issue) | Issue: {{ $journal->issue }}@endif</p>
        <p><strong>DOI:</strong> {{ $journal->doi }}</p>
        <hr>
        <h4>Abstract</h4>
        <p>{!! nl2br(e($journal->abstract)) !!}</p>
        @if($journal->pdf)
            <a href="{{ asset('journal-files/'.$journal->pdf) }}" target="_blank" class="btn btn-secondary">Download PDF</a>
        @endif
    </div>
    <a href="{{ url('/journals') }}" class="btn btn-link mt-3">Back to Journals</a>
</div>
@endsection
