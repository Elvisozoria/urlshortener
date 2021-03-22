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
                                <div class="col-sm-3">
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
                        <thead>
                            <td>
                                <th>ID</th>
                                <th>Original url</th>
                                <th>short url</th>
                                <th>Title</th>
                                <th>Hits</th>
                                <th>&nbsp;</th>
                            </td>
                        </thead>
                        <tbody>
                            @foreach($urls as $url)
                            <tr>
                                <td>{{ $url->id }} </td>
                                <td>{{ $url->original_url }} </td>
                                <td>{{ $url->short_url }} </td>
                                <td>{{ $url->title }} </td>
                                <td>{{ $url->hits }} </td>
                                <td> 
                                    <form action="{{ route('urls.destroy', $url) }}" method = "POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value = "Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
