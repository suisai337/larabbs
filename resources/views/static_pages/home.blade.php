@extends('layouts.default')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h4>爱情宣言</h4>
                <hr>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
                <section class="stats mt-2">
                    @include('shared._stats', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>你好，张砺文</h1>
            <p class="lead">
                我走过许多地方的路 喝过许多种饮料 看过许多蓝天白云。
            </p>
            <h5>
                <a href="https://learnku.com/courses/laravel-essential-training">只爱一个正当好年纪的你</a>
            </h5>
            <p>
                <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">现在启程</a>
            </p>
        </div>
    @endif
@stop