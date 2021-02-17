<p>hello world</p>


<form method="post" action="{{route('cloneRepo')}}">
    @csrf
    <input type="text" name="repo">
    <input  type="text" name="namerepo">
    <input type="submit" value="clone mon repo">
</form>
