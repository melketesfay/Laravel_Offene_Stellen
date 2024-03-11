<h1>Offene Stellen</h1>
@foreach($topics as $topic)

<h1><a href="/listings/{{$topic['id']}}">{{$topic['company']}}</a></h1>
<p>{{$topic['title']}}</p>

@endforeach