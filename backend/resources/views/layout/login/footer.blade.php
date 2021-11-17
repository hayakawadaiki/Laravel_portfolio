@section('footer')
<footer class="mastfoot mt-auto">
  <div class="inner">
    <p>
      <a href="https://twitter.com/home?lang=ja" target="_blank" rel="noopener noreferrer"
        style="text-decoration: none;">
        <i class="fab fa-twitter fa-2x mx-2"></i>
      </a>
      <a href="https://line.me/ti/p/2U_aPHuZUH" target="_blank" rel="noopener noreferrer"
        style="text-decoration: none;">
        <i class=" fab fa-line fa-2x mx-2"></i>
      </a>
    </p>
  </div>
</footer>

{{-- Bootstrap js CDN --}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
  integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
  integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
</script>
{{-- js --}}
<script src="{{ asset('/js/login.js') }}"></script>

@endsection
