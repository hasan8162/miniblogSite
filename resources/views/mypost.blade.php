<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>
    

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #A91D3A">
      
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/bloglogo.png') }}" width="50" height="50" alt="">
      </a>
      <a class="navbar-brand" href="#" style="font-size: 30px"> mini blog </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard"> Dashboard </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/mypost">My Posts <span class="sr-only">(current)</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post"> Posts </a>
          </li>

        </ul>

      </div>

      <div class="justify-content-end">
          <x-app-layout>
    
          </x-app-layout>
    
      </div>
    </nav>

    @if($message = Session::get('success'))
        <div class="alert alert-danger alert-block">{{ $message }}</div>
    @endif

    <?php
      $count_votes = 0;
      $count_blogs = 0;
      $count_public_blogs = 0;
    ?>

    @foreach($myposts as $mypost)
      <?php
        $count_votes += $mypost->votes;
        $count_blogs++;
        
        if($mypost->show == 'Public')  $count_public_blogs++;
      ?>
    @endforeach

    <div class="mt-5 ml-5 mr-5">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Total Blogs</th>
          <th scope="col">Public Blogs</th>
          <th scope="col">Private Blogs</th>
          <th scope="col">Overall Votes</th>
        </tr>
      </thead>

      <tbody>
        <tr>

          <td>{{ $count_blogs }}</td>
          <td>{{ $count_public_blogs }} </td>
          <td>{{ $count_blogs - $count_public_blogs }} </td>

          @if($count_votes > 0)
            <td style="color: green;">+{{ $count_votes }}</td>

          @else
            <td style="color: grey;">{{ $count_votes }}</td>
          @endif
          
        </tr>
      </tbody>
    </table>
    </div>

        
    <div class = "Container mt-6 mr-5 ml-5">
              
        @foreach($myposts as $mypost)
        <div class="header">  
          <h1 style="display: inline; font-family: 'Playball'; font-weight: 800; font-style: regular; font-size: 40px">{{ $mypost->title }}
          
          @if($mypost->show == "Private")
            <img class="mb-3" style="display: inline;" src="{{ asset('images/lock.png') }}" width="25" height="25" alt=""></h1>
          @endif
          
        </div>

        <div class="pt-3">
          <h3 >Written by {{ $mypost->user->name }}, {{ $mypost->created_at->format('d/m/Y') }}</h3>
        </div>

        <br>

        <div style="border-style: solid; border-width: 0px 0px 0px 5px; border-color: #B4B4B8">
        <?php
        if($mypost->picture != NULL){
        ?>
        <div>
            <img style = "margin: auto" src="postImages/{{ $mypost->picture }}" height = "400px" width = "400px">
        </div>
        <?php
        }
        ?>

        <div class="p-3">
          <p> {!! nl2br(e($mypost->body)) !!} </p>
        </div>

        </div>

        <br>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item mr-3">
                <h1 style="font-size: 25px">Votes: </h1>
              </li>

              <li class="nav-item mr-3">
                <?php
                if($mypost->votes > 0){
                ?>
                  <h1 style="font-size: 25px; color: #059212; font-weight: 500">+{{ $mypost->votes }}</h1>
                <?php
                }
                ?>

                <?php
                if($mypost->votes <= 0){
                ?>
                  <h1 style="font-size: 25px; color: #686D76; font-weight: 500">{{ $mypost->votes }}</h1>
                <?php
                }
                ?>

              </li>
            </ul>
          </div>


          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item mr-3">
                <a type="submit" class="btn btn-warning" href="{{ url('/post/edit', $mypost->id) }}">Edit</a>
              </li>
              <li class="nav-item">
              <a type="submit" class="btn btn-danger"  href="{{ url('/post/delete', $mypost->id) }}" >Delete</a>
              </li>
            </ul>
          </div>
        </nav>
        </br>
        </br>
        @endforeach
        

    </div>
      
</body>
</html>