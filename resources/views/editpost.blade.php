<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
        
    <br>

    <h1 style="text-align: center; font-size: 30px; font-weight: 500">Edit Your Blog</h1>

    <div class="container pt-3">
      
        <form id="studentForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
          <div class="form-group col-lg-12">
              <label>Title</label>
              <input type = "text" name = "title" value = "{{ $post->title }}" class="form-control"/>
                   @if($errors->has('title'))
                   <span class="text-danger">{{ $errors->first('title') }}</span>
                   @endif
          </div>

          <div class="form-group col-lg-8">
              <label>Image</label>
              <input type = "file" name = "picture" class="form-control"/>
          </div>

          <div class="form-group col-lg-4">
            <label></label>

              <select name = "show" class="form-control">
                          
              <?php
              if($post->show == "Public"){
              ?>  
                 <option selected = "selected">Public</option>
                 <option>Private</option>

              <?php  
              }
              ?>

             <?php
              if($post->show == "Private"){
              ?>  
                 <option>Public</option>
                 <option selected = "selected">Private</option>

              <?php  
              }
              ?>
                          

            </select>
            @if($errors->has('show'))
              <span class="text-danger">{{ $errors->first('show') }}</span>
            @endif

        </div>


          <div class="form-group col-lg-12">
              <label>Body</label>
              <textarea name = "body" class="form-control" rows="7">{{ $post->body }}</textarea>
              @if($errors->has('body'))
                <span class="text-danger">{{ $errors->first('body') }}</span>
              @endif
         </div>

                   
            <div class = "form-group col-lg-12">
               <label></label>
               <input type="submit" class="btn btn-primary btn-block" value="Edit">
            </div>

          </div>
        </form>
    </div>
</body>
</html>