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
                    <form action="{{route('urls.create')}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                             @csrf
                    <div class="form-group">
                      <label for="longlink">Add the Url</label>
                      <input type="text" name="longlink" id="longlink" value="{{ old('longlink') }}"
                        class="form-control"  aria-describedby="helpId" placeholder="https://google.com">
                         
                        @if ($errors->has('longlink'))
                        <span class="text-danger text-left">{{ $errors->first('longlink') }}</span>
                    @endif
                    <hr>
                    </div>
                        <div class="float-sm-right"> 
                        <button type="submit"  class="btn btn-primary btn-sm btn-lg btn-block">Submit</button>
                         </div>   
                    </form>
                    

                    <hr>

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
                            <td ><a href="{{ route('urls.show', ['id' => $items->id,'longlink'=>$items->longlink]) }}">
                                {{$items->shortlink}}
                                 </a> </td>
                            <td>{{$items->title}}</td>
                            
                                <td><a href="{{ route('urls.show', ['id' => $items->id,'longlink'=>$items->longlink]) }}">
                                {{$items->longlink}}
                                 </a> 
                             </td>
                            <td>{{$items->counter}}</td>
                            <td> 
                                <a href="{{route('edit', ['id' => $items->id])}}" class="btn btn-primary" title="Editar este registro">
                                    <i class="fa fa-edit">Edit</i>
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
