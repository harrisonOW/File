@extends('layouts.app')

@section('content')
    @push('style')
    <style>
        .input-icon {
            position: relative;
        }

        .input-icon > i {
            position: absolute;
            display: block;
            transform: translate(0, -50%);
            top: 50%;
            pointer-events: none;
            width: 25px;
            text-align: center;
            font-style: normal;
        }

        .input-icon > input {
            padding-left: 25px;
            padding-right: 0;
        }

        .input-icon-left > i {
            left: 0;
        }

        .input-icon-right > input {
            padding-left: 0;
            padding-right: 25px;
            text-align: right;
        }

        .add-Event-Container .card, .add-Event-Container .card .card-body {
            border:none;
        }


    </style>
    @endpush
    <div class="container add-Event-Container">
        <div class="row">
            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-Overview-tab" data-toggle="pill" href="#pills-Overview" role="tab" aria-controls="pills-Overview" aria-expanded="true" aria-selected="true"><i class="fas fa-info-circle"></i><br>Event</a>
                </li>

            </ul>
        </div>
        <div class="row card">
            <form action="/admin/Event" class ="card-body" method="POST" id="EventForm">
                @csrf
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-Overview" role="tabpanel" aria-labelledby="pills-Overview-tab">
                        @include('eventsViews.Admin.partials.create.form')
                        <div class="form-group" id="ExtrasForm">
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    </div>
    <div id="ExtraPill" style="display:none">
        <li class="nav-item" >
            <a class="nav-link" id="pills-Extra1-tab" data-toggle="pill" href="#pills-Extra1" role="tab" aria-controls="pills-Extra1" aria-expanded="true" aria-selected="false"> <i class="fas fa-puzzle-piece"></i><br><p>Extra</p></a>
        </li>
    </div>

    <div id="ExtraBody" style="display:none;">
        @include('eventsViews.Admin.partials.create.extra' )
    </div>

    @push('script')
    <script>
        $( function() {
            var avaliable = ['Extra3','Extra4'];
            var taken = ['Extra1'];
            var first = 0;

            $('#InputStartDate').datetimepicker({
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                inline: true,
                sideBySide: true,

            });
            $('#InputEndDate').datetimepicker({
                useCurrent: false,
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                inline: true,
                sideBySide: true
            });


            $("#InputStartDate").on("change.datetimepicker", function (e) {
                $('#InputEndDate').datetimepicker('minDate', e.date);
            });
            $("#InputEndDate").on("change.datetimepicker", function (e) {
                $('#InputStartDate').datetimepicker('maxDate', e.date);
            });

            function AddExtra(){
                var ExtraPill = $('#ExtraPill').html();
                var ExtraBody = $('#ExtraBody').html();
                $('#pills-tabContent').append(ExtraBody);
                $('#pills-tab').append(ExtraPill);
                $('#ExtraPill .nav-link').attr('id', 'pills-'+avaliable[0]+'-tab');
                $('#ExtraPill .nav-link').attr('href', '#pills-'+avaliable[0]);
                $('#ExtraPill .nav-link').attr('aria-controls', 'pills-'+avaliable[0]);
                $('#ExtraBody .tab-pane').attr('id', 'pills-'+avaliable[0]);
                $('#ExtraBody .tab-pane').attr('aria-labelledby', 'pills-'+avaliable[0]+'-tab');
            }

            $("#Add_Extra").on("click", function (e) {

                if(taken.length <=3) {
                    if(first!=0){
                        taken.push(avaliable[0]);
                    }else{
                        var first = first + 1;
                    }
                    AddExtra();
                    avaliable.shift();

                }
            });

            function returnToEvent(){
                $('#pills-tab').find('#pills-Overview-tab').addClass( "active" );
                $('#pills-tab').find('#pills-Overview-tab').addClass( "show" );
                $('#pills-tabContent').find('#pills-Overview').addClass( "show" );
                $('#pills-tabContent').find('#pills-Overview').addClass( "active" );

            }

            $('body').on('click', 'a[href="#delete_Extra"]', function() {
                console.log("In")
                var foundvalue = $(this).closest('.tab-pane').attr('id');
                var found = taken.findIndex(function(element) {
                        return "pills-"+element == foundvalue;
                });
                if(found != -1) {
                    console.log("deleting >> ", foundvalue, 'using ',taken[found] );
                    $(this).closest('.tab-pane').remove();
                    $('#pills-tab').find('#pills-'+taken[found]+'-tab').remove();
                    avaliable.push(taken[found]);
                    taken.splice(found, 1);
                    returnToEvent();

                }
            });


            $('body').on("keyup","#InputExtraName",function(){
                var elemValue = $(this).val();
                var find = $(this).parents(".tab-pane").attr('id');
                $('a[href="#'+find+'"]').find( "p" ).html(elemValue);
            });



        });
    </script>
    @endpush
@endsection
