@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')


<form action="{{ route('tasks.store') }}" method="POST">
  @csrf
  <label>TO DO</label>
  <input id="title" class="task_text" type="text" name="title" value="{{ old('title') }}">
  <label>内容</label>
  <input id="text" class="task_text" type="text" name="text" value="{{ old('text') }}">
  <label>重要度</label>
  <select name="importance_id">
    <option value="">選択してください</option>
    @foreach($importances as $importance)
    <option value="{{ $importance->id }}" @if($importance->id == old("importance_id")) selected @endif >{{ $importance->name }}</option>
    @endforeach
  </select>
  <button type="submit">追加</button>
</form>

@endsection