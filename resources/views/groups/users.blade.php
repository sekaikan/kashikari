@extends('layouts.app')

@section('content') 
<div>
         {!!   $user->groups->name  }!!}

</div>
@endsection