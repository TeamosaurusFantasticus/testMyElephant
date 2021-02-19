<form method="post" action="{{route('deleteRepo')}}">
    @method('DELETE')
    @csrf
    <input type="text" name="repoToDelete">
    <input type="submit" value="supprimer le repo">
</form>
