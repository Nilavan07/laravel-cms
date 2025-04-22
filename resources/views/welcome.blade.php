@extends('layout.frontend', ['title' => 'Home'])

@push('styles')
<style>
  /*────────────────────────────────────────────────*/
  /* Global color & spacing variables              */
  /*────────────────────────────────────────────────*/
  :root {
    --clr-bg:        #F3F4F6;
    --clr-panel-bg:  #FFFFFF;
    --clr-border:    #E5E7EB;
    --clr-primary:   #4F46E5; /* Indigo-600 */
    --clr-accent:    #14B8A6; /* Teal-500 */
    --clr-text:      #333333;
    --space-sm:      1rem;
    --space-md:      1.5rem;
    --space-lg:      2rem;
  }
  body {
    background: var(--clr-bg);
    color: var(--clr-text);
  }
  .container {
    max-width: 960px;
    margin: var(--space-lg) auto;
    padding: 0 var(--space-sm);
  }

  /*────────────────────────────────────────────────*/
  /* Base panel styling                            */
  /*────────────────────────────────────────────────*/
  .section-panel {
    background: var(--clr-panel-bg);
    border: 1px solid var(--clr-border);
    border-radius: 0.75rem;
    padding: var(--space-md);
    margin-bottom: var(--space-lg);
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    position: relative;
  }
  .section-panel h2 {
    margin-top: 0;
    color: var(--clr-primary);
    font-size: 1.75rem;
  }

  /*────────────────────────────────────────────────*/
  /* About Section                                 */
  /*────────────────────────────────────────────────*/
  .about-section {
    background: #EFF6FF; /* Light Indigo-50 */
  }
  .about-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 0.5rem; height: 100%;
    background: var(--clr-primary);
    border-top-left-radius: 0.75rem;
    border-bottom-left-radius: 0.75rem;
  }
  .about-section p {
    line-height: 1.8;
    margin-top: 1rem;
  }

  /*────────────────────────────────────────────────*/
  /* Skills Section                                */
  /*────────────────────────────────────────────────*/
  .skill-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px,1fr));
    gap: var(--space-sm);
    list-style: none;
    padding: 0;
    margin-top: var(--space-sm);
  }
  .skill-item {
    background: var(--clr-panel-bg);
    border: 1px solid var(--clr-border);
    border-radius: 0.5rem;
    text-align: center;
    padding: var(--space-sm);
    transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .skill-item:hover {
    background: var(--clr-primary);
    color: #fff;
    transform: translateY(-4px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  .skill-item img {
    width: 40px; height: 40px;
    object-fit: cover;
    margin-bottom: 0.5rem;
    border-radius: 0.25rem;
  }
  .skill-title {
    font-weight: 500;
  }

  /*────────────────────────────────────────────────*/
  /* Projects Section                              */
  /*────────────────────────────────────────────────*/
  .projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
    gap: var(--space-md);
    list-style: none;
    padding: 0;
    margin-top: var(--space-sm);
  }
  .project-card {
    background: var(--clr-panel-bg);
    border: 1px solid var(--clr-border);
    border-radius: 0.5rem;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .project-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
  }
  .project-header {
    background: var(--clr-primary);
    color: #fff;
    padding: var(--space-sm);
  }
  .project-image img {
    width: 100%;
    display: block;
  }
  .project-body {
    flex: 1;
    padding: var(--space-sm);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .project-body p {
    margin: 0.5rem 0;
    font-size: 0.9rem;
    color: #555;
  }
  .project-body a.w3-button {
    align-self: start;
    background: var(--clr-accent);
    color: #fff;
  }
  .project-body a.w3-button:hover {
    background: #0F766E; /* slightly darker teal */
  }

  /*────────────────────────────────────────────────*/
  /* Certificates Section                          */
  /*────────────────────────────────────────────────*/
  .certificates-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: var(--space-md);
    list-style: none;
    padding: 0;
    margin-top: var(--space-sm);
  }
  .certificate-card {
    background: var(--clr-panel-bg);
    border: 1px solid var(--clr-border);
    border-radius: 0.5rem;
    padding: var(--space-sm);
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .certificate-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
  }
  .certificate-card img {
    max-width: 80px;
    margin-bottom: var(--space-sm);
    border-radius: 0.25rem;
  }
  .certificate-name {
    font-weight: 600;
    color: var(--clr-primary);
    margin-bottom: 0.25rem;
  }
  .certificate-issuer {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 0.25rem;
  }
  .certificate-date {
    font-size: 0.8rem;
    color: #777;
    margin-bottom: var(--space-sm);
  }

  /*────────────────────────────────────────────────*/
  /* Contact Section                               */
  /*────────────────────────────────────────────────*/
  .contact-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-md);
    align-items: start;
  }
  .contact-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
  }
  .contact-icon {
    font-size: 1.5rem;
    color: var(--clr-accent);
    width: 2.5rem; height: 2.5rem;
    display: flex; align-items: center; justify-content: center;
    background: rgba(20,184,166,0.1);
    border-radius: 50%;
  }
  .contact-text {
    font-size: 1rem;
  }
  .contact-text a {
    color: var(--clr-primary);
    font-weight: 500;
    text-decoration: none;
  }
  .contact-text a:hover {
    text-decoration: underline;
  }

  /*────────────────────────────────────────────────*/
  /* Responsive adjustments                        */
  /*────────────────────────────────────────────────*/
  @media (max-width: 600px) {
    .projects-grid { grid-template-columns: 1fr; }
    .skill-list { grid-template-columns: repeat(auto-fit, minmax(100px,1fr)); }
    .certificates-grid { grid-template-columns: 1fr; }
    .contact-section { grid-template-columns: 1fr; }
  }
