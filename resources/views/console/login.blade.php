@extends('layout.console')
<style>
  .login-wrapper {
    display: flex;
    justify-content: center;
    padding: 2rem 1rem;
  }

  .login-card {
    width: 100%;
    max-width: 400px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 0.75rem;
    box-shadow:
      0 4px 6px rgba(0,0,0,0.05),
      0 2px 4px rgba(0,0,0,0.06);
  }

  .login-header {
    background: var(--clr-primary);
    color: #fff;
    padding: 1rem;
    border-top-left-radius: 0.75rem;
    border-top-right-radius: 0.75rem;
    font-size: 1.25rem;
    text-align: center;
  }

  .login-body {
    padding: 1.5rem;
  }

  .login-body label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--clr-text);
  }

  .login-body .w3-input {
    width: 100%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid var(--clr-border);
    border-radius: 0.375rem;
  }

  .login-body .error-text {
    margin-top: -0.75rem;
    margin-bottom: 1rem;
    color: #e53e3e;
    font-size: 0.875rem;
  }

  .login-body .submit-btn {
    width: 100%;
    padding: 0.75rem;
    background: var(--clr-accent);
    color: #fff;
    border: none;
    border-radius: 0.375rem;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
  }
  .login-body .submit-btn:hover {
    background: #0f766e;
  }
</style>

@section('content')
<div class="login-wrapper">

  <div class="login-card">
    <div class="login-header">
      Console Login
    </div>

    <div class="login-body">
      <form method="POST" action="/console/login" novalidate>
        @csrf

        {{-- Email --}}
        <label for="email">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          class="w3-input"
          value="{{ old('email') }}"
          required
        >
        @if ($errors->first('email'))
          <div class="error-text">{{ $errors->first('email') }}</div>
        @endif

        {{-- Password --}}
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          class="w3-input"
          required
        >
        @if ($errors->first('password'))
          <div class="error-text">{{ $errors->first('password') }}</div>
        @endif

        {{-- Submit --}}
        <button type="submit" class="submit-btn">Log In</button>
      </form>
    </div>
  </div>

</div>

@include('partials.footer')

@endsection
