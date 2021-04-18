@extends('users.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Test Technique !</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Créer un nouveau utilisateur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>N°</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->firstname }}</td>
            <td>{{ $value->birth }}</td>
            <td>
                <form action="{{ route('users.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('users.show',$value->id) }}">Infos</a>    
                    <a class="btn btn-primary" href="{{ route('users.edit',$value->id) }}">Edition</a> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete" />
                    <button type="submit" class="btn btn-danger">Retirer</button>
                    <?php if($value->isuservalid == 0) : ?>
                    <?php endif; ?>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection