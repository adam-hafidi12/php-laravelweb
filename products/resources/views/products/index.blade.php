@extends('products.layout')

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 mb-3">
        <h4 class="text-center">Gestion de produits</h4>
        <div class="text-end">
            <a class="btn btn-success" href="{{ route('products.create') }}">Ajouter nouveau produit</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Numéro</th>
            <th>Image</th>
            <th>Nom produit</th>
            <th>Détails</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Id d'entreprise</th>
            <th width="280px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="/images/{{ $product->image }}" width="100px" alt="image produit"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }} dh</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->companyid }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Afficher</a>
                    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $products->links() !!}

<div class="search mt-5">
    <h3>Filtrage de produits</h3>
    <form action="{{ route('products.index') }}" method="GET" class="row g-3">
        <div class="col-sm-12 col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Chercher par mot clé" value="{{ request('search') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="min_price" class="form-control" placeholder="Prix min" value="{{ request('min_price') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="max_price" class="form-control" placeholder="Prix max" value="{{ request('max_price') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="min_stock" class="form-control" placeholder="Stock min" value="{{ request('min_stock') }}">
        </div>
        <div class="col-sm-12 col-md-2">
            <input type="number" name="max_stock" class="form-control" placeholder="Stock max" value="{{ request('max_stock') }}">
        </div>
        <div class="col-sm-12 col-md-1">
            <button class="btn btn-warning" type="submit">Rechercher</button>
        </div>
    </form>
</div>

<a href="{{ route('products.index') }}" class="btn btn-success mt-3">Retour à la liste des produits</a>

@endsection
