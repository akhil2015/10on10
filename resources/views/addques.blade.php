@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD QUESTION</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="addques" >
                      <h1>{{$data}}</h1>
                      <form name="addques" action="{{route('teacher.question.add.submit',$data)}}" method="POST">
                        {{ csrf_field() }}
                        <label class="col-md-4 control-label" for="question">Question</label>
                        <input name="question" type="text" class="form-control input-md">
                        <label class="col-md-4 control-label" for="option1">option 1</label> 
                        <input name="option1" type="text" class="form-control input-md">
                        <label class="col-md-4 control-label" for="option1">option 2</label> 
                        <input name="option2" type="text" class="form-control input-md">
                        <label class="col-md-4 control-label" for="option1">option 3</label> 
                        <input name="option3" type="text" class="form-control input-md">
                        <label class="col-md-4 control-label" for="option1">option 4</label> 
                        <input name="option4" type="text" class="form-control input-md">
                        <label class="col-md-4 control-label" for="option1">Correct option </label> 
                        <input name="correct" type="number" class="form-control input-md">
                        <div class="form-group">
                              <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Add</button>
                              </div>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
