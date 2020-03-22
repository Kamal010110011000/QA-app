@if ($model instanceof App\Question)
    @php
        $name= 'question';
        $firstUriSerment = 'question';
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name= 'answer';
        $firstUriSerment = 'answers';
    @endphp
@endif

@php
    $formId = $name . "-" . $model->id;
    $formAction="/{$firstUriSerment}/{$model->id}/vote";
@endphp
<div class="flex-column d-flex vote-controls">
    <a title='This {{ $name }} is useful' href="" 
    class="vote-up {{ Auth :: guest() ? 'off' : '' }}"
    onclick="event.preventDefault(); document.getElementById('up-vote-{{$formId}}').submit();"
    >
        <i class="fa-caret-up fas fa-3x">UP</i>
    </a>
    <form action="{{$formAction}}" id="up-vote-{{$formId}}" method="POST" style="display:none">
    @csrf
    <input type="hidden" name="vote" value="1">
    </form>
    <span class="vote-count">{{$model->votes_count}}</span>
    <a title='The {{ $name }} is not useful' href="" 
    class="vote-down {{ Auth :: guest() ? 'off' : '' }}"
    onclick="event.preventDefault(); document.getElementById('down-vote-{{$formId}}').submit();"
    >
    <i class="fa-star fas fa-3x">DOWN</i>
    </a>
    <form action="{{$formAction}}" id="down-vote-{{$formId}}" method="POST" style="display:none">
    @csrf
    <input type="hidden" name="vote" value="-1">
    </form>
   @if ($model instanceof App\Question)
        @include ('shared._favorite', [
            'model' => $model
        ])
    @elseif ($model instanceof App\Answer)
            @include('shared._accept', [
                'model' => $model
            ])
    @endif
</div>