<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laracoding.com TinyMCE Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/js/app.js'])
</head>
<body>
<h2>Laracoding.com - TinyMCE Example</h2>
<form action="" method="post">
    @csrf
    <div class="mb-3">
        <label for="pwd">TinyMCE input:</label>
        <textarea id="tinymce" class="tinyMce" name="user-bio"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
    </div>
    <div id="holder" style="margin-top:15px;max-height:100px;"></div>


    <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
</form>
</body>
</html>
