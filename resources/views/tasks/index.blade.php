@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')

<div class="todo-form">
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input id="title" class="task_text" type="text" name="text" value="{{ old('text') }}">
    <button type="submit">追加</button>
  </form>
</div>

@endsection