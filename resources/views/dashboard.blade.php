@extends('dashboard::layouts/master')

@section('content')

    <script>
        window.dashboard = {!! json_encode(
            compact('pusherKey', 'pusherCluster', 'usingNodeServer', 'nodeServerAddress')
       ) !!};
    </script>

    <dashboard id="dashboard" columns="6" rows="3">
        <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a3"></twitter>
        <calendar position="b1:b3"></calendar>
        <uptime position="c1"></uptime>
        <music position="d1:e1"></music>

        <tasks team-member="alex" position="c2"></tasks>
        <tasks team-member="brent" position="d2"></tasks>
        <tasks team-member="freek" position="e2"></tasks>
        <tasks team-member="harish" position="c3"></tasks>
        <tasks team-member="seb" position="d3"></tasks>
        <tasks team-member="willem" position="e3"></tasks>

        <time-weather position="f1" date-format="ddd DD/MM"></time-weather>
        <packagist position="f2"></packagist>
        <github position="f3"></github>
        <internet-connection></internet-connection>
    </dashboard>

@endsection
