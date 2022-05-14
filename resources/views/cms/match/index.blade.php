@extends('cms.layout.master')
@section('title')
{{$title}}
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Table &nbsp;<a href="{{route('cms.match.add')}}"
                    class="btn btn-sm rounded-pill btn-outline-primary pjax">&nbsp;&nbsp; Add &nbsp;&nbsp;</a></h4>
        </div>
        <div class="card-body">


            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Time start</th>
                        <th>Result</th>
                        <th>Active</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($match as $m)
                    <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->team1}}</td>
                        <td>{{$m->team2}}</td>
                        <td> {{date('H:i:s m/d/Y', strtotime($m->time_start) )}}</td>
                        <td>
                            @switch($m->result)
                            @case(0)
                            {{'Chưa bắt đầu'}}
                            @break
                            @case(1)
                            {{$m->team1}}
                            @break
                            @case(2)
                            {{'Hoà'}}
                            @break
                            @case(3)
                            {{$m->team2}}
                            @break
                            @endswitch
                        </td>
                        <td>{!!$m->is_active == 1 ? '<span style="color:green">Active</span>' : '<span
                                style="color:red">Hide</span>'!!}</td>
                        <td>
                            <a href="{{route('cms.match.edit',['id' => $m->id])}}"
                                class="edit pjax btn btn-sm rounded-pill btn-outline-primary">&nbsp;&nbsp; Edit
                                &nbsp;&nbsp;</a>
                            <a data-id="{{$m->id}}"
                                class="btn btn-sm rounded-pill btn-outline-danger delete">&nbsp;&nbsp; Delete
                                &nbsp;&nbsp;</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    $('#app').on('click','a.edit',function () {
        pjax.loadUrl($(this).attr('href'))
        return false
    })

    $('#app').on('click','.delete',function () {
        if (confirm('Are you sure?')) {
        var formData = new FormData()
        formData.append( '_token', $( '[name="_token"]' ).val() )
        formData.append( 'id', $(this).data('id') ) 

        var element = $(this).parents('tr')

        $.ajax( {
            url: '{{route('cms.match.delete')}}',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function ( data )
            {
                element.hide()
            },
            error: function ( data, textStatus, jqXHR )
            {
                alert('Không thể xoá nội dung này')
            },
        } );
        return false
        }
    })
</script>
@endsection