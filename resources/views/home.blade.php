@extends('layouts.app')

@section('content')
<div class="profile card">
  <div class="card-title">
    User Details
  </div>
  <div class="card-content">
    <img src="{{ asset('./images/propic.png')}}" class="propic" alt="">
    <ul class="details">
        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
        <li><strong>Registered email-id:</strong>{{ Auth::user()->email }}</li>
        <li><strong>Mobile no.: </strong>{{ Auth::user()->mobile }}</li>
        <li><strong>Institute:</strong> {{Auth::user()->institute}}  </li>
    </ul>
                    <form class="form-inline" action="{{ route('user.update.name') }}" method="POST">
                            {{ csrf_field() }}

                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              <div class="">
                              <input id="name" name="name" placeholder="New Name" class="form-control input-md" required="" type="text">
                              
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>

                            </fieldset>
                    </form> <br>
                    <form class="form-inline" action="{{ route('user.update.email') }}" method="POST">
                            {{ csrf_field() }}

                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              
                              <div class="">
                              <input id="email" name="email" placeholder="New Email" class="form-control input-md" required="" type="text">
                                
                              
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>

                            </fieldset>
                    </form> <br>
                    <form class="form-inline" action="{{ route('user.update.mobile') }}" method="POST">
                            {{ csrf_field() }}

                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                              
                              <div class="">
                              <input id="mobile" name="mobile" placeholder="New Mobile" class="form-control input-md" required="" type="text">
                                
                             
                            
                                <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                              </div>
        

                            </fieldset>
                    </form> <br>
                    <form class="form-inline" action="{{ route('user.update.institute') }}" method="POST">
                            {{ csrf_field() }}

                            <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                
                              <div class="">
                              <input id="institute" name="institute" placeholder="New Institute" class="form-control input-md" required="" type="text">
                              
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>

                            </fieldset>
                    </form>
  </div>  
  </div>
<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User's Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                     <form class="form-inline" action="{{route('user.exam.value')}}" method="post" >
                      {{ csrf_field() }}
                            <fieldset>
                            <legend>Enter Examination Dashboard</legend>
                            <!-- Text input-->
                            <div class="row">
                              <label class="control-label" for="code">Enter Exam code : </label>  
                              <input id="code" name="code" placeholder="" class="form-control input-md" required="" type="text">
                              <button type="submit" class="btn btn-primary">Enter</button>
                            </div>

                            </fieldset>
                    </form>
                    <form class="form-inline" action="{{route('user.result.value')}}" method="post" >
                      {{ csrf_field() }}
                            <fieldset>
                            <legend>Results</legend>
                            <!-- Text input-->
                            <div class="row">
                              <label class="control-label" for="code2">Enter Exam code : </label>  
                              <input id="code2" name="code2" placeholder="" class="form-control input-md" required="" type="text">
                              <button type="submit" class="btn btn-primary">Enter</button>
                            </div>

                            </fieldset>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
