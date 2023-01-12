@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Producto</h1>
@stop

@section('content')
<div class="container">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('producto.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">Datos del nuevo producto</h5>
                </div>
                <div class="modal-body">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto">
                    <textarea name="descripcion" rows="4" class="form-control  my-3" placeholder="Descripción sobre el producto..."></textarea>
                    <input type="file" name="imagen" class="form-control">
                </div>
                <div class="modal-footer d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
@stop
