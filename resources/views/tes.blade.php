<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>
<body>
    <script>
        async function getData(){
            res = await fetch('{{ url('api/tes') }}')
            res = await res.json()
            console.log(res)
            // res.then(e => console.log(e.json()));
            // console.log(res)
        }
        getData()
    </script>
</body>
</html>
