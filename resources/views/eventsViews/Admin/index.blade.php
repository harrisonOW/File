@extends('layouts.app')

@section('header')
    <h1>
        All Events
        <small>All Events on the site.</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="#" method="get">

             {{--   @include('core::admin.partials.filter-input', [
                    'filters' => [
                        [ 'name', 'Name' ],
                    ]
                ])--}}

            </form>
            <table class="table table-striped table-hover table-datatables">
                <thead>
                <tr>
                    <th>Name</th>

                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->name}}</td>
                        <td>{{$event->description}}</td>
                        <td>{{$event->price}}</td>
                        <td>{{$event->capacity}}</td>
                        <td>{{$event->external_link}}</td>
                        <td>{{$event->start_date->toDayDateTimeString()}}</td>
                        <td>{{$event->finish_date->toDayDateTimeString() }}</td>
                        <td>
                            <a href='/admin/Event/{{$event->id}}' class="btn btn-xs btn-default"><i class="fa fa-search"></i> View</a>

                            <a href='/admin/Event/edit/{{$event->id}}' class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>

                            <a href="#" class="btn btn-xs btn-danger deletebutton" data-url='/admin/Event/destroy/{{$event->id}}' ><i class="fa fa-trash"></i> Delete</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>

                        <a href='/admin/Event/create' class="btn btn-success"><i class="fa fa-plus"></i> Create Event</a>

                    </td>
                </tr>

                </tfoot>
            </table>
        </div>
    </div>
@endsection


