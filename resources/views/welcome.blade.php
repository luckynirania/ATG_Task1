<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ATG.World</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            table {
                margin: 0px auto;
                border-collapse: collapse;
                width: 80%;
            }

            th, td {
                text-align: left;
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }

            tr:nth-child(even) {background-color: #f2f2f2;}
            tr:hover {background-color:#f5f5f5;}

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="top-right links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('adduser') }}">Add Entry</a>
        </div>
            <div class="content">
                <div class="title m-b-md">
                    ATG.World
                </div>
            </div>
            @if (count($data) > 0)
                <table class = "table table-striped">
                    @if (session('success'))
                        <caption style="text-align: center">{{ session('success') }}</caption>
                    @endif
                    <thead>
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Pin Code </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $device)
                            <tr>
                                <td> {{ $device->name}}  </td>
                                <td> {{ $device->email}}  </td>
                                <td> {{ $device->pincode}}  </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1 style="text-align: center">Table is empty </h1>
            @endif
    </body>
</html>
