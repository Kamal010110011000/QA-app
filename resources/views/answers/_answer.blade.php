<div class="media post">
    @include('shared._vote', [
        'model' => $answer
    ])

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
                @include ('shared._author',[
                    'model' =>$answer,
                    'label' =>'answered',
                ])
            </div>
        </div>
    </div>
</div>