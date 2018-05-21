<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>错误报告</title>
</head>
<body>
<h1>错误报告</h1>
<div class="container-fluid">
    @if(!empty($errorLog))
        <div class="row">
            <div class="col-md-2">请求链接</div>
            <div class="col-md-10">{{ $errorLog['url'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">请求方式</div>
            <div class="col-md-10">{{ $errorLog['method'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">请求ip</div>
            <div class="col-md-10">{{ $errorLog['ip'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">请求headers</div>
            <div class="col-md-10">{{ json_encode($errorLog['headers']) }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">请求inputs</div>
            <div class="col-md-10">{{ json_encode($errorLog['inputs']) }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">请求queries</div>
            <div class="col-md-10">{{ json_encode($errorLog['queries']) }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">sessions</div>
            <div class="col-md-10">{{ json_encode($errorLog['sessions']) }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">cookies</div>
            <div class="col-md-10">{{ json_encode($errorLog['cookies']) }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">响应code</div>
            <div class="col-md-10">{{ $errorLog['code'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">错误message</div>
            <div class="col-md-10">{{ $errorLog['message'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">错误file</div>
            <div class="col-md-10">{{ $errorLog['file'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">错误line</div>
            <div class="col-md-10">{{ $errorLog['line'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2">trace信息</div>
            <div class="col-md-10">
                <pre>{{ $errorLog['trace'] }}</pre>
            </div>
        </div>
    @else
        <div class="row">
            <p>信息错误</p>
        </div>
    @endif

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>