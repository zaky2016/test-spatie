@extends('layouts.app')

@section('content')
<style>
    .form-group {
        margin: 16px;
    }

    label {
        width: 15%;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('message'))
            <div style="border: #cee1ef 1px solid; background-color: #DFF2BF;">success</div>

    <br>

            @endif
            <div class="card">
                <div class="card-header">hh</div>

                <div class="card-body">

                    <form action="{{url('/file/upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">title</label>
                            <input type="text" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="overview">overview</label>
                            <input type="text" name="overview" id="overview">
                        </div>

                        <div class="form-group">
                            <label for="file">file</label>
                            <input type="file" name="file" id="file_path">
                        </div>
                        <button type="submit"> save </button>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection