@extends('layout.console')

@section('content')
<section class="w3-padding">

    <h2>Update Certificate Image</h2>

    <form method="POST"
          action="/console/certificates/image/{{ $certificate->id }}"
          enctype="multipart/form-data"
          class="w3-margin-top">

      @csrf

      <div class="w3-margin-bottom">
        <label>Select New Image</label>
        <input type="file" name="image" class="w3-input w3-border" required>
        @error('image')<div class="w3-text-red">{{ $message }}</div>@enderror
      </div>

      <div class="w3-right">
        <a href="/console/certificates/list" class="w3-button w3-light-grey">
          Cancel
        </a>
        <button type="submit" class="w3-button w3-blue">
          Upload
        </button>
      </div>

    </form>

</section>
@endsection
