@extends('app')

@section('content')
<div class="container w-50 border p-4 mt-4">
    <form action="{{ route('todos-update', ['id' => $todo->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        @if(session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <div class="mb-3">
            <label for="title" class="form-label">Titulo de la tarea</label>
            <input type="text" name='title' class="form-control" value="{{$todo->title}}">
        </div>

        <label for="category_id" class="form-label">Categoria de la tarea</label>
        <select name="category_id" id="category_id" class="form-select mb-3">
            @foreach ($categories as $category)
            <option value="{{$category->id}}" @if($todo->category_id === $category->id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

@endsection