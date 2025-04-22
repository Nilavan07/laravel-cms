@extends('layout.console')

<style>
  /* Wrapper styling */
  .users-table-wrapper {
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
    background-color: #4338ca; 
    color: #fff;
    font-weight: 600;
  }

  
  .console-table tbody tr:nth-child(even) {
    background-color: #f7f8fa; 
  }

  
  .console-table tbody tr:hover {
    background-color: #e0e7ff; 
  }

  
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

  /* Action links */
  .action-links a {
    margin-right: 0.5rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s;
  }
  .action-links .edit-link {
    color: #f59e0b; 
  }
  .action-links .edit-link:hover {
    color: #d97706; 
  }
  .action-links .delete-link {
    color: #dc2626; 
  }
  .action-links .delete-link:hover {
    color: #b91c1c; 
  }
</style>

@section('content')
<section class="w3-padding">

  <h2 class="w3-text-indigo">Manage Users</h2>

  <div class="users-table-wrapper w3-card-4 w3-white w3-round-large w3-padding">
    <table class="console-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Created</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td data-label="Name">{{ $user->first }} {{ $user->last }}</td>
            <td data-label="Email">{{ $user->email }}</td>
            <td data-label="Created">{{ $user->created_at->format('M j, Y') }}</td>
            <td data-label="Edit" class="action-links">
              <a href="/console/users/edit/{{ $user->id }}" class="edit-link">Edit</a>
            </td>
            <td data-label="Delete" class="action-links">
              <a href="/console/users/delete/{{ $user->id }}"
                 class="delete-link"
                 onclick="return confirm('Delete this user?');">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <a href="/console/users/add" class="w3-button w3-green w3-margin-top">
    + New User
  </a>

</section>
@include('partials.footer')
@endsection
