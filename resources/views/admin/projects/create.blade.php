@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-3">
                <div class="mb-3">
                    <label for="" class="form-label">Aggiungi title</label>
                    <input type="text" class="form-control" id="" aria-describedby="" name="title">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="control-label">Copertina</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                        <div class="text-danger">
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Aggiungi content</label>
                    <textarea rows="5" class="form-control" id="" aria-describedby="" name="content"></textarea>
                    @error('content')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Seleziona type</label>
                    <select name="type_id" id="type_id">
                        @foreach ($types as $item)
                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Seleziona technology</label>
                    @foreach ($techs as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}" name="techs[]">
                            <label class="form-check-label">
                                {{ $item['name'] }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Crea un nuovo progetto</button>
                </div>
        </form>
    </div>
@endsection
