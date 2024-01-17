@extends("layouts.master")

@section("content")
    <div class="my-4 p-4 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-4 mb-3">Ajouter un nouvel utilisateur</h3>

        @section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
    </style>
@endsection
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form style="width: 65%" method="POST" action="{{ route('users.update', ['utilisateur' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="lastname">Prenom :</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $utilisateur->lastname }}">
                </div>

                <div class="form-group">
                    <label for="telephone">Telephone :</label>
                    <input type="text" class="form-control" name="telephone" value="{{ $utilisateur->telephone }}">
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control" name="adresse">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $utilisateur->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="text" class="form-control" name="password">
                </div>

                </div>
                <div class="form-group">
                    <label for="structures_id">Structures :</label>
                    <select id="structures_id" class="form-control" name="structures_id">
                        @foreach ($structures as $structure)
                        @if ($structure->id == $utilisateur->structures_id)
                            <option value="{{$structure->id}}"
                                selected>{{$structure->nom}}</option>
                                @else
                                <option value="{{ $structure->id }}">{{ $structure->nom }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="roles_id">Rôle :</label>
                    <select id="roles_id" name="roles_id" class="form-control">
                        @foreach ($roles as $role)
                        @if ($role->id == $utilisateur->roles_id)
                            <option value="{{$role->id}}"
                                selected>{{$role->type_utilisateur}}</option>
                                @else
                            <option value="{{ $role->id }}">{{ $role->type_utilisateur }}</option>
                            @endif
                        @endforeach
                    </select>
                </div><br><br>

                <div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a href="{{ route('utilisateurs') }}" class="btn btn-danger">Annuler</a>
                </div>
            </div>
        </form>
    </div>
@endsection.
