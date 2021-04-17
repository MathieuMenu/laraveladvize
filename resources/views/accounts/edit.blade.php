@extends('accounts.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edition de l'utilisateur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accounts.index') }}">Retour</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oups!</strong> Vous avez saisies des informations invalides.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('accounts.update',$account->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="PUT">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom :</strong>
                    <input type="text" name="name" value="{{ $account->name }}" class="form-control" placeholder="Nom">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom :</strong>
                    <input type="text" name="surname" value="{{ $account->surname }}" class="form-control" placeholder="Prénom">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de naissance :</strong>
                    <input type="date" name="birth" value="{{ $account->birth }}" class="form-control" placeholder="Date de naissance">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
   
    </form>
@endsection