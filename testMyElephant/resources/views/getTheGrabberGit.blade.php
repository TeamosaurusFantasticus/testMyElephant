<h1>Clonez votre repository !</h1>

<a href="{{route("getDeletter")}}">Suppression de repository</a>

<form method="post" action="{{route('cloneRepo')}}">
    @csrf
    <input type="text" name="repo" placeholder="URL du repository à examiner">
    <input  type="text" name="namerepo" placeholder="Nom à donner à votre repository">
    <button type="submit">Cloner ! </button>
</form>
