@include('admin.pages.plans.includes.errors')

@csrf

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $profile->name ?? old('name') }}">
</div>

<div class="form-group">
    <label>Descricao:</label>
    <input type="text" name="description" class="form-control" placeholder="Descricao:" value="{{ $profile->description ?? old('description') }}">
</div>
