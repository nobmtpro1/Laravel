@extends('cms.layout.master')
@section('title')
{{$title}}
@endsection
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Table &nbsp;
                {{-- <a href="{{route('cms.bet.export')}}" class="btn btn-sm rounded-pill btn-outline-primary">&nbsp;&nbsp;
                    Export correct &nbsp;&nbsp;</a> --}}
                {{-- <a href="{{route('cms.bet.export_lucky')}}"
                    class="btn btn-sm rounded-pill btn-outline-primary">&nbsp;&nbsp;
                    Export lucky &nbsp;&nbsp;</a> --}}
            </h4>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="first-name-vertical">Match</label>
                        <select class="form-control" name="match" id="">
                            <option value="">All</option>
                            @foreach ($match as $m)
                            <option @if(request()->get('match') == $m->id) selected @endif
                                value="{{$m->id}}">{{$m->team1 .' - '. $m->team2}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="first-name-vertical">bet</label>
                        <select class="form-control" name="result" id="">
                            <option @if(request()->get('result') == null) selected @endif value="">All</option>
                            <option @if(request()->get('result') == 1) selected @endif value="1">Team 1 thắng</option>
                            <option @if(request()->get('result') == 3) selected @endif value="3">Team 2 thắng</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group mt-4">
                        <a href="{{route('cms.bet.export',request()->all())}}"
                            class="form-control btn rounded-pill btn-outline-primary pjax">&nbsp;&nbsp;
                            Export &nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        {{-- <th>CMND</th> --}}
                        <th>Match</th>
                        <th>Bet</th>
                        <th>Result</th>
                        <th>Lucky</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bet as $m)
                    <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->name}}</td>
                        <td>{{$m->phone}}</td>
                        {{-- <td>{{$m->cmnd}}</td> --}}
                        <td>{{@$m->match->team1 .' - '. @$m->match->team2 }}</td>
                        <td>
                            {{@$m->result == 1 ? @$m->match->team1 : @$m->match->team2}}
                        </td>
                        <td>
                            @if (@$m->match->result > 0)
                            {!!$m->result == @$m->match->result ? '<span class=" text-success">Đúng</span>' : '<span
                                class=" text-danger">Sai</span>'!!}
                            @endif
                        </td>
                        <th>
                            @if ($m->is_lucky == 1)
                            {!!'<span class=" text-success">Có</span>'!!}
                            @endif
                        </th>
                        <td> {{date('H:i:s m/d/Y', strtotime($m->created_at) )}}</td>
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
    $(document).on('change','[name="match"]',function () {
        var url = new URL(window.location.href);
        url.searchParams.set('match', $(this).val());
        window.location.href = url
    })

    $(document).on('change','[name="result"]',function () {
        var url = new URL(window.location.href);
        url.searchParams.set('result', $(this).val());
        window.location.href = url
    })
</script>
@endsection