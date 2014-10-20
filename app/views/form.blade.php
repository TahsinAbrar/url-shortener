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
      {{ Form::open(array('url'=>'/','method' => 'post')) }}
        {{ Form::text('link', Input::old('link'), array('placeholder'=>'Insert your URL here and press enter!')) }}
      {{ Form::close() }}
  </div>
</body>
</html>