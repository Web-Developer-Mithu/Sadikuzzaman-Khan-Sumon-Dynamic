@extends('admin.dashboard_master')

@section('content')
<div class="container">
    <h3>Journals</h3>
    <a href="{{ url('/admin/journals/create') }}" class="btn btn-success mb-3">Create Journal</a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-striped">
        <thead>
            <tr><th>Title</th><th>Journal</th><th>Authors</th><th>Status</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($journals as $j)
            <tr>
                <td>{{ $j->title }}</td>
                <td>{{ $j->journal_name }}</td>
                <td>{{ $j->authors }}</td>
                <td>{{ $j->status }}</td>
                <td>
                    <a href="{{ url('/admin/journals/'.$j->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ url('/admin/journals/'.$j->id) }}" method="post" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $journals->links() }}
</div>
@endsection
