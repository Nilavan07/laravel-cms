<style>
  :root {
    --clr-footer-bg:   #F9FAFB;
    --clr-panel-bg:    #FFFFFF;
    --clr-border:      #E5E7EB;
    --clr-primary:     #4F46E5;
    --clr-muted:       #6B7280;
    --clr-text:        #333333;
    --space-xs:        0.5rem;
    --space-sm:        1rem;
    --space-md:        1.5rem;
    --space-lg:        2rem;
  }

  .site-footer {
    background: var(--clr-footer-bg);
    border-top: 1px solid var(--clr-border);
    color: var(--clr-text);
    padding: var(--space-lg) var(--space-sm);
  }

  .footer-inner {
    max-width: 960px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: var(--space-md);
  }

  .footer-col h4 {
    margin-bottom: var(--space-sm);
    font-size: 1.1rem;
    color: var(--clr-text);
  }

  .footer-col p,
  .footer-col address {
    font-size: 0.9rem;
    line-height: 1.6;
    color: var(--clr-muted);
    margin: 0 0 var(--space-sm);
  }

  .footer-col ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-col ul li {
    margin-bottom: var(--space-xs);
  }
  .footer-col ul li a {
    color: var(--clr-muted);
    text-decoration: none;
    transition: color 0.2s;
  }
  .footer-col ul li a:hover {
    color: var(--clr-primary);
  }

  .footer-social {
    display: flex;
    gap: var(--space-sm);
    margin-top: var(--space-xs);
  }
  .footer-social a {
    color: var(--clr-primary);
    font-size: 1.25rem;
    transition: color 0.2s;
  }
  .footer-social a:hover {
    color: var(--clr-text);
  }

  .footer-bottom {
    text-align: center;
    font-size: 0.85rem;
    color: var(--clr-muted);
    margin-top: var(--space-lg);
  }

  @media (max-width: 600px) {
    .footer-inner {
      grid-template-columns: 1fr;
      text-align: center;
    }
    .footer-social {
      justify-content: center;
    }
  }
</style>

<footer class="site-footer">
  <div class="footer-inner">

    {{-- About --}}
    <div class="footer-col">
      <h4>My Portfolio</h4>
      <p>A showcase of my projects, skills, and certifications. Crafted with care and passion.</p>
      <div class="footer-social">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    {{-- Contact --}}
    <div class="footer-col">
      <h4>Contact</h4>
      <address>
        <strong>Email:</strong> <a href="mailto:email@address.com">email@address.com</a><br>
        <strong>Phone:</strong> (111) 222‑3333
      </address>
      <p>1234 Main Street<br>City, State 12345</p>
    </div>

    {{-- Legal --}}
    <div class="footer-col">
      <h4>Legal</h4>
      <ul>
        <li><a href="/privacy">Privacy Policy</a></li>
        <li><a href="/terms">Terms of Service</a></li>
      </ul>
    </div>

  </div>

  <div class="footer-bottom">
    &copy; {{ date('Y') }} All rights reserved.
  </div>
</footer>
