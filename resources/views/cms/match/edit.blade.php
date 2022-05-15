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
                                            <label for="first-name-vertical">Team 1 <span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" class="form-control" name="team1"
                                                value="{{$match->team1}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Team 1 image (tỉ lệ 3:2)</label>
                                            <input type="file" class="form-control imageInput" name="team1_image"
                                                value="">
                                            <img width="200" class="mt-2" src="{{asset($match->team1_image)}}" alt="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Team 2 <span
                                                    class="text-danger">*</span></label>
                                            <input required type="text" class="form-control" name="team2"
                                                value="{{$match->team2}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Team 2 image (tỉ lệ 3:2)</label>
                                            <input type="file" class="form-control imageInput" name="team2_image"
                                                value="">
                                            <img width="200" class="mt-2" src="{{asset($match->team2_image)}}" alt="">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Start time</label>
                                            <input type="datetime-local" class="form-control" name="time_start"
                                                value="{{date('Y-m-d\TH:i', strtotime($match->time_start))}}">
                                        </div>
                                    </div>

                                    {{-- <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">End time</label>
                                            <input type="datetime-local" class="form-control" name="time_end"
                                                value="{{date('Y-m-d\TH:i', strtotime($match->time_end))}}">
                                        </div>
                                    </div> --}}

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Result</label>
                                            <select class="form-control" name="result">
                                                <option value="0" @if ($match->result == 0) selected @endif>Chưa bắt đầu
                                                </option>
                                                <option value="1" @if ($match->result == 1) selected @endif>Team 1 thắng
                                                </option>
                                                <option value="2" @if ($match->result == 2) selected @endif>Hoà</option>
                                                <option value="3" @if ($match->result == 3) selected @endif>Team 2 thắng
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Active</label>
                                            <select class="form-control" name="is_active">
                                                <option value="1" @if ($match->is_active == 1) selected @endif>Active
                                                </option>
                                                <option value="0" @if ($match->is_active == 0) selected @endif>Hide
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-start mt-4">
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
@endsection
@section('js')

<script>
    $('#app').on('submit','#form',function () {
        var formData = new FormData()
        formData.append( '_token', $( '[name="_token"]' ).val() || "")

        formData.append( 'team1', $( '[name="team1"]' ).val() || "")
        formData.append( 'team2', $( '[name="team2"]' ).val() || "")
        formData.append( 'time_start', $( '[name="time_start"]' ).val() || "")
        // formData.append( 'time_end', $( '[name="time_end"]' ).val() || "")
        formData.append( 'team1_image', $( '[name="team1_image"]' )[0].files[0] || "" )
        formData.append( 'team2_image', $( '[name="team2_image"]' )[0].files[0] || "" )
        
        formData.append( 'result', $( '[name="result"]' ).val() || "")
        formData.append( 'is_active', $( '[name="is_active"]' ).val() || "")

        $.ajax( {
            url: '{{request()->url()}}',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function ( data )
            {
                // console.log(data)
               alert('Successfully')
               pjax.loadUrl(window.location.href)
            },
            error: function ( data, textStatus, jqXHR )
            {
                var error = data.responseJSON.message
                alert(error)
                // $( '#message' ).html( `<div class="alert alert-danger">${ error }</div>`)
                // window.scrollTo( 0, 0 );
            },
        } );
        return false
    })
</script>
@endsection