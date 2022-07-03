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
                <div class="card-header">Php</div>

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

    <br>
    <div class="card">
        <div class="card-header">Ajax</div>

        <div class="card-body">

            <form id="upload_file" action="{{url('/file/upload_ajax')}}" method="POST" enctype="multipart/form-data">
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
                <button id="submit_ajax"> save </button>
            </form>


        </div>
    </div>


    <br>
    
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

    $("#submit_ajax").click(function (e) {
        e.preventDefault();

        const form = document.getElementById("upload_file");
        const formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: "{{url('/file/upload_ajax')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                this.reset();
                alert('File has been uploaded successfully');
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>
@endsection