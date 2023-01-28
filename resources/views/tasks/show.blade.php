@extends('layouts.default')
@section('title')
@section('content')
<section class="vh-100">

  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-md-12 col-xl-10">
        <div class="card">
          <div class="card-header p-3" style="display: flex; justify-content: space-between;">
            <div class="right-btn">
              <form action="{{ route('tasks.check', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method("POST")

                @if($task->check == true)
                  <button class="btn btn-outline-success flex-shrink-0 btn-md">Undone</button>
                @else
                  <button class="btn btn-outline-success flex-shrink-0 btn-md">Done</button>
                @endif
              </form>
            </div>
            <div class="left-btn" style="display: flex;">
              <div class="edit-btn px-1">
                <a class="btn btn-primary btn-sm " href="{{ route('tasks.edit', ['task' => $task->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
              </div>
              <div class="del-btn px-1">
                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                </form>
              </div>
            </div>
          </div>

          <div class="card-body h-auto" >
            <div class="col-mb-0 mt-4 border-bottom">
              <h3 class="form-label">TODO</h3>
              <div class="fs-5 px-4"> {{$task->title }}</div>
            </div>

            <div class="col-mb-0 mt-5 border-bottom">
              <h3 class="form-label">内容</h3>
              <div class="fs-5 px-4"> {{$task->text }}</div>
            </div>

            <div class="col-mb-0 mt-5">
              <h4 class="form-label">重要度</h4>
              <div class="fs-5 px-4"> {{$task->importance->name }}</div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
</section>
@endsection