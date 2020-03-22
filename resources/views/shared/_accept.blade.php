@can('accept',$model)
    <a href="" title='Mark this as Best model'
        class="{{ $model->status }} mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-model-{{ $model->id }}').submit();"
        >
        <i class="fa-check fas fa-2x">ac:{{ $model->status }}</i>
    </a>
    <form action="{{route('answers.accept', $model->id)}}" id="accept-model-{{$model->id}}" method="POST" style="display:none">
        @csrf
    </form>
@else
    @if($model->is_best)
    <a href="" title='The question owner accepted this as Best model'
        class="{{ $model->status }} mt-2"
        >
        <i class="fa-check fas fa-2x">ac:{{ $model->status }}</i>
    </a>
    @endif
@endcan