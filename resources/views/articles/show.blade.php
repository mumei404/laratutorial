@extends('layout')

@section('content')
	<h1>{{ $article->title }}</h1>
	<hr />
	<article>
		<div class="body">
			{{ $article->body }}
		</div>
	</article>

	<br />

	<div>
		@unless ($article->tags->isEmpty())
			<h5>Tags:</h5>
			<ul>
				@foreach($article->tags as $tag)
					<li>{{ $tag->name }}</li>
				@endforeach
			</ul>
		@endunless

		@auth
			<a href="{{ action('ArticlesController@edit', [$article->id]) }}" class="btn btn-primary">
				編集
			</a>

			{!! delete_form(['articles', $article->id]) !!}
		@endauth

		<a href="{{ action('ArticlesController@index') }}" class="btn btn-secondary float-right">
			一覧へ戻る
		</a>
	</div>
@endsection
