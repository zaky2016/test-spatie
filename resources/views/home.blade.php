@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('currrent_user') }}</div>

                    <div class="card-body">

                        <h2>{{ $user->name }}</h2>

                        @foreach ($perm as $item)
                            <p>{{ $item->name }}</p>
                        @endforeach


                    </div>
                </div>


            <form action="{{url('/change')}}" method="POST">
                @csrf
                <div class="row">
                    @foreach ($roles as $role)
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h1>{{ $role->name }}</h1>
                                </div>

                                <div class="card-body">
                                    <input type="text" name="{{ $role->name }}" value="{{ $role->id }} " hidden>

                                    @foreach ($permissions as $p)
                                        <div class="row">
                                            <input type="checkbox"  name="{{ $role->name }}[]" value="{{ $p->name }}" />
                                            <p>{{ $p->name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-md-center">
                <button class=""type="submit"> save </button>

                </div>
            </form>

            </div>
        </div>
    @endsection
