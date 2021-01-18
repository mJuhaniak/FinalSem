<div class="form-group text-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Celé meno</label>
        <input type="text" class="form-control" id="name" name="name"  pattern="^[A-Z]{1}[a-zA-Z-]+\s[A-Z]{1}[a-zA-Z-]+$" title="Zadajte meno a priezvisko oddelené medzerou a s veľkým začiatočným písmenom"
               placeholder="Full name" value="{{ old('name', @$model->name) }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('name', @$model->email) }}">
    </div>
    <div class="form-group">
        <label for="password">Heslo</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div>
    <div class="form-group">
        <label for="password">Potvrďte heslo</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>

