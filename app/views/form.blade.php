<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>URL Shortener</title>
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"/>
</head>
<body>
  <div id="container">
      <h2>URL Shortener</h2>

      @if(Session::has('errors'))
      <h3 class="error">{{ $errors->first('link') }}</h3>
      @endif

      @if(Session::has('link'))
      <h3 class="success">
      {{ HTML::link(Session::get('link'), 'Click here for your shorten URL') }}
      </h3>
      @endif

      {{ Form::open(array('url'=>'/','method' => 'post')) }}
        {{ Form::text('link', Input::old('link'), array('placeholder'=>'Insert your URL here and press enter!')) }}
        {{ Form::submit('Submit') }}
      {{ Form::close() }}
  </div>
</body>
</html>