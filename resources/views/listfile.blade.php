@extends('layouts.app')

@section('content')
                        @foreach ($files as $item)
                            <a href="{{URL::route('listfile')."/". $item->getfilename()}}" >
                                {{ $item}}
                            </a>
                            <br>
                        @endforeach
@endsection
