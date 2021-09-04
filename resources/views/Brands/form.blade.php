@extends('layout')
@section('title',$brand->id ?'Actualizar Marca':'Nueva Marca')
@section('header',$brand->id ?'Actualizar Marca':'Nuevo Marca')
@section('content')
<form action="{{ route('brand.save') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $brand->id}}">
<div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <!-- aqui se trae lo ultimo que se escribió-->
          <input type="text" class="form-control" name="name" 
          value="{{@old('name') ? @old('name') : $brand->name}}">
          @error('name')
        <p class="text-danger">
            {{ $message}}
        </p>
        @enderror
        </div>

    </div>
   

    <div class="row mb-3">
        <div class="col-sm-10">  </div>      
        <div class="col-sm-4">        
            <a href="/brands" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>      
    </div>
</form>
@endsection