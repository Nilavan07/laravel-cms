{{-- resources/views/console/dashboard.blade.php --}}
@extends('layout.console')

@push('styles')
<style>
  :root {
    --clr-bg:        #F9FAFB;
    --clr-card-bg:   #FFFFFF;
    --clr-border:    #E5E7EB;
    --clr-primary:   #4F46E5; 
    --clr-accent:    #4338CA; 
    --clr-text:      #111827; 
    --clr-muted:     #6B7280; 
    --space-xs:      0.5rem;
    --space-sm:      1rem;
    --space-md:      1.5rem;
    --space-lg:      2rem;
  }

  body {
    background: var(--clr-bg);
  }

  .dashboard-container {
    max-width: 960px;
    margin: var(--space-lg) auto;
    padding: 0 var(--space-sm);
  }

  .dashboard-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: var(--space-md);
  }
  .dashboard-header h1 {
    font-size: 2rem;
    color: var(--clr-text);
    margin: 0;
  }
  .dashboard-header .welcome {
    color: var(--clr-muted);
    font-size: 0.9rem;
  }

  .dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: var(--space-md);
  }

  .dashboard-card {
    background: var(--clr-card-bg);
    border: 1px solid var(--clr-border);
    border-radius: 0.75rem;
    padding: var(--space-md);
    text-decoration: none;
    color: inherit;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05),
                0 1px 2px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
  }
  .dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 6px rgba(0,0,0,0.1),
                0 2px 4px rgba(0,0,0,0.08);
  }

  .dashboard-card .card-top {
    display: flex;
    align-items: center;
    width: 100%;
  }
  .dashboard-card .card-icon {
    font-size: 2rem;
    color: var(--clr-primary);
    margin-right: var(--space-sm);
  }
  .dashboard-card .card-info {
    flex: 1;
  }
  .dashboard-card .card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 0;
    color: var(--clr-text);
  }
  .dashboard-card .card-count {
    font-size: 0.9rem;
    color: var(--clr-muted);
  }

  .dashboard-card .card-action {
    margin-top: auto;
    align-self: stretch;
    text-align: center;
    padding: var(--space-xs) 0;
    border-top: 1px solid var(--clr-border);
    color: var(--clr-accent);
    font-weight: 500;
    transition: background 0.15s, color 0.15s;
  }
  .dashboard-card .card-action:hover {
    background: var(--clr-accent);
    color: #fff;
  }

  @media (max-width: 600px) {
    .dashboard-header {
      flex-direction: column;
      align-items: flex-start;
    }
    .dashboard-header .welcome {
      margin-top: var(--space-xs);
    }
  }
</style>
@endpush

@section('content')
<section class="dashboard-container">

  <div class="dashboard-header">
    <h1>Dashboard</h1>
    <div class="welcome">
      Hi, {{ Auth::user()->first }}! {{ now()->format('M j, Y') }}
    </div>
  </div>

  <div class="dashboard-grid">
    {{-- Manage Projects --}}
    <a href="/console/projects/list" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-project-diagram"></i></div>
        <div class="card-info">
          <p class="card-title">Projects</p>
          <p class="card-count">{{ \App\Models\Project::count() }} total</p>
        </div>
      </div>
      <div class="card-action">Manage Projects</div>
    </a>

    {{-- Manage Types --}}
    <a href="/console/types/list" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-tags"></i></div>
        <div class="card-info">
          <p class="card-title">Types</p>
          <p class="card-count">{{ \App\Models\Type::count() }} total</p>
        </div>
      </div>
      <div class="card-action">Manage Types</div>
    </a>

    {{-- Manage Skills --}}
    <a href="/console/skills/list" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-lightbulb"></i></div>
        <div class="card-info">
          <p class="card-title">Skills</p>
          <p class="card-count">{{ \App\Models\Skill::count() }} total</p>
        </div>
      </div>
      <div class="card-action">Manage Skills</div>
    </a>

    {{-- Manage Certificates --}}
    <a href="/console/certificates/list" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-certificate"></i></div>
        <div class="card-info">
          <p class="card-title">Certificates</p>
          <p class="card-count">{{ \App\Models\Certificate::count() }} total</p>
        </div>
      </div>
      <div class="card-action">Manage Certificates</div>
    </a>

    {{-- Manage Users --}}
    <a href="/console/users/list" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-users"></i></div>
        <div class="card-info">
          <p class="card-title">Users</p>
          <p class="card-count">{{ \App\Models\User::count() }} total</p>
        </div>
      </div>
      <div class="card-action">Manage Users</div>
    </a>

    {{-- Log Out --}}
    <a href="/console/logout" class="dashboard-card">
      <div class="card-top">
        <div class="card-icon"><i class="fas fa-sign-out-alt"></i></div>
        <div class="card-info">
          <p class="card-title">Sign Out</p>
          <p class="card-count">&nbsp;</p>
        </div>
      </div>
      <div class="card-action">Log Out</div>
    </a>
  </div>
  
</section>

@include('partials.footer')

@endsection
