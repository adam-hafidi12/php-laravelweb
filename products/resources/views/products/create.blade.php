@extends('products.layout')
@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Ajouter nouveau produit</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="margin-top: 20px;">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom du produit:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nom de produit" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Détail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Détail">{{ old('detail') }}</textarea>
                    @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix:</strong>
                    <input type="text" class="form-control" name="price" placeholder="Prix" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de produits en stock:</strong>
                    <input type="text" class="form-control" name="stock" placeholder="Nombre de produits en stock" value="{{ old('stock') }}">
                    @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id d'entreprise:</strong>
                    <input type="text" class="form-control" name="companyid" placeholder="Id d'entreprise" value="{{ old('companyid') }}">
                    @error('companyid')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
@endsection