@extends('layout.default')

@section('breadcrumb')
    <li>
        <a href="{{ route('staff.dashboard.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">@lang('staff.staff-dashboard')</span>
        </a>
    </li>
    <li>
        <a href="{{ route('staff.pages.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Pages</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.pages.edit', ['id' => $page->id]) }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">@lang('common.edit') Page</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="container box">
        <h2>Add a new page</h2>
        <form role="form" method="POST" action="{{ route('staff.pages.update', ['id' => $page->id]) }}">
            @csrf
            <div class="form-group">
                <label for="name">Page @lang('common.name')</label>
                <label>
                    <input type="text" name="name" class="form-control" value="{{ $page->name }}">
                </label>
            </div>
    
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10"
                    class="form-control">{{ $page->content }}</textarea>
            </div>
    
            <button type="submit" class="btn btn-default">Save</button>
        </form>
    </div>
@endsection

@section('javascripts')
    <script nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        $(document).ready(function() {
            $('#content').wysibb({});
            emoji.textcomplete()
        })
    
    </script>
@endsection
