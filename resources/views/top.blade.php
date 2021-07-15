<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>平常時画面</title>
    <link rel="stylesheet" href="css/normal.css">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="{{ asset('css/normal.css') }}"> -->
</head>
<style>
    .danger-table th,.danger-table td{
        height: 50px;
    }
    .danger-table{
        margin: 0 auto;
        width: 100%;
        font-size: 20px;
        color: #f8f8f8;
        text-align: center;
        border-spacing: 0px;
    }
    .danger-table tr:nth-child(odd) td,th{
        background-color: #74a0c3;   /* 奇数行の背景色 */
    }
    .danger-table tr:nth-child(even) td,th{
        background-color: #195788;   /* 偶数行の背景色 */
    }
    .flag_icon img{
        width: 15px;
    }
</style>

<body>
    <div class="wrapper normal" id="normal">
        <div class="left-box">
            <img class="left-image" src="img/road1.png" alt="">
            <img class="left-image" src="img/road2.png" alt="">
            <img class="left-image" src="img/road3.png" alt="">
            <img class="left-image" src="img/road4.png" alt="">
        </div>

        <div class="right-box">
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
                                <img src="{{ asset('img/dir_icon.svg') }}" data-angle="{{$data->dir}}">
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


            <div class="image">
                <img class="right-image" src="img/rain1.png" alt="">
                <img class="right-image" src="img/rain2.png" alt="">
            </div>
        </div>
    </div>
    <div id="danger">
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
                        <td id="rain_hour-{{$data->id}}">{{round($data->rain_hour,1)}}mm</td>
                        <td>-</td>
                        <td id="rain_sum-{{$data->id}}">{{round( $data->rain_sum,1)}}mm</td>
                        <td>{{$data->tmp}}℃</td>
                        <td>{{$data->direction}}</td>
                        <td>{{$data->wind}}m</td>
                        <td>-</td>
                        <td>指示なし</td>
                        @if ($data->rain_hour > 0)
                            <td><button class="btn-danger">送信</button></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                {{-- sample --}}
                <tr>
                    <td class="flag_icon"><img src="{{ asset('img/sample_y.png')}}"></td>
                    <td>Sample</td>
                    <td style="color: yellow">65mm</td>
                    <td>-</td>
                    <td>68mm</td>
                    <td>25.7℃</td>
                    <td>西</td>
                    <td>1.2m</td>
                    <td>-</td>
                    <td style="color: yellow">避難準備</td>
                    <td><button class="btn-danger">送信</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div><input type="hidden" id="status" value="0" /></div>
    <script>
        $(function(){
            $("td .icon-js").each(function (i) {
                var angle = $(this).children('img').data('angle');
                console.log(angle);
                $(this).children('img').css('transform',`rotate(${angle}deg)`)
            });
            if($('#status').val()==0){
                $('#danger').css('display','none');
            }else{
                $('#normal').css('display','none');
                $('#danger').css('display','block');
            }
        });
        function rain_judge(){
        }
    </script>
</body>

