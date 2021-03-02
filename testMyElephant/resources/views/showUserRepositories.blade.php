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
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>


        <div class="showUserRepositories">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th scope="col">#id</th> --}}
                        <th scope="col">Nom</th>
                        <th scope="col">URL</th>
                        <th scope="col">Scanner</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($repositories as $repository)
                    <tr>
                        {{-- <th>{{ $repository->id }}</th> --}}
                        <td>{{ $repository->name }}</td>
                        <td>{{ $repository->url }}</td>
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
                </tbody>
            </table>
        </div>

    </x-app-layout>



</body>
</html>
