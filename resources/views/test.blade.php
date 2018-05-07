@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test Editor</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p class="test_head">Test ID : {{$data[0]->test_id}}
                    <a href="{{route('teacher.question.add',$data[0]->id)}}">
                    <button type="submit" class="btn btn-primary">Add</button>
                    </a>
                    <button type="submit" class="btn btn-primary">import</button>
                    </p>
                    <h2 align="center">Questions: </h2>
                    @for ($i = 0; $i < sizeof($data); $i++)
                    <div class="question">
                      <p>
                        <h3>Q{{ $i+1}}. {{$data[$i]->question}}</h3>
                      </p>
                      <ul class="opt">
                        <li>{{$data[$i]->opt1}}</li>
                        <li>{{$data[$i]->opt1}}</li>
                        <li>{{$data[$i]->opt1}}</li>
                        <li>{{$data[$i]->opt1}}</li>
                      </ul>
                      <h5 class="green">Correct option:{{$data[$i]->correct}}</h5>
                    </div>
                     @endfor
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
