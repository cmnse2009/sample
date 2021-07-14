@extends('layouts.app')
@section('content')
    <style>
        th,td{
            /* border: solid 2px; */
            height: 50px;
        }
        .danger-table{
            margin: 0 auto;
            width: 100%;
            font-size: 20px;
            color: #f8f8f8;
            text-align: center;
        }
        .danger-table tr:nth-child(odd) td,th {
            background-color: #74a0c3;   /* 奇数行の背景色 */
        }
        .danger-table tr:nth-child(even) td,th {
            background-color: #195788;   /* 偶数行の背景色 */
        }
        .flag_icon img{
            width: 15px;
        }
    </style>
    <div class="main">
        <table class="danger-table">
            <thead>
                <tr>
                    <th></th>
                    <th>観測場所</th>
                    <th>雨量</th>
                    <th>雨量（公認）</th>
                    <th>累加雨量</th>
                    <th>気温</th>
                    <th>風向</th>
                    <th>風速</th>
                    <th>水位</th>
                    <th>指示の内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td class="flag_icon"><img src="{{ asset('img/sample_w.png')}}"></td>
                        <td>{{$data->place}}</td>
                        <td>{{$data->rain_hour}}</td>
                        <td>-</td>
                        <td>{{$data->rain_sum}}</td>
                        <td>{{$data->tmp}}</td>
                        <td>{{$data->direction}}</td>
                        <td>{{$data->wind}}</td>
                        <td></td>
                        <td>指示なし</td>
                        @if ($data->rain_sum > 0)
                            <td><button>送信</button></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
