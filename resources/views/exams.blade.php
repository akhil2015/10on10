@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Published Examinations</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                    <thead class="thead">
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">code</th>
                          <th scope="col">test_id</th>
                          <th scope="col">Published on</th>
                          <th scope="col">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                              <td>{{$value->id}}</td>
                              <td>{{$value->code}}</td>
                              <td>{{$value->test_id}}</td>
                              <td>{{$value->created_at}}</td>
                              <td><a href="./exams/{{$value->code}}/result"><button class="btn btn-primary">Results</button></a></td>
                              
                        </tr>
                        @endforeach
                    </tbody>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
