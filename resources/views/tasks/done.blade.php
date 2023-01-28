@extends('layouts.default')
@section('title')
@section('content')
<section class="vh-100">

  <div class="container col-md-7 col-xl-9 py-3">
    <a class="btn btn-danger btn-lg" href="{{ route('tasks.create') }}">TODOの追加</a>
  </div>



  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-md-12 col-xl-10">
        <div class="card">
          <div class="card-header p-3">
            <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>完了済みのTODO List</h5>
          </div>
          <div class="card-body h-auto" >
            <table class="table mb-0">
              <thead>
                <tr>
                  <th scope="col">未完了にする</th>
                  <th scope="col">TODO</th>
                  <th scope="col">Task</th>
                  <th scope="col">重要度</th>
                  <th scope="col">編集</th>
                  <th scope="col">削除</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr class="fw-normal">
                  <td class="align-middle">
                    <form action="{{ route('tasks.check', ['task' => $task->id]) }}" method="POST">
                      @csrf
                      @method("POST")
                      <button class="btn btn-outline-success flex-shrink-0 btn-sm">Undone</button>
                    </form>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
                  </td>
                  <td class="align-middle">{{ $task->importance->name }}</td>
                  <td class="align-middle">
                    <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit', ['task' => $task->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                  </td>
                  <td class="align-middle">
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="mt-3">
              {{ $tasks->links('pagination::bootstrap-5') }}
            </div>
          </div>
        
        </div>
        
      </div>
      
    </div>
  </div>
  
</section>
@endsection