</style>
@endpush

@section('content')

  {{-- About Me --}}
  <section class="section-panel about-section">
    <h2>About Me!</h2>
    <p>
      Quisque felis ex, pellentesque vel elementum eu, bibendum vel massa. Donec id feugiat 
      erat. Aliquam commodo rutrum velit, vitae vestibulum purus ullamcorper vestibulum. Orci 
      varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </p>
  </section>

  {{-- Skills --}}
  <section class="section-panel">
    <h2>My Skills</h2>
    <ul class="skill-list">
      @foreach ($skills as $skill)
        <li class="skill-item">
          @if ($skill->image)
            <img src="{{ asset('storage/'.$skill->image) }}" alt="{{ $skill->title }}">
          @endif
          <div class="skill-title">{{ $skill->title }}</div>
        </li>
      @endforeach
    </ul>
  </section>

  {{-- Projects --}}
  <section class="section-panel">
    <h2>Projects</h2>
    <ul class="projects-grid">
      @foreach ($projects as $project)
        <li class="project-card">
          <div class="project-header">
            <h3>{{ $project->title }}</h3>
          </div>
          @if ($project->image)
            <div class="project-image">
              <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
            </div>
          @endif
          <div class="project-body">
            <div>
              @if ($project->url)
                <p>
                  View Project: 
                  <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
                </p>
              @endif
              <p>
                Posted: {{ $project->created_at->format('M j, Y') }}<br>
                Type: {{ $project->type->title }}
              </p>
            </div>
            <a href="{{ url('project/'.$project->slug) }}" class="w3-button w3-green">
              View Details
            </a>
          </div>
        </li>
      @endforeach
    </ul>
  </section>

  {{-- Certificates --}}
  <section class="section-panel certificates-section">
    <h2>Certificates</h2>
    <ul class="certificates-grid">
      @forelse($certificates as $cert)
        <li class="certificate-card">
          @if($cert->image)
            <img src="{{ asset('storage/'.$cert->image) }}" alt="{{ $cert->name }}">
          @endif
          <div class="certificate-name">{{ $cert->name }}</div>
          <div class="certificate-issuer">{{ $cert->issuer }}</div>
          <div class="certificate-date">{{ $cert->date_awarded->format('M j, Y') }}</div>
          @if($cert->description)
            <p>{{ $cert->description }}</p>
          @endif
        </li>
      @empty
        <li>No certificates yet.</li>
      @endforelse
    </ul>
  </section>

  {{-- Contact Me --}}
  <section class="section-panel contact-section">
    <div class="contact-item">
      <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
      <div class="contact-text">
        <strong>Phone</strong><br>
        (111) 222‑3333
      </div>
    </div>
    <div class="contact-item">
      <div class="contact-icon"><i class="fas fa-envelope"></i></div>
      <div class="contact-text">
        <strong>Email</strong><br>
        <a href="mailto:email@address.com">email@address.com</a>
      </div>
    </div>
  </section>

@endsection
