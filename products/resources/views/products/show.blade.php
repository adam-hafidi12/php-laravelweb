@extends('products.layout')

@section('title', 'Détails du produit')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 mb-3">
        <h2 class="text-center">Afficher les informations du produit</h2>
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Retour</a>
    </div>
</div>

<form method="POST" enctype="multipart/form-data">
    @csrf
    @method('GET') <!-- On ne modifie pas ici, donc GET plutôt que PUT -->

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label"><strong>Nom du produit :</strong></label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nom du produit" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="price" class="form-label"><strong>Prix du produit :</strong></label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Prix" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="stock" class="form-label"><strong>Nombre de produits en stock :</strong></label>
            <input type="text" name="stock" value="{{ $product->stock }}" class="form-control" placeholder="Stock" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label for="companyid" class="form-label"><strong>ID de l'entreprise :</strong></label>
            <input type="text" name="companyid" value="{{ $product->companyid }}" class="form-control" placeholder="ID de l'entreprise" readonly>
        </div>

        <div class="col-12 mb-3">
            <label for="detail" class="form-label"><strong>Détail sur le produit :</strong></label>
            <textarea class="form-control" style="height:150px" name="detail" placeholder="Détail" readonly>{{ $product->detail }}</textarea>
        </div>

        <div class="col-12 mb-3 text-center">
            <label for="image" class="form-label"><strong>Image du produit :</strong></label><br>
            <img src="/images/{{ $product->image }}" alt="Image de produit" width="200" class="img-thumbnail">
        </div>
    </div>
</form>

@endsection
