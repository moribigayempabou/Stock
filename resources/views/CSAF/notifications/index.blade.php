@extends("layouts.masterCsaf")
@section('content')
<h1>Vos notifications non lues :</h1>



@if ($notifications->isEmpty())
    <p>Aucune notification non lue pour le moment.</p>
@else
    <ul>
        @foreach ($notifications as $notification)
            <li>
                {{ $notification->message }}
            </li>
            <li>{{ $notification->link }}</li>
        @endforeach
    </ul>
@endif
@endsection
