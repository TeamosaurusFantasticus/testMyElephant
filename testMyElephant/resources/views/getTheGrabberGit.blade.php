<p>hello world</p>
<a href="{{route("getDeletter")}}">netoyeur de doss</a>

<form method="post" action="{{route('cloneRepo')}}">
    @csrf
    <input type="text" name="repo">
    <input  type="text" name="namerepo">
    <input type="submit" value="clone mon repo">
</form>
