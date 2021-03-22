<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>urls</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">

                <div class="card border-0 shadow">
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            - {{ $error }} <br>
                            @endforeach
                        </div>

                        @endif
                        <form action="{{ route('urls.store') }}" method ="POST">
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <input type="text" name="original_url" placeholder="original url" class="form-control" value ="{{ old('original_url') }}">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class= "btn btn-primary"> Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Original url</th>
                                <th scope="col">short url</th>
                                <th scope="col">Title</th>
                                <th scope="col">Hits</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($urls as $url)
                            <tr>
                                <th scope="row"> {{ $url->id }} </th>
                                <td><a href="{{ $url->original_url }}" target="_blank">{{ $url->original_url }} </a></td>
                                <td><a href="{{ $url->short_url }}" target="_blank">{{ url('/') . '/' . $url->short_url }} </a></td>
                                <td>{{ $url->title }} </td>
                                <td>{{ $url->hits }} </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
