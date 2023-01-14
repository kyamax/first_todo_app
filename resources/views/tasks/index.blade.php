@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')

<div class="todo-form">
  <a class="task-create" href="{{ route('tasks.create') }}">TODOの追加</a>
  

  @foreach($tasks as $task)
  <div class="all-tasks">{{ $task->title }}</div>
  <div class="all-tasks">{{ $task->text }}</div>
  <div class="all-tasks">{{ $task->importance->name }}</div>
  <a class="task-edit" href="{{ route('tasks.edit', ['task' => $task->id]) }}">編集</a>
  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button>削除</button>
  </form>
  <div class="all-tasks"></div>

  @endforeach
</div>

@endsection