@extends('layouts.app')
@section('content')
    <div class="main">
        <table>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection