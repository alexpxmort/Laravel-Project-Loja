@if($errors->any())
<div  class="alert alert-warning alert-dismissible fade show" role="alert" style="border-radius:30px 30px;">
    <ul>
        @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
