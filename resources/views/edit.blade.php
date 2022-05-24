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

                   
    
             <form action="{{route('counter', ['id' => $datas->id])}}" id="form-general" class="form-horizontal form--label-right" method="POST" autocomplete="off">
                @csrf @method("put")         
                    
                    <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" value="{{$datas->title}}" name="title" aria-describedby="emailHelp" placeholder="Title">Title of the web.</small>
                        </div>
                        <div class="form-group">
                            <label for="link-url">Url</label>
                            <input type="text" class="form-control" value="{{$datas->longlink}}" name="longlink"  >
                        </div>
                        <div class="form-group">
                            <label for="link-url">Short-Link</label>
                            <input type="text" class="form-control" value="{{$datas->shortlink}}" name="shortlink"  >
                        </div>
                             
                        <div class="form-group">
                            <label for="link-url">Visit Number</label>
                             <input type="text" readonly="true" class="form-control" value="{{$datas->counter+1}}" name="counter"  >
                        </div>
                        

                               

                            <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Return</button>
                       
                           </div>    
                                         @csrf   @method("put")
                                    
                                                                                    
                           </form>

                  
                       
                  
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
