@extends('adminlte::page')

@extends('templates.index')

@include('templates.head')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Ajout d'image pour le carousel</h1>
@stop

@section('content')
    <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
        <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">    
            @csrf
            @method('post')
            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" class="form-control" name="titre" id="titre" value="{{old('titre')}}">
            </div>
            <div class="form-group">
                    <label for="image">Image de l'article</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
            <div class="form-group">
                <label for="texte">Contenu</label>
                <textarea name="texte" id="texte" cols="30" rows="10" class="form-control">{{old('texte')}}</textarea>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <span class="d-block mb-3">Tags</span>
                        @if (isset($tags) == null)
                            <p>pas de tags, aller en <a href="{{route('tags.create')}}">créer</a></p>
                        @else
                            @foreach ($tags as $tag)
                                <span class="d-flex"><input type="checkbox" name="tags[]" id="" class="d-block my-auto mr-2" value="{{$tag->id}}" />   {{$tag->nom}} </span>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-6">
                        <span class="d-block mb-3">Catégorie</span>
                        @if (isset($categories) == null)
                            <p>pas de categories, aller en <a href="{{route('categories.create')}}">créer</a></p>
                        @else
                            <select name="categorie" id="" class="form-control">
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>

            <button class="btn btn-success d-block mx-auto mb-5">Sauver</button>
        </form>
    </div>
@stop
