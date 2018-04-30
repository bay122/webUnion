<div class="alert alert-danger alert-important custom-alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>