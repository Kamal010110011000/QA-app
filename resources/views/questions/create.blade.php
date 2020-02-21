@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-item-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <a href="{{ route('question.index') }}" class="btn btn-outline-secondary">Back To All Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="post">
                        <div class="form-group">
                            <label for="question-title">Question Title</label>
                            <input type="text" name="title" id="question-title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="question-body">Explain Your Question</label>
                            <textarea name="body" id="question-body" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-outline-primary btn btn-lg"> Ask Questions</button>
                        </div>
                    </form>
                </div>
                   
            </div>
        </div>
    </div>
</div>
@endsection
