<html>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<title>10/10</title>
<style>
  /* .container
    {
      width:80%;
      margin:2px;
      background:#fff;
    }  */
    .ques{
      display: none;
    }
    .layout
    {
      height:500px;
    }
    .ques-nav{
      width:25%;
      display: inline-block;
      height: 100%;
      background-color:#2F2D2E ;
    }
    .question{
      width:70%;
      display: inline-block;
      height:100%;
      background-color: #99C24D;
      vertical-align:top;
    }
    td{
      padding: 0;
      margin:0;
      width:175px;
    }
    table{
      border:1 px solid white;
      width:100%;
      height:auto;

    }
    .button{
        background-color: white;
        width:100%;
        height:50px;
        border:2px solid black;
    }
    .button2
    {
      width:200px;
      height: 50px;
      border:2px solid black;
      display:inline-block;
    }
    #ques1{
      display: block;
    }
    .e_code{
      position:absolute;
      display: inline-block;
      left:1300px;
      top:0px;
    }
    .data{
      margin-left: 30px;
      font-family: Arial;
      color:white;
    }
    #time{
      height: 100px;
      font-size: 4em;
      font-family: Arial;
      color:white;
      text-align: center;
    }
    body{
      background-color:#048BA8; 
    }
  </style>
<script type="text/javascript">
var countDownDate = new Date().getTime();
countDownDate= countDownDate + 10*60*1000;

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate-now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("time").innerHTML ="0"+minutes + ":" + seconds + "";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "Refresh Page to View Exam";
    }
}, 1000);
function hideall()
{
    var i;
    var prefix="ques";
    for (i = 1; i <=10; i++)
    {
        var id = prefix+String(i);
        document.getElementById(id).style.display="none"
    }
}


function display(num)
{
  check();
  hideall();
  var next_id="ques"+num;
  var next = document.getElementById(next_id);
  next.style.display="block";
  //check if one of the radios are checked or not and change its color
  return;
}


function clean(num)
{
  //clean checked radio buttons
  //alert('inside clean function for '+num);

  var chk=document.getElementsByName(num);
  for (var i = 0; i < 4; i++)
  {
    chk[i].checked=false;
  }
  colorthis(num,'white');
  return;
}
function check()
{
  //check if checked and change color
  for (var i = 1; i <= 10; i++)
  {
    var chk = document.getElementsByName(i);
    for (var j = 0; j < 4; j++)
    {
      if(chk[j].checked)
      {
        //color green of i
        colorthis(i,'green');
        break;
      }
    }
  }
}
function colorthis(num,col)
{
  var bid ="b"+num;
  if(document.getElementById(bid).style.background.split(' ')[0]=='yellow'|'red')
    return;
  document.getElementById(bid).style.background=col;
  return;
}
  function review(num)
  {
    var flag=0;
    var chk = document.getElementsByName(num);
      for (var j = 0; j < 4; j++)
      {
        if(chk[j].checked)
        {
          colorthis(num,'yellow');
          flag=1;
          break;
        }
      }
      if(flag==0)
      {
        colorthis(num,'red');
      }
    return;
  }
</script>
  <body>
    <div class="layout">
      <h1 class="data right e_code">CODE: {{ request()->segment(count(request()->segments())) }}</h1>
      <h1 class="data">Hi,{{ Auth::user()->name }}!</h1>
      <div class="ques-nav">
        <h1 id="time"></h1>
        <table>
          <tr>
            <td><button type="button" onClick="display(1)" id="b1" class="button">1</button></td>
            <td><button type="button" onClick="display(2)" id="b2" class="button">2</button></td>
          </tr>
          <tr>
            <td><button type="button" onClick="display(3)" id="b3" class="button">3</button></td>
            <td><button type="button" onClick="display(4)" id="b4" class="button">4</button></td>
          </tr>
          <tr>
            <td><button type="button" onClick="display(5)" id="b5" class="button">5</button></td>
            <td><button type="button" onClick="display(6)" id="b6" class="button">6</button></td>
          </tr>
          <tr>
            <td><button type="button" onClick="display(7)" id="b7" class="button">7</button></td>
            <td><button type="button" onClick="display(8)" id="b8" class="button">8</button></td>
          </tr>
          <tr>
            <td><button type="button" onClick="display(9)" id="b9" class="button">9</button></td>
            <td><button type="button" onClick="display(10)" id="b10" class="button">10</button></td>
          </tr>
          <tr>
            <td colspan="2"><button type="submit" form="form1" class="button">Submit</button></td>
          </tr>

        </table>
        
      </div>

      <div class="question">
        <form name="form1" id="form1" method="POST" action="{{url()->full()}}/submit">
          {{ csrf_field() }}
          @for ($i = 0; $i < sizeof($data); $i++)
          <div id="ques{{$i+1}}" class="ques">
            <p class="dash_q">Q{{ $i+1 }}. {{$data[$i]->question}}</p>
            <span class="opt">1.<input type="radio" name="{{$i+1}}" value="1">{{$data[$i]->opt1}}<br></span>
            <span class="opt">2.<input type="radio" name="{{$i+1}}" value="2">{{$data[$i]->opt2}}<br></span>
            <span class="opt">3.<input type="radio" name="{{$i+1}}" value="3">{{$data[$i]->opt3}}<br></span>
            <span class="opt">4.<input type="radio" name="{{$i+1}}" value="4">{{$data[$i]->opt4}}<br></span>
            <div class="dash_btn">
            <button type="button" class="button2" onClick="clean({{$i+1}})">clear</button>
            <button type="button" class="button2" onClick="display({{$i}})">Prev</button>
            <button type="button" class="button2" onClick="display({{$i+2}})">Next</button>
            <button type="button" class="button2" onClick="review({{$i+1}})">Mark for Review</button>
          </div>
          </div>
          @endfor

        </form>

      </div>
    </div>
  </body>
  </html>