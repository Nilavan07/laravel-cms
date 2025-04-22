@extends('layout.console')

<style>
  /* Wrapper styling */
  .certificates-table-wrapper {
    margin-top: 1rem;
  }

  /* Table reset & base */
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

  /* Header row */
  .console-table thead th {
    background-color: #4338ca; /* Indigo‑700 */
    color: #fff;
    font-weight: 600;
  }

  /* Zebra stripes */
  .console-table tbody tr:nth-child(even) {
    background-color: #f7f8fa; /* light gray */
  }

  /* Hover state */
  .console-table tbody tr:hover {
    background-color: #e0e7ff; /* indigo‑100 */
  }

  /* Image thumbnail */
  .console-table img {
    border-radius: 0.375rem;
    object-fit: cover;
  }

  /* Action buttons */
  .action-links a {
    margin-right: 0.5rem;
  }

  /* Responsive: stack cells */
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

@section('content')
<section class="w3-padding">

  <h2 class="w3-text-indigo">Manage Certificates</h2>

  @if(session('message'))
    <div class="w3-panel w3-green">{{ session('message') }}</div>
  @endif

  <div class="certificates-table-wrapper w3-card-4 w3-white w3-round-large w3-padding">
    <table class="console-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Issuer</th>
          <th>Awarded</th>
          <th>Created</th>
          <th colspan="3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($certificates as $cert)
          <tr>
            <td data-label="Image">
              @if($cert->image)
                <img src="{{ asset('storage/'.$cert->image) }}" width="80" height="80" alt="{{ $cert->name }}">
              @else
                <div style="width:80px;height:80px;background:#e2e8f0;border-radius:0.375rem;"></div>
              @endif
            </td>
            <td data-label="Name">{{ $cert->name }}</td>
            <td data-label="Issuer">{{ $cert->issuer }}</td>
            <td data-label="Awarded">{{ $cert->date_awarded->format('M j, Y') }}</td>
            <td data-label="Created">{{ optional($cert->created_at)->format('M j, Y') }}</td>
            <td data-label="Image" class="action-links">
              <a href="/console/certificates/image/{{ $cert->id }}" class="w3-button w3-blue w3-small">Image</a>
            </td>
            <td data-label="Edit" class="action-links">
              <a href="/console/certificates/edit/{{ $cert->id }}" class="w3-button w3-orange w3-small">Edit</a>
            </td>
            <td data-label="Delete" class="action-links">
              <a href="/console/certificates/delete/{{ $cert->id }}"
                 class="w3-button w3-red w3-small"
                 onclick="return confirm('Delete this certificate?');">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <a href="/console/certificates/add" class="w3-button w3-green w3-margin-top">
    + New Certificate
  </a>

</section>
@endsection
