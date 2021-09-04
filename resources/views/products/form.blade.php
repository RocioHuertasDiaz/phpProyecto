@extends('layout')
@section('title',$product->id ?'Actualizar producto':'Nuevo Producto')
@section('header',$product->id ?'Actualizar producto':'Nuevo Producto')
@section('content')
<form action="{{ route('product.save') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id}}">
<div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <!-- aqui se trae lo ultimo que se escribió-->
          <input type="text" class="form-control" name="name" 
          value="{{@old('name') ? @old('name') : $product->name}}">
          @error('name')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>

    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Costo</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="cost" 
          value="{{@old('cost')?@old('cost'):$product->cost}}">
          @error('cost')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>

    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Precio</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="price"
          value="{{@old('price')?@old('price'):$product->price}}">
          @error('price')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>
        
    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Cantidad</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="quantity" 
          value="{{@old('quantity')?@old('quantity'): $product->quantity}}">
          @error('quantity')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>
        
    </div>
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Marca</label>
        <div class="col-sm-10">
        <select name="brand" class="form-select">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"
                        {{ $product->brand_id == $brand->id ? "selected" : ""}}                  
                    >
                    {{ $brand->name }}
                </option>
            @endforeach
          </select>
          @error('brand')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>
        
    </div>
    <div class="row mb-3">
        <div class="col-sm-10">  </div>      
        <div class="col-sm-4">        
            <a href="/products" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>      
    </div>
</form>
@endsection