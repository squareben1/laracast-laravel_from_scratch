@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
	<div id="content">
		@foreach ($articles as $article)
			
				<div class="title">
					<h2><a href="/articles/{{$article->id}}">{{$article->title}}</a></h2>
				<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
				<h3><p><a href="/articles/{{$article->id}}">{{$article->excerpt}}</a></p></h3>
						

			</div>
			@endforeach
	</div>
</div>
</div>

@endsection