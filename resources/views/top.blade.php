@extends('layouts.app')
@section('content')
<style>
    .lpwa_data_table{width: 500px;}
    .lpwa_data_table th,td{border: solid 1px;text-align-last:center;}
    .lpwa_data_table th{background-color: #ecd967;}
    .lpwa_data_table tbody td span{font-size: x-large;}
    .lpwa_data_table tbody td img{width: 20px;}
</style>
    <table class="lpwa_data_table">
        @foreach ($datas as $data)
        <thead>
            <tr>
                <th>観測地点</th>
                <th>気温</th>
                <th>湿度</th>
                <th>方向</th>
                <th>風速</th>
                <th>瞬間風速</th>
            </tr>
        </thead>
        <tbody>
            <tr class="lpwa_data{{$data->id}}">
                <td>{{$data->place}}</td>
                <td><span>{{$data->tmp}}</span>℃</td>
                <td><span>{{$data->hm}}</span>％</td>
                <td>
                    <div class="icon-js">
                        <img src="{{ asset('img/dir_icon.svg')}}" data-angle="{{$data->dir}}">
                    </div>
                    <div>
                        {{$data->direction}}
                    </div>
                </td>
                <td><span>{{$data->wind}}</span>ｍ</td>
                <td><span>{{$data->gust}}</span>ｍ</td>
            </tr>
        </tbody>
        @endforeach
    </table>

<script>
    $(function(){
        $("td .icon-js").each(function (i) {
            var angle = $(this).children('img').data('angle');
            console.log(angle);
            $(this).children('img').css('transform',`rotate(${angle}deg)`)
        });
    })
</script>
@endsection
