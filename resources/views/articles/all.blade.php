@extends ('layout')

@section ('content')
@foreach ($articles as $article)
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}}</h2>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{{$article->body}}
		</div>
	</div>
</div>
@endforeach
@endsection