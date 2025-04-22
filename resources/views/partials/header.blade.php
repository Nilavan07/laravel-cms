<style>
  :root {
    --clr-panel-bg:  #FFFFFF;
    --clr-border:    #E5E7EB;
    --clr-primary:   #4F46E5;
    --clr-accent:    #14B8A6;
    --clr-text:      #333333;
    --clr-muted:     #6B7280;
    --space-xs:      0.5rem;
    --space-sm:      1rem;
    --space-md:      1.5rem;
    --header-height: 4rem;
  }

  
  .header-bar {
    background: var(--clr-panel-bg);
    border-bottom: 1px solid var(--clr-border);
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .header-inner {
    max-width: 960px;
    height: var(--header-height);
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 var(--space-sm);
  }

  
  .logo {
    font-size: 1.375rem;
    font-weight: 600;
    color: var(--clr-primary);
    text-decoration: none;
    line-height: 1;
  }

  /
  .nav {
    display: flex;
    gap: var(--space-sm);
    align-items: center;
  }

  .nav-link {
    padding: 0.5rem var(--space-sm);
    border-radius: 0.375rem;
    color: var(--clr-text) !important;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.2s, color 0.2s;
  }

  .nav-link:hover,
  .nav-link.active {
    background: var(--clr-primary);
    color: #fff !important;
  }

  .nav-link--accent {
    color: var(--clr-accent) !important;
  }

  .nav-link--accent:hover {
    background: var(--clr-accent);
    color: #fff !important;
  }

  .user-greeting {
    font-size: 0.9rem;
    color: var(--clr-muted);
    margin-right: var(--space-sm);
  }

  /* Hamburger for mobile */
  .hamburger {
    display: none;
    font-size: 1.25rem;
    cursor: pointer;
    color: var(--clr-text);
  }

  @media (max-width: 640px) {
    .header-inner {
      flex-wrap: wrap;
      height: auto;
      padding: var(--space-xs) var(--space-sm);
    }
    .hamburger {
      display: block;
    }
    .nav {
      width: 100%;
      flex-direction: column;
      align-items: flex-start;
      display: none;
      margin-top: var(--space-xs);
      gap: var(--space-xs);
    }
    .nav.open {
      display: flex;
    }
    .nav-link {
      width: 100%;
      padding: var(--space-xs) var(--space-sm);
    }
  }
</style>

<header class="header-bar">
  <div class="header-inner">
    {{-- Logo --}}
    @if(!empty($console))
      <a href="/console/dashboard" class="logo">Portfolio Console</a>
    @else
      <a href="/" class="logo">My Portfolio</a>
    @endif

    <nav class="nav">
      @if(!empty($console))
        @auth
          <span class="user-greeting">Hi, {{ auth()->user()->first }}</span>
          <a href="/console/dashboard" class="nav-link">Dashboard</a>
          <a href="/console/logout"    class="nav-link nav-link--accent">Log Out</a>
          <a href="/"                   class="nav-link">View Site</a>
        @else
          <a href="/" class="nav-link">Back to Site</a>
        @endauth
      @else
        @auth
          <a href="/console/dashboard" class="nav-link">Dashboard</a>
          <a href="/console/logout"    class="nav-link nav-link--accent">Log Out</a>
        @else
          <a href="/console/login" class="nav-link">Login</a>
        @endauth
      @endif
    </nav>
  </div>
</header>

{{-- Make sure you have Font Awesome loaded in your layout for the hamburger icon: --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> --}}
