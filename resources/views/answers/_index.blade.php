<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$answersCount. " " . Str::plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')

                    @foreach($answers as $answer)
                        <div class="media">
                                    <div class="flex-column d-flex vote-controls">
                                <a title='This answer is useful' href="" class="vote-up">
                                    <i class="fa-caret-up fas fa-3x">UP</i>
                                </a>
                                <span class="vote-count">1230</span>
                                <a title='The answer is not useful' href="" class="vote-down off">
                                <i class="fa-caret-down fas fa-3x">DOWN</i>
                                </a>
                                <a href="" title='Mark this as Best answer' class="{{ $answer->status }} mt-2">
                                <i class="fa-check fas fa-2x">{{ $answer->status }}</i>
                                </a>
                        </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                    <div class="ml-auto">
                                           @can ('update',$answer)
                                            <a href="{{ route('question.answers.edit', [$question->id,$answer->id] ) }}" class="btn-sm btn btn-outline-info">Edit</a>
                                            @endcan
                                            @can ('delete', $answer)
                                            <form class='form-delete' action="{{route('question.answers.destroy',[$question->id,$answer->id])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn-outline-danger btn btn-sm" onlcick="return confirm('Are you sure!')">Delete</button>
                                            </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
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
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>