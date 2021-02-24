<table class="table">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Nom</th>
            <th scope="col">URL</th>
            <th scope="col">Rapport</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>

    @foreach($repositories as $repository)
        <tr>
            <th>{{ $repository->id }}</th>
            <td>{{ $repository->name }}</td>
            <td>{{ $repository->url }}</td>
            <td>{{ $repository->scanRapport }}</td>
            <td>
                <form action="{{ route('deleteRepository', $repository->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>

    @endforeach
    </tbody>
</table>
