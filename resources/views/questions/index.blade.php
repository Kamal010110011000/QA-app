@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-item-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('question.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                @include ('layouts._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="votes">
                                    <strong>{{ $question->votes }}</strong> {{Str::plural('votes', $question->votes)}}
                                </div>
                                <div class="status {{ $question->status}}">
                                    <strong>{{ $question->answers }}</strong> {{Str::plural('answers', $question->answers)}}
                                </div>
                                <div class="view">
                                    {{ $question->views. " " . Str::plural('view', $question->views)}}
                                </div>
                            </div>
                            <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                        <div class="ml-auto">
                                           @if (Auth::user()->can('update-question',$question))
                                            <a href="{{ route('question.edit', $question->id) }}" class="btn-sm btn btn-outline-info">Edit</a>
                                            @endif

                                            @if (Auth::user()->can('delete-question',$question))
                                            <form class='form-delete' action="{{route('question.destroy',$question->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn-outline-danger btn btn-sm" onlcick="return confirm('Are you sure!')">Delete</button>
                                            </form>
                                            
                                            @endif
                                        </div>
                                        <div class="ml-auto">
                                       
                                            <a href="{{ route('question.edit', $question->id) }}" class="btn-sm btn btn-outline-info">Edit</a>
                                           
                                        
                                            <form class='form-delete' action="{{route('question.destroy',$question->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn-outline-danger btn btn-sm" onlcick="return confirm('Are you sure!')">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                    <p class="lead">
                                    Asked by
                                    <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ Str::limit($question->body,250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <div class="text_center">
                    {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
