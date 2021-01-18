<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Názov</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Názov chaty" value="{{ old('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="capacity">Kapacita</label>
        <input type="number" class="form-control" id="capacity" name="capacity" min="1" placeholder="Kapacita" value="{{ old('capacity', @$model->capacity) }}">
    </div>
    <div class="form-group">
        <label for="info">Popis</label>
        <textarea type="text" class="form-control" id="info" name="info" placeholder="Info">{{ old('info', @$model->info) }}</textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
