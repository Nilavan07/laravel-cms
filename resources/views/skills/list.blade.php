@extends('layout.console')

<style>
  /* Table container styling */
  .skills-table-wrapper {
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
    background-color: #f7f8fa;
  }
  .console-table tbody tr:hover {
    background-color: #e0e7ff;
  }

  /* Responsive: stack on mobile */
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

  /* Thumbnails */
  .console-table img {
    border-radius: 0.375rem;
    object-fit: cover;
  }

  /* Action buttons */
  .action-links a {
    margin-right: 0.5rem;
  }
</style>


@section('content')
<section class="w3-padding">

  <h2 class="w3-text-indigo">Manage Skills</h2>

  <div class="skills-table-wrapper w3-card-4 w3-white w3-round-large w3-padding">
    <table class="console-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>URL</th>
          <th>Created</th>
          <th colspan="3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($skills as $skill)
          <tr>
            <td data-label="Image">
              @if ($skill->image)
                <img src="{{ asset('storage/'.$skill->image) }}" width="80" height="80" alt="{{ $skill->title }}">
              @else
                <div style="width:80px;height:80px;background:#e2e8f0;border-radius:0.375rem;"></div>
              @endif
            </td>
            <td data-label="Title">{{ $skill->title }}</td>
            <td data-label="URL">
              <a href="{{ $skill->url }}" target="_blank" class="w3-text-indigo">
                {{ \Illuminate\Support\Str::limit($skill->url, 30) }}
              </a>
            </td>
            <td data-label="Created">{{ $skill->created_at->format('M j, Y') }}</td>
            <td data-label="Image" class="action-links">
              <a href="/console/skills/image/{{ $skill->id }}" class="w3-button w3-blue w3-small">Image</a>
            </td>
            <td data-label="Edit" class="action-links">
              <a href="/console/skills/edit/{{ $skill->id }}" class="w3-button w3-orange w3-small">Edit</a>
            </td>
            <td data-label="Delete" class="action-links">
              <a href="/console/skills/delete/{{ $skill->id }}"
                 class="w3-button w3-red w3-small"
                 onclick="return confirm('Delete this skill?');">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <a href="/console/skills/add" class="w3-button w3-green w3-margin-top">
    + New Skill
  </a>

</section>
@include('partials.footer')
@endsection
