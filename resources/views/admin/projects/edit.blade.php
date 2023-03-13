@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('admin.projects.update', ['project' => $project['slug']]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label">modifica title</label>
                <input value="{{ old('title') ?? $project['title'] }}" type="text" class="form-control" id=""
                    aria-describedby="" name="title">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group my-3">
                    <label class="control-label">Copertina</label>
                    <div>
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="w-50">
                    </div>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control
                    @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">modifica descrizione</label>
                <textarea rows="5" class="form-control" id="" aria-describedby="" name="content">{{ old('content') ?? $project['content'] }}</textarea>
                @error('content')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Seleziona type</label>
                <select name="type_id" id="type_id">
                    @foreach ($types as $item)
                        <option value="{{ $item['id'] }}"
                            {{ $item['id'] == old('type_id', $project['type_id']) ? 'selected' : '' }}>{{ $item['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Seleziona technology</label>
                @foreach ($techs as $item)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}" name="techs[]"
                                {{ in_array($item['id'], old('techs', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $item['name'] }}
                            </label>
                        @else
                            <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}" name="techs[]"
                                {{ $project['technologies']->contains($item) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $item['name'] }}
                            </label>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salva modifiche</button>
            </div>
        </form>
    </div>
@endsection
