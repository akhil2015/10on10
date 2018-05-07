@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Result</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 align="center" class="score"> You have scored {{ $data[0]->correct}}/10. </h1>
                    <p align="center">
                        Attempted: {{ $data[0]->attempted}}<br>
                        correct: {{ $data[0]->correct}} <br>
                        wrong: {{ $data[0]->incorrect}}
                    </p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
