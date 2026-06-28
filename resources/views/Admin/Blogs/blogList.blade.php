@extends('admin.dashboard_master')

@section('content')

@push('css')
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.blog-table-wrap {
  width: 100%;
  overflow-x: auto;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  background: #fff;
}

.blog-table {
  width: 100%;
  border-collapse: collapse;
  min-width: 500px;
}

.blog-table thead tr {
  background: #f8fafc;
}

.blog-table th {
  padding: 12px 14px;
  text-align: left;
  font-size: 12px;
  font-weight: 600;
  color: #0f172a;
  border-bottom: 1px solid #e2e8f0;
  white-space: nowrap;
}

.blog-table th:nth-child(1) { width: 60px; }
.blog-table th:nth-child(3) { width: 90px; text-align: center; }
.blog-table th:nth-child(4) { width: 160px; text-align: center; }

.blog-table tbody tr {
  border-bottom: 1px solid #e2e8f0;
  transition: background .15s;
}

.blog-table tbody tr:last-child { border-bottom: none; }
.blog-table tbody tr:hover { background: #f8fafc; }

.blog-table td {
  padding: 12px 14px;
  font-size: 13px;
  color: #0f172a;
  vertical-align: middle;
  font-weight: 500;
  word-break: break-word;
  white-space: normal;
}

.blog-table td:nth-child(3) { text-align: center; }
.blog-table td:nth-child(4) { text-align: center; }

.thumb {
  width: 56px;
  height: 40px;
  border-radius: 6px;
  object-fit: cover;
  border: 1px solid #e2e8f0;
  display: block;
  margin: 0 auto;
}

.actions {
  display: flex;
  gap: 10px;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.btn-edit,
.btn-del {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  padding: 0.7rem 1rem;
  border-radius: 999px;
  font-size: 0.95rem;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  border: 1px solid transparent;
  transition: background .18s ease, border-color .18s ease, transform .18s ease;
  white-space: nowrap;
}

.btn-edit {
  border-color: #0d6efd;
  background: #0d6efd;
  color: #fff;
}
.btn-edit:hover {
  background: #0b5ed7;
  border-color: #0b5ed7;
  transform: translateY(-1px);
}

.btn-del {
  border-color: #dc3545;
  background: #dc3545;
  color: #fff;
}
.btn-del:hover {
  background: #bb2d3b;
  border-color: #bb2d3b;
  transform: translateY(-1px);
}

html[data-bs-theme="dark"] .btn-edit {
  border-color: #60a5fa;
  background: #2563eb;
}
html[data-bs-theme="dark"] .btn-edit:hover {
  background: #1d4ed8;
}
html[data-bs-theme="dark"] .btn-del {
  border-color: #fb7185;
  background: #dc2626;
}
html[data-bs-theme="dark"] .btn-del:hover {
  background: #b91c1c;
}

/* Dark mode */
html[data-bs-theme="dark"] .blog-table-wrap {
  border-color: #334155;
  background: #111827;
}
html[data-bs-theme="dark"] .blog-table thead tr { background: #0f172a; }
html[data-bs-theme="dark"] .blog-table th {
  color: #f8fafc;
  border-bottom-color: #334155;
}
html[data-bs-theme="dark"] .blog-table tbody tr { border-bottom-color: #334155; background: #111827; }
html[data-bs-theme="dark"] .blog-table tbody tr:hover { background: #1f2937; }
html[data-bs-theme="dark"] .blog-table td { color: #f8fafc; }
html[data-bs-theme="dark"] .thumb { border-color: #334155; }
html[data-bs-theme="dark"] .btn-edit { border-color: #475569; background: #1e293b; color: #f8fafc; }
html[data-bs-theme="dark"] .btn-edit:hover { background: #334155; }
html[data-bs-theme="dark"] .btn-del { border-color: #dc2626; background: #1e293b; color: #fecaca; }
html[data-bs-theme="dark"] .btn-del:hover { background: #5f2120; }

/* Mobile cards */
@media (max-width: 640px) {
  .blog-table-wrap {
    border: none;
    background: transparent;
    overflow: visible;
  }

  .blog-table,
  .blog-table thead,
  .blog-table tbody,
  .blog-table th,
  .blog-table td,
  .blog-table tr {
    display: block;
    width: 100%;
  }

  .blog-table thead { display: none; }

  .blog-table tbody tr {
    display: grid;
    grid-template-columns: 64px 1fr;
    grid-template-rows: auto auto;
    gap: 8px 10px;
    align-items: start;
    margin-bottom: 12px;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #fff;
    padding: 12px;
  }

  html[data-bs-theme="dark"] .blog-table tbody tr {
    border-color: #334155;
    background: #111827;
  }

  /* Sl No */
  .blog-table td:nth-child(1) {
    grid-column: 1 / 2;
    grid-row: 1 / 2;
    font-size: 11px;
    color: #94a3b8;
    font-weight: 700;
    padding: 0;
  }

  /* Title */
  .blog-table td:nth-child(2) {
    grid-column: 2 / 3;
    grid-row: 1 / 2;
    font-size: 13px;
    font-weight: 600;
    color: #0f172a;
    padding: 0;
    white-space: normal;
    word-break: break-word;
    line-height: 1.5;
  }

  html[data-bs-theme="dark"] .blog-table td:nth-child(2) { color: #f8fafc; }

  /* Image */
  .blog-table td:nth-child(3) {
    grid-column: 1 / 2;
    grid-row: 2 / 3;
    padding: 0;
    text-align: left;
  }

  .blog-table td:nth-child(3) .thumb {
    width: 56px;
    height: 42px;
    margin: 0;
  }

  /* Actions */
  .blog-table td:nth-child(4) {
    grid-column: 2 / 3;
    grid-row: 2 / 3;
    padding: 0;
    text-align: left;
  }

  .actions {
    justify-content: flex-start;
    gap: 6px;
  }

  .btn-edit, .btn-del {
    padding: 7px 14px;
    font-size: 12px;
  }
}
</style>
@endpush

@section('content')

<div class="blog-table-wrap">
  <table class="blog-table">
    <thead>
      <tr>
        <th>Sl No</th>
        <th>Title</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($blogs as $blog)
      <tr>
        <td>{{ $blogs->firstItem() + $loop->index }}</td>
        <td>{{ $blog->{'blog-title'} }}</td>
        <td>
          <img
            class="thumb"
            src="{{ asset('blog-images/' . $blog->img) }}"
            alt="blog image"
          >
        </td>
        <td>
          <div class="actions">
            <a href="{{ url('/admin/edit-blog/' . $blog->id) }}" class="btn-edit">
              <i class="bi bi-pencil-square"></i> Edit
            </a>
            <a href="{{ url('/admin/delete-blog/' . $blog->id) }}" onclick="return confirm('Are you sure you want to delete this blog?')" class="btn-del">
              <i class="bi bi-trash3"></i> Delete
            </a>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" style="text-align:center; padding:2rem; color:#94a3b8; font-size:14px;">
          No blogs found.
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">
  {{ $blogs->links() }}
</div>

@endsection