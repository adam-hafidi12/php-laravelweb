@extends('products.layout')

@section('title', 'Modifier le produit')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 mb-3">
        <h2>Modifier les informations du produit</h2>
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Retour</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Il y a des erreurs dans le formulaire :<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label"><strong>Nom du produit :</strong></label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" placeholder="Nom du produit">
    </div>

    <div class="mb-3">
        <label for="detail" class="form-label"><strong>Détail sur le produit :</strong></label>
        <textarea name="detail" rows="4" class="form-control" placeholder="Détail">{{ old('detail', $product->detail) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label"><strong>Prix :</strong></label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control" placeholder="Prix">
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label"><strong>Stock :</strong></label>
        <input type="text" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" placeholder="Stock">
    </div>

    <div class="mb-3">
        <label for="companyid" class="form-label"><strong>ID de l'entreprise :</strong></label>
        <input type="text" name="companyid" value="{{ old('companyid', $product->companyid) }}" class="form-control" placeholder="ID de l'entreprise">
    </div>

    <div class="mb-3">
        <label for="image" class="form-label"><strong>Image du produit :</strong></label>
        <input type="file" name="image" class="form-control">
        @if ($product->image)
        <div class="mt-2">
            <img src="/images/{{ $product->image }}" width="200" class="img-thumbnail">
        </div>
        @endif
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
    </div>
</form>
@endsection