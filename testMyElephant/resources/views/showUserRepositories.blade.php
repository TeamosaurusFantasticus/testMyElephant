<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>testMyElephant | Vos repositories</title>
        <link rel="stylesheet" href="../css/reportStyle.css">
        <link rel="stylesheet" href="../css/app.css">
    </head>
    <body>
       <div class="showReposPage">

        <div class="flex">
            <a class="logo_scanner" href="{{route('getTheGrabberGit')}}">
                <div class="logo_white"></div>
            </a>
        </div>
            <h2 class="pageTitle bold">Vos repositories</h2><br>


            @if(count($repositories) == 0 )
                <div class="showUserRepositories">
                    Vous n'avez pas encore de repository enregistré ! Ajoutez-en un pour le scanner en <a href="{{route('getTheGrabberGit')}}">CLIQUANT ICI</a>
                </div>
            @elseif(!empty($repositories))
                <div class="showUserRepositories">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th></th>
                                <th scope="col">URL</th>
                                <th></th>
                                <th scope="col">Rajouté le</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($repositories as $repository)
                            <tr class="arrayRepos">
                                <td>{{ $repository->name }}</td>
                                <td><div class="verticalLine"></div></td>
                                <td>{{ $repository->url }}</td>
                                <td><div class="verticalLine"></div></td>
                                <td>{{ $repository->created_at }}</td>
                                <td><div class="verticalLine"></div></td>
                                <td>
                                    <form action="{{ route('cloneRepo',$repository->id) }}" method="post">
                                        @csrf
                                        <button class="btn" type="submit">Scanner</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('deleteRepository', $repository->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

            @include("Components.Navbar")
       </div>
    </body>
</html>

