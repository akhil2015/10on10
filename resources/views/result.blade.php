@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Result CODE: {{ $data[0]->code}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table">
                    <thead class="thead">
                        <tr>
                          <th scope="col">Email</th>
                          <th scope="col">Marks</th>
                          <th scope="col">Attempted</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                              <td>{{$value->email}}</td>
                              <td>{{$value->correct}}/10</td>
                              <td>{{$value->attempted}}</td>
                             
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
