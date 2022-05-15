@extends('cms.layout.master')
@section('title')
{{$title}}
@endsection
@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" id="form">
                            <div id="message"></div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Old password</label>
                                            <input type="password" class="form-control" name="old_password" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">New password</label>
                                            <input type="password" class="form-control" name="new_password" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Confirm new password</label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a href="" class="pjax" id="redirect"></a>
@endsection
@section('js')
<script>
    $('#app').on('submit','#form',function () {
        var formData = new FormData()
        formData.append( '_token', $( '[name="_token"]' ).val() )
        formData.append( 'old_password', $( '[name="old_password"]' ).val() )
        formData.append( 'new_password', $( '[name="new_password"]' ).val() )
        formData.append( 'confirm_password', $( '[name="confirm_password"]' ).val() )
   
        $.ajax( {
            url: '{{route('cms.change_password')}}',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function ( data )
            {
               pjax.loadUrl(window.location.href)
                
               setTimeout(() => {
                document.addEventListener("pjax:success",toastr.success('Successfully'))
               }, 400);
               
            },
            error: function ( data, textStatus, jqXHR )
            {
                var error = data.responseJSON.message
                // $( '#message' ).html( `<div class="alert alert-danger">${ error }</div>`)
                // window.scrollTo( 0, 0 );
                toastr.error(error)
            },
        } );
        return false
    })
</script>
@endsection