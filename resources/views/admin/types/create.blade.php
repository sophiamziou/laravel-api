@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <form action="{{route('admin.types.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Aggiungi name</label>
          <input type="text" class="form-control" id="" aria-describedby="" name="name">
          @error('name')
          <div class="alert alert-danger mt-2">{{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crea un nuovo tipo di progetto</button>
        </div>
      </form>
</div>
@endsection