@extends('layouts.admin')
@section('content')
<div class="container-fluid my-4">
    <form action="{{ route('admin.types.update', ['type' => $type['slug']])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="" class="form-label">modifica name</label>
          <input value="{{ old('name') ?? $type['name'] }}" type="text" class="form-control" id="" aria-describedby="" name="name">
          @error('name')
          <div class="alert alert-danger mt-2">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salva modifiche</button>
        </div>
      </form>
</div>
@endsection