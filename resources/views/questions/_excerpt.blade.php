<div class="media post">
    <div class="d-flex flex-column counters">
        <div class="votes">
            <strong>{{ $question->votes_count }}</strong> {{Str::plural('votes_count', $question->votes_count)}}
        </div>
        <div class="status {{ $question->status}}">
            <strong>{{ $question->answers_count }}</strong> {{Str::plural('answers', $question->answers_count)}}
        </div>
        <div class="view">
            {{ $question->views. " " . Str::plural('view', $question->views)}}
        </div>
    </div>
    <div class="media-body">
            <div class="d-flex align-items-center">
                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                <div class="ml-auto">
                    @can('update',$question))
                    <a href="{{ route('question.edit', $question->id) }}" class="btn-sm btn btn-outline-info">Edit</a>
                    @endcan
                    @can('delete',$question))
                    <form class='form-delete' action="{{route('question.destroy',$question->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn-outline-danger btn btn-sm" onlcick="return confirm('Are you sure!')">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
            <p class="lead">
            Asked by
            <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        <div class="excerpt">{{ $question->excerpt }}
        </div>
    </div>
</div>