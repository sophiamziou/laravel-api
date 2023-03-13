@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between m-3">
                    <h2>LISTA PROGETTI</h2>
                    <a href="{{ route('admin.projects.create') }}">
                        <button type="button" class="btn btn-primary">NEW</button>
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">content</th>
                            <th scope="col">type</th>
                            <th scope="col">technology</th>
                            <th scope="col">slug</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <th>{{ $project['id'] }}</th>
                                <td>{{ $project['title'] }}</td>
                                <td>{{ $project['content'] }}</td>
                                <td>{{ $project['type'] ? $project['type']['name'] : 'nessun tipo' }}</td>
                                <td>
                                    @forelse ($project['technologies'] as $tech)
                                        {{ $loop->first ? '' : ',' }}
                                        <span>{{ $tech['name'] }}</span>
                                    @empty
                                        <div>nessuna tech</div>
                                    @endforelse
                                </td>
                                </p>
                                <td>{{ $project['slug'] }}</td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <form
                                            action="{{ route('admin.projects.destroy', ['project' => $project['slug']]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger confirm-delete-button" type="submit"
                                                name="" id="" value="delete">
                                        </form>
                                        <a href="{{ route('admin.projects.show', ['project' => $project['slug']]) }}">
                                            <button type="button" class="btn btn-primary">view</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="container">
                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                        <div class="alert alert-primary text-center" role="alert">
                                            <h4 class="alert-heading mb-4">Il database dei tuoi Progetti è vuoto</h4>
                                            <p class="lead">Clicca sul pulsante "Aggiungi Progetti" per aggiungerli.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                        @include ('admin.partials.modals')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
