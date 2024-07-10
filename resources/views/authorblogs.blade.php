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
          <li class="nav-item active">
            <a class="nav-link" href="/dashboard"> Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/mypost">My Posts</a>
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
    
    <?php
      $count_votes = 0;
      $count_blogs = 0;
    ?>

    @foreach($posts as $post)
      <?php
        $count_votes += $post->votes;
        $count_blogs++;
      ?>
    @endforeach

    <div class="mt-5 ml-5 mr-5">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Author</th>
          <th scope="col">Total Blogs</th>
          <th scope="col">Overall Votes</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>{{ $post->user->name }} </td>
          <td>{{ $count_blogs }}</td>

          @if($count_votes > 0)
            <td style="color: green;">+{{ $count_votes }}</td>

          @else
            <td style="color: grey;">{{ $count_votes }}</td>
          @endif
          
        </tr>
      </tbody>
    </table>
    </div>

  <div class="row mt-3 mr-3">
  <div class="col-lg-10"></div>        
  <div class="col-lg-2 btn-group">
    <button type="button" style="border-style: solid; border-width: 1px;  border-color: black;" class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      @if($type == 'Popular')
          Most Popular
        @else {{ $type }}
      @endif
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('/dashboard/author', [$authorId]) }}">Latest</a>
      <a class="dropdown-item" href="{{ url('/dashboard/author', [$authorId, 'Oldest']) }}">Oldest</a>
      <a class="dropdown-item" href="{{ url('/dashboard/author', [$authorId, 'Popular']) }}">Most Popular</a>
    </div>
  </div>
  </div>

    <div class = "Container mt-6 mr-5 ml-5">
              
        @foreach($posts as $post)
        <div>  
          <h1 style="font-family: serif; font-weight: 800; font-style: regular; font-size: 40px">{{ $post->title }}</h1>
        </div>

        <div class="pt-3">
          <h4>Written by {{ $post->user->name }}, {{ $post->created_at->format('d/m/Y') }}</h4>
        </div>

        <br>

        <div style="border-style: solid; border-width: 0px 0px 0px 5px; border-color: #B4B4B8">
        <?php
        if($post->picture != NULL){
        ?>
          <h1>{{ $post->picture }}</h1>
          <div>
            <img style = "margin: auto" src="{{ url('/postImages/', $post->picture) }}" height = "400px" width = "400px">
          </div>
        <?php
        }
        ?>

        
        <div class="p-3">
          <p> {!! nl2br(e($post->body)) !!} </p>
        </div>

        </div>

        <br>

        <?php
          $did_current_user_voted = json_decode($post->user_votes, true);
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item mr-3">
                <h1 style="font-size: 25px">Votes: </h1>
              </li>

              <li class="nav-item mr-3">
                <?php
                if($post->votes > 0){
                ?>
                  <h1 style="font-size: 25px; color: #059212; font-weight: 500">+{{ $post->votes }}</h1>
                <?php
                }
                ?>

                <?php
                if($post->votes <= 0){
                ?>
                  <h1 style="font-size: 25px; color: #686D76; font-weight: 500">{{ $post->votes }}</h1>
                <?php
                }
                ?>

              </li>
            </ul>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <h1 style="font-size: 20px" class="mt-2">Vote Here: </h1>
            </li>

            <?php
            if(!array_key_exists($current_user, $did_current_user_voted) || $did_current_user_voted[$current_user] == 0){
            ?>  
              <li class="nav-item mr-3">
                <a type="submit" class="btn btn-outline-success" style="border-radius: 50%" href="{{ url('/dashboard/upvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/uparrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
              <li class="nav-item">
                <a type="submit" class="btn btn-outline-danger" style="border-radius: 50%" href="{{ url('/dashboard/downvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/downarrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
            <?php
            }
            ?>

            <?php
            if(array_key_exists($current_user, $did_current_user_voted) && $did_current_user_voted[$current_user] == 1){
            ?>  
              <li class="nav-item mr-3">
                <a type="submit" class="btn btn-success" style="border-radius: 50%" href="{{ url('/dashboard/unvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/uparrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
              <li class="nav-item">
                <a type="submit" class="btn btn-outline-danger" style="border-radius: 50%" href="{{ url('/dashboard/upvotetodownvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/downarrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
            <?php
            }
            ?>

            <?php
            if(array_key_exists($current_user, $did_current_user_voted) && $did_current_user_voted[$current_user] == -1){
            ?>  
              <li class="nav-item mr-3">
                <a type="submit" class="btn btn-outline-success" style="border-radius: 50%" href="{{ url('/dashboard/downvotetoupvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/uparrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
              <li class="nav-item">
                <a type="submit" class="btn btn-danger" style="border-radius: 50%" href="{{ url('dashboard/unvote', [$post->id, 'authorblogs', $type]) }}">
                  <img src="{{ asset('images/downarrow.png') }}" width="20" height="20" alt="">
                </a>
              </li>
            <?php
            }
            ?>

            </ul>
          </div>
        </nav>
        
        </br>
        </br>
        @endforeach

        <br>
     
    </div>
</body>
</html>