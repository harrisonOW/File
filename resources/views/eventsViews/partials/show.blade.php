@extends('layouts.app')


@section('content')
    @push('style')
    <style>

    .Event-card {
        position:relative;
        background:lightslategrey;
        height:50vh;
    }
    .date {
        height:150px;
        width:150px;
        border: 2px solid white;
        border-radius:50%;
        text-align:center;
        background: red;
        position:absolute;
    }
    .date .day{
        color:white;
        font-size:2em;
    }

     .date .month{
         color:white;
         font-size:2em;
         font-weight:bolder;
     }

    .Event-image-container img {
         height:100%;
         width:100%;
     }


    </style>
    @endpush

<div class="container">
    <div class="row">
            <div class="Event-card">
                <div class="Event-image-container">
                    <div class="date">
                        <div class="day">{{$event->start_date}}</div>
                        <hr>
                        <div class="month">Mar</div>
                    </div>
                    <img class="Event-image" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>
                </div>

                <div class="Event-content">
                    <div class="category">Seminar</div>
                    <h1 class="title">City Lights in New York</h1>
                    <h2 class="sub_title">The city that never sleeps.</h2>
                    <p class="description">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
                </div>
            </div>
    </div>
</div>

@push('script')
    <script>

    </script>
@endpush
@endsection
