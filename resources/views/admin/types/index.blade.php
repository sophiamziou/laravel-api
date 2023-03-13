@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between m-3">
                    <h2>LISTA TIPI DI PROGETTO</h2>
                    <a href="{{ route('admin.types.create')}}">
                        <button type="button" class="btn btn-primary">NEW</button>
                    </a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">slug</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                          <tr>
                            <th>{{$type['id']}}</th>
                            <td>{{$type['name']}}</td>
                            <td>{{$type['slug']}}</td>
                            <td>
                              <div class="d-flex gap-3">
                                <form action="{{route('admin.types.destroy', ['type' => $type['slug']])}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <input class="btn btn-danger confirm-delete-button" type="submit" name="" id="" value="delete">
                                </form>
                                <a href="{{ route('admin.types.show',['type' => $type['slug']])}}">
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
                                          <h4 class="alert-heading mb-4">Il database dei tuoi Tipi di progetto è vuoto</h4>
                                          <p class="lead">Clicca sul pulsante "Aggiungi Tipi di progetto" per aggiungerli.</p>
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