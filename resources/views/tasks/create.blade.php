@extends('layouts.default')
@section('title')

@section('content')

<form class="px-5" action="{{ route('tasks.store') }}" method="POST">
  @csrf
  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput" class="form-label">TODO</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="やること" name="title" value="{{ old('title') }}">
  </div>

  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput" class="form-label">内容</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="詳しい内容" name="text" value="{{ old('text') }}">
  </div>

  <div class="col-md-4 mt-3">
    <label for="formGroupExampleInput2" class="form-label">重要度</label>
    <select name="importance_id" class="form-select">
      <option value="">選択してください</option>
      @foreach($importances as $importance)
      <option value="{{ $importance->id }}" @if($importance->id == old("importance_id")) selected @endif >{{ $importance->name }}</option>
      @endforeach
    </select>
  </div>


  <button type="submit" class="btn btn-danger mt-3">追加</button>

</form>



@endsection