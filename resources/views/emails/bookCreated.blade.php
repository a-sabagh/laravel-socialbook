<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('email.BookCreatedTitle')}}</title>
</head>

<body>
    <h1>{{__('email.BookCreatedMsg',['name'=>$user->name,'book'=>$book->name])}}</h1>
</body>

</html>