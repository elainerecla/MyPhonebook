@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding: 20px 0px; height:500px; ">
    <div class="row">
        @include('inc.sidenav')

        <div class="col-sm-10">
            <button type="button" class="btn btn-outline-info mb-2" data-toggle="modal" data-target="#addcontact"><img src="/images/plus.png" alt="plus"> Add contact</button>
            <div class="table" style="overflow-y:scroll; height: 380px">
                <table class="table table-hover border" style="height: 100px; width: 100%; margin: 10px 0;">
                    @include('inc.message')
                    <tbody>
                        <tr>
                            <td class="align-middle"><img src={{route('account.image', ['filename' => $currentauth->photofilename])}} alt="profile" width="64px"></td>
                            <td class="align-middle"><p class="lead">{{$currentauth->firstname}} {{$currentauth->lastname}}</p></td>
                            <td class="align-middle"><p><em>{{$currentauth->phonenumber}}</em></p></td>
                            <td class="align-middle">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editcontact-{{$currentauth->id}}">Edit</a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletecontact">Delete</a>
                            </td>
                        </tr>
    
                        @if(count($contacts) > 0)
                            @foreach ($contacts as $contact)
                                @if (($contact->firstname != $currentauth->firstname) && ($contact->lastname != $currentauth->lastname))
                                    <tr>
                                        <td class="align-middle"><img src={{route('account.image', ['filename' => $contact->photofilename])}} alt="profile" width="64px"></td>
                                        <td class="align-middle"><p class="lead">{{$contact->firstname}} {{$contact->lastname}}</p></td>
                                        <td class="align-middle"><p><em>{{$contact->phonenumber}}</em></p></td>
                                        <td class="align-middle">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editcontact-{{$contact->id}}">Edit</a>
                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deletecontact">Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection

<!--Modals here-->
@include('modals.addcontact')
@if(count($contacts) > 0)
    @include('modals.editcontact')
    @include('modals.deletecontact')
@endif