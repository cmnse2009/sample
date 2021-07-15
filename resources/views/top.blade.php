
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


<body>

    <div class="wrapper">

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


            <div class="image">
                <img class="right-image" src="img/rain1.png" alt="">
                <img class="right-image" src="img/rain2.png" alt="">
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $("td .icon-js").each(function (i) {
                var angle = $(this).children('img').data('angle');
                console.log(angle);
                $(this).children('img').css('transform',`rotate(${angle}deg)`)
            });
        });
    </script>
</body>

