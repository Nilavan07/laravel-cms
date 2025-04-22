@extends('layout.console')

@section('content')
<section class="w3-padding">

    <h2>New Certificate</h2>

    <form method="POST"
          action="/console/certificates/add"
          enctype="multipart/form-data"
          class="w3-margin-top">

      @csrf

      <div class="w3-margin-bottom">
        <label>Name</label>
        <input type="text" name="name"
               value="{{ old('name') }}"
               class="w3-input w3-border" required>
        @error('name')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-margin-bottom">
        <label>Issuer</label>
        <input type="text" name="issuer"
               value="{{ old('issuer') }}"
               class="w3-input w3-border" required>
        @error('issuer')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-margin-bottom">
        <label>Date Awarded</label>
        <input type="date" name="date_awarded"
               value="{{ old('date_awarded') }}"
               class="w3-input w3-border" required>
        @error('date_awarded')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-margin-bottom">
        <label>Description</label>
        <textarea name="description" rows="3"
                  class="w3-input w3-border">{{ old('description') }}</textarea>
        @error('description')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-margin-bottom">
        <label>Image (optional)</label>
        <input type="file" name="image" class="w3-input w3-border">
        @error('image')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-right">
        <a href="/console/certificates/list" class="w3-button w3-light-grey">
          Cancel
        </a>
        <button type="submit" class="w3-button w3-blue">
          Create
        </button>
      </div>

    </form>

</section>
@endsection
