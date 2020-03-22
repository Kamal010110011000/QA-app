<a href="" title='Click to mark as favorite {{ $name }} (Clickagain to undo)' 
    class="favorite mt-2 {{Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited': '') }}"
    onclick="event.preventDefault(); document.getElementById('favorite-{{ $name }}-{{ $model->id }}').submit();"
    >
        <i class="fa-caret-up fas fa-2x">STAR</i>
        <span class="favorites-count">{{$model->favorites_count}}</span>
</a>
<form action="/{{ $firstUriSerment }}/{{$model->id}}/favorites" id="favorite-{{ $name }}-{{ $model->id }}" method="POST" style="display:none">
@csrf
@if($model->is_favorited)
    @method ('DELETE')
@endif
</form>