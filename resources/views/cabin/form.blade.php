<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="{{ old('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="capacity">Capacity</label>
        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="capacity" value="{{ old('capacity', @$model->capacity) }}">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
