@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-item-center">
                        <h1>{{ $question->title}}</h1>
                        <div class="ml-auto">
                            <a href="{{ route('question.index') }}" class="btn btn-outline-secondary">Back To All Questions</a>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="media">
                    <div class="flex-column d-flex vote-controls">
                    <a title='This question is useful' href="" 
                    class="vote-up {{ Auth :: guest() ? 'off' : '' }}"
                    onclick="event.preventDefault(); document.getElementById('up-vote-question-{{ $question->id }}').submit();"
                    >
                        <i class="fa-caret-up fas fa-3x">UP</i>
                    </a>
                    <form action="/question/{{$question->id}}/vote" id="up-vote-question-{{ $question->id }}" method="POST" style="display:none">
                    @csrf
                    <input type="hidden" name="vote" value="1">
                    </form>
                    <span class="vote-count">{{$question->votes}}</span>
                    <a title='The question is not useful' href="" 
                    class="vote-down {{ Auth :: guest() ? 'off' : '' }}"
                    onclick="event.preventDefault(); document.getElementById('down-vote-question-{{ $question->id }}').submit();"
                    >
                    <i class="fa-star fas fa-3x">DOWN</i>
                    </a>
                    <form action="/question/{{$question->id}}/vote" id="down-vote-question-{{ $question->id }}" method="POST" style="display:none">
                    @csrf
                    <input type="hidden" name="vote" value="-1">
                    </form>
                    <a href="" title='Click to mark as favorite question (Clickagain to undo)' 
                    class="favorite mt-2 {{Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited': '') }}"
                    onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit();"
                    >
                        <i class="fa-caret-up fas fa-2x">STAR</i>
                        <span class="favorites-count">{{$question->favorites_count}}</span>
                    </a>
                    <form action="/question/{{$question->id}}/favorites" id="favorite-question-{{ $question->id }}" method="POST" style="display:none">
                    @csrf
                    @if($question->is_favorited)
                        @method ('DELETE')
                    @endif
                    </form>
                </div>
                    <div class="media-body">
                        {!! $question->body_html !!}
                        <div class="float-right">
                            <span class="text-muted">Answered  {{$question->created_date}}</span>
                            <div class="media mt-2">
                                <a href="{{$question->user->url}}" class="pr-2">
                                    <img src="{{$question->user->url}}" alt="">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $question->user->url}}">{{ $question->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @include ('answers._index',[
        'answers' => $question->answers,
        'answersCount'=> $question->answers_count,
    ])
    @include ( 'answers._create')
</div>
@endsection
