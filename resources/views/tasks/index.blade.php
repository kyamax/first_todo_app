@extends('layouts.default')
@section('title', 'TODOリスト')

@section('content')

<div class="todo-form">
  

  @foreach($tasks as $task)
  <div class="all-tasks">{{ $task->title }}</div>
  <div class="all-tasks">{{ $task->text }}</div>
  <div class="all-tasks">{{ $task->importance->name }}</div>
  <div class="all-tasks"></div>

  @endforeach
</div>

@endsection