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
                    <a title='This question is useful' href="" class="vote-up">
                        <i class="fa-caret-up fas fa-3x">UP</i>
                    </a>
                    <span class="vote-count">1230</span>
                    <a title='The question is not useful' href="" class="vote-down off">
                    <i class="fa-star fas fa-3x">DOWN</i>
                    </a>
                    <a href="" title='Click to mark as favorite question (Clickagain to undo)' class="favorite mt-2 favorited">
                    <i class="fa-caret-up fas fa-2x">STAR</i>
                        <span class="favorites-count">234</span>
                    </a>
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
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$question->answers_count. " " . Str::plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                        <div class="media">
                                    <div class="flex-column d-flex vote-controls">
                                <a title='This answer is useful' href="" class="vote-up">
                                    <i class="fa-caret-up fas fa-3x">UP</i>
                                </a>
                                <span class="vote-count">1230</span>
                                <a title='The answer is not useful' href="" class="vote-down off">
                                <i class="fa-caret-down fas fa-3x">DOWN</i>
                                </a>
                                <a href="" title='Mark this as Best answer' class="vote-accepted mt-2">
                                <i class="fa-check fas fa-2x">STAR</i>
                                </a>
                        </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">Answered  {{$answer->created_date}}</span>
                                    <div class="media mt-2">
                                        <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->url}}" alt="">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url}}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
