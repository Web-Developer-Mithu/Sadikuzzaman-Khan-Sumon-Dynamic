@extends('Admin.dashboard_master')

@section('content')


@push('css')
<style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

.table-wrap {
  border: 1px solid #d1d5db;
  border-radius: 10px;
  overflow: hidden;
  background: #ffffff;
}

table {
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
}

thead tr {
  background: #f8fafc;
}

th {
  padding: 10px 14px;
  text-align: left;
  font-size: 12px;
  font-weight: 600;
  color: #0f172a;
  border-bottom: 1px solid #e2e8f0;
}

th:nth-child(1) { width: 60px; }
th:nth-child(3) { width: 90px; text-align: center; }
th:nth-child(4) { width: 180px; }

tbody tr {
  border-bottom: 1px solid #e2e8f0;
  background: #ffffff;
}

tbody tr:last-child {
  border-bottom: none;
}

tbody tr:hover {
  background: #f8fafc;
}

td {
  padding: 10px 14px;
  font-size: 13px;
  color: #0f172a;
  vertical-align: middle;
  font-weight: 500;
}

td:nth-child(3) {
  text-align: center;
}

.thumb {
  width: 52px;
  height: 38px;
  border-radius: 6px;
  object-fit: cover;
  border: 1px solid #e2e8f0;
}

.actions {
  display: flex;
  gap: 8px;
}

.btn-edit,
.btn-del {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 5px 11px;
  border-radius: 6px;
  font-size: 12px;
  cursor: pointer;
  transition: background .15s ease, color .15s ease, border-color .15s ease;
}

.btn-edit {
  border: 1px solid #cbd5e1;
  background: #f8fafc;
  color: #0f172a;
}

.btn-edit:hover {
  background: #e2e8f0;
}

.btn-del {
  border: 1px solid #f87171;
  background: #fef2f2;
  color: #991b1b;
}

.btn-del:hover {
  background: #fee2e2;
}

body[data-bs-theme="dark"] .table-wrap {
  border-color: #444444;
  background: #111111;
}

body[data-bs-theme="dark"] thead tr {
  background: #0f172a;
}

body[data-bs-theme="dark"] th {
  color: #f8fafc;
  border-bottom: 1px solid #334155;
}

body[data-bs-theme="dark"] tbody tr {
  border-bottom: 1px solid #334155;
  background: #111827;
}

body[data-bs-theme="dark"] tbody tr:hover {
  background: #1f2937;
}

body[data-bs-theme="dark"] td {
  color: #f8fafc;
}

body[data-bs-theme="dark"] .thumb {
  border-color: #334155;
}

body[data-bs-theme="dark"] .btn-edit {
  border: 1px solid #475569;
  background: #1e293b;
  color: #f8fafc;
}

body[data-bs-theme="dark"] .btn-edit:hover {
  background: #334155;
}

body[data-bs-theme="dark"] .btn-del {
  border: 1px solid #dc2626;
  background: #1e293b;
  color: #fecaca;
}

body[data-bs-theme="dark"] .btn-del:hover {
  background: #5f2120;
}
</style>


    
@endpush

<table>
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Title</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td> About Mr Sadikuzzaman</td>
      <td><img class="thumb" src="image1.jpg" alt="ব্লগ ইমেজ"></td>
      <td>
        <button class="btn-edit">✏️ Update</button>
        <button class="btn-del">🗑️ Delete</button>
      </td>
    </tr>
   
  </tbody>
</table>

@endsection