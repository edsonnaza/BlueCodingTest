@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Short Links</th>
                            <th scope="col">Title</th>
                            <th scope="col">Links</th>
                            <th scope="col">Counter</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $items)
                                                  
                            <tr>
                            <td scope="row">{{$items->id}} </td>
                            <td >{{$items->shortlink}}</td>
                             <td>{{$items->title}}</td>
                            <td>{{$items->longlink}}</td>
                            <td>{{$items->counter}}</td>
                            <td> 
                                <a href="{{route('edit', ['id' => $items->id])}}" class="btn btn-primary" title="Editar este registro">
                                    <i class="fa fa-edit">Open to Share</i>
                                </a>
                                                                                    
                            </td>
                            </tr>

                         @endforeach
                        </tbody>
                    </table>
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
