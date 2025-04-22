{{-- resources/views/console/types/list.blade.php --}}
@extends('layout.console')

@push('styles')
<style>
  /* Table container styling */
  .types-table-wrapper {
    margin-top: 1rem;
  }

  /* Base table reset & styling */
  .console-table {
    border-collapse: collapse;
    width: 100%;
  }
  .console-table th,
  .console-table td {
    padding: 0.75rem;
    text-align: left;
    vertical-align: middle;
  }
  .console-table thead th {
    background-color: #4338ca; /* Indigo‑700 */
    color: #fff;
    font-weight: 600;
  }
  .console-table tbody tr:nth-child(even) {
    background-color: #f7f8fa; /* light gray */
  }
  .console-table tbody tr:hover {
    background-color: #e0e7ff; /* indigo‑100 */
  }

  /* Action link spacing */
  .action-links a {
    margin-right: 0.5rem;
    color: #4338ca;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s;
  }
  .action-links a:hover {
    color: #f87171; /* red‑400 */
  }

  /* Responsive: stack cells on mobile */
  @media (max-width: 600px) {
    .console-table, 
    .console-table thead, 
    .console-table tbody, 
    .console-table th, 
    .console-table td, 
    .console-table tr {
      display: block;
    }
    .console-table thead {
      display: none;
    }
    .console-table tr {
      margin-bottom: 1rem;
    }
    .console-table td {
      position: relative;
      padding-left: 50%;
      text-align: right;
    }
    .console-table td::before {
      content: attr(data-label);
      position: absolute;
      left: 0;
      width: 45%;
      padding-left: 0.75rem;
      font-weight: 600;
      text-align: left;
    }
  }
</style>
@endpush

@section('content')
<section class="w3-padding">

  <h2 class="w3-text-indigo">Manage Types</h2>

  <div class="types-table-wrapper w3-card-4 w3-white w3-round-large w3-padding">
    <table class="console-table">
      <thead>
        <tr>
          <th>Name</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($types as $type)
          <tr>
            <td data-label="Name">{{ $type->title }}</td>
            <td data-label="Edit" class="action-links">
              <a href="/console/types/edit/{{ $type->id }}" class="w3-button w3-blue w3-small">Edit</a>
            </td>
            <td data-label="Delete" class="action-links">
              <a href="/console/types/delete/{{ $type->id }}" 
                 class="w3-button w3-red w3-small"
                 onclick="return confirm('Delete this type?');">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <a href="/console/types/add" class="w3-button w3-green w3-margin-top">
    + New Type
  </a>

</section>
@include('partials.footer')
@endsection
