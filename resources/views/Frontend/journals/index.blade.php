@extends('layout.master')

@section('content')
<div class="container">
    <h2>Journals</h2>
    <div class="row">
        @foreach($journals as $journal)
        <div class="col-md-6 mb-4">
            <div class="card">
                @if($journal->image)
                <img src="{{ asset('journal-images/'.$journal->image) }}" class="card-img-top" alt="">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url('/journals/'.$journal->slug) }}">{{ $journal->title }}</a></h5>
                    <p class="card-text"><strong>{{ $journal->authors }}</strong> — {{ $journal->journal_name }}</p>
                    <p class="card-text">{{ Str::limit($journal->abstract, 180) }}</p>
                    <a href="{{ url('/journals/'.$journal->slug) }}" class="btn btn-sm btn-primary">Read</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $journals->links() }}
</div>
@endsection
