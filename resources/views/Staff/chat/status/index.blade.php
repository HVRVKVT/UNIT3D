@extends('layout.default')

@section('breadcrumb')
    <li>
        <a href="{{ route('staff.dashboard.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">@lang('staff.staff-dashboard')</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.statuses.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Chat Statuses</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="container box">
        <h2>@lang('common.user') Chat Statuses</h2>
    
        <button class="btn btn-primary" data-toggle="modal" data-target="#addChatStatus">Add New Chat Status</button>
        <div id="addChatStatus" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dark">
                <div class="modal-content">
    
                    <div class="modal-header" style="text-align: center;">
                        <h3>Add Chat Status</h3>
                    </div>
    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('staff.statuses.store') }}">
                        @csrf
                        <div class="modal-body" style="text-align: center;">
                            <h4>Please fill in all fields for the chat status you would like to create.</h4>
                            <label for="chatstatus_name"> @lang('common.name'):</label> <label for="name"></label><input
                                style="margin:0 auto; width:300px;" type="text" class="form-control" name="name" id="name"
                                placeholder="Enter @lang('common.name') Here..." required>
                            <label for="chatstatus_color"> Color:</label> <label for="color"></label><input
                                style="margin:0 auto; width:300px;" type="text" class="form-control" name="color" id="color"
                                placeholder="Enter Hex Color Code Here..." required>
                            <label for="chatstatus_icon"> Icon:</label> <label for="icon"></label><input
                                style="margin:0 auto; width:300px;" type="text" class="form-control" name="icon" id="icon"
                                placeholder="Enter Font Awesome Code Here..." required>
                        </div>
    
                        <div class="modal-footer">
                            <button class="btn btn-md btn-default" data-dismiss="modal">@lang('common.cancel')</button>
                            <input class="btn btn-md btn-primary" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="table-responsive">
            <table class="table table-condensed table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('common.name')</th>
                        <th>Color</th>
                        <th>Icon</th>
                        <th>@lang('common.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chatstatuses as $chatstatus)
                        <tr>
                            <td>
                                {{ $chatstatus->id }}
                            </td>
                            <td>
                                <a href="#">
                                    {{ $chatstatus->name }}
                                </a>
                            </td>
                            <td>
                                <i class="{{ config('other.font-awesome') }} fa-circle"
                                    style="color: {{ $chatstatus->color }};"></i> {{ $chatstatus->color }}
                            </td>
                            <td>
                                <i class="{{ $chatstatus->icon }}"></i> [{{ $chatstatus->icon }}]
                            </td>
                            <td>
                                <button class="btn btn-xs btn-warning" data-toggle="modal"
                                    data-target="#editChatStatus-{{ $chatstatus->id }}">
                                    <i class="{{ config('other.font-awesome') }} fa-pen-square"></i>
                                </button>
                                <button class="btn btn-xs btn-danger" data-toggle="modal"
                                    data-target="#deleteChatStatus-{{ $chatstatus->id }}">
                                    <i class="{{ config('other.font-awesome') }} fa-trash"></i>
                                </button>
                                @include('Staff.chat.status.chatstatuses_modals', ['chatstatus' => $chatstatus])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
