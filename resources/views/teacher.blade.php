@extends('layouts.app')

@section('content')
<div class="profile card">
  <div class="card-title">
    Teacher Details
  </div>
  <div class="card-content">
    <img src="{{ asset('./images/propic.png')}}" class="propic" alt="">
    <ul class="details">
        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
        <li><strong>Registered email-id:</strong>{{ Auth::user()->email }}</li>
        <li><strong>Mobile no.: </strong>{{ Auth::user()->mobile }}</li>
        <li><strong>Institute:</strong> {{Auth::user()->institute}}  </li>
    </ul>
                    <form class="form-inline" action="{{ route('teacher.update.name') }}" method="POST">
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
                    <form class="form-inline" action="{{ route('teacher.update.email') }}" method="POST">
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
                    <form class="form-inline" action="{{ route('teacher.update.mobile') }}" method="POST">
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
                    <form class="form-inline" action="{{ route('teacher.update.institute') }}" method="POST">
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
                <div class="card-header">Teacher's Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    </p>
                    
                    <div id="createTest">
                      <h2 align="center">New Question Set</h2>
                      <form class="form-inline" action="{{ route('teacher.test.add') }}" method="POST">
                            {{ csrf_field() }}

                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="subject">subject</label>  
                              <div class="col-md-2">
                              <input id="subject" name="subject" placeholder="" class="form-control input-md" required="" type="text">
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="class">class</label>  
                              <div class="col-md-2">
                              <input id="class" name="class" placeholder="" class="form-control input-md" required="" type="text">
                              </div>
                            </div>
                            <!-- Button -->
                           <div class="t_add">
                            <button type="submit" class="btn btn-primary">Add</button>
                          </div>
                                
                    </form>
                  </div>
                  <div id="saved">
                    <h2 align="center">Saved Question Sets</h2>
                    <table class="table">
                    <thead class="thead">
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Class</th>
                          <th scope="col">No. of Questions</th>
                          <th scope="col">Publish</th>
                          <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                              <td>{{$value->id}}</td>
                              <td>{{$value->subject}}</td>
                              <td>{{$value->class}}</td>
                              <td>{{$value->ques}}</td>
                              <td><a href="teacher/test/{{$value->id}}/publish"><button class="btn btn-primary">publish</button></a></td>
                              <td><a href="teacher/test/{{$value->id}}"><button class="btn btn-primary">edit</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <a href="teacher/exams"><button class="btn btn-primary">Published Examinations</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
