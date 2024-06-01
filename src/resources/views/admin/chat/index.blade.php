@extends('admin.admin')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Snippets</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        <form class="card card-primary" method="POST" action="{{ route('snippets.store') }}" accept-charset="UTF-8">
            @csrf
            <input name="chat" type="hidden" value="chat-snippet">
            <div class="card-body">
                <div class="card-body">
                    @include('admin.partials.card.info')
                    <fieldset>
                        <div class="row">
                                <div class=" col-lg-12">
                                    <div class="form-group">
                                        <label for="">Snippets Name</label>
                                        <input type="text" name="title" class="form-control " placeholder="Name"
                                            value="{{ $chat->title }}">
                                        @if ($errors->has('title'))
                                            <div class="text-red-900" style="color: red">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="chat_script">Code</label>
                                        <textarea id="chat_script" cols="30" rows="10" type="text" name="chat_script" class="form-control"
                                            placeholder="code">{{ $chat->chat_script }}</textarea>
                                        @if ($errors->has('chat_script'))
                                            <div class="text-red-900" style="color: red">{{ $errors->first('chat_script') }}</div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-right mb-1 ml-1">
                    <a href="/admin/pricing-property" class="btn btn-secondary">
                        <i class="fa fa-fw fa-chevron-left"></i> Back
                    </a>
                </div>
                <div class="text-right mb-1">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="fa fa-fw fa-save"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div> <br>
    

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Google Analytics</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @if (Session::get('succes'))
            <div class="alert alert-info">{{ Session::get('succes') }}</div>
        @endif
        <form class="card card-primary" method="POST" action="{{ route('snippets.store2') }}" accept-charset="UTF-8">
            @csrf
            <input name="google_analytics_chat" type="hidden" value="google_analytics_snippet">
            <div class="card-body">
                <div class="card-body">
                    @include('admin.partials.card.info')
                    <fieldset>
                        <div class="row">
                                <div class=" col-lg-12">
                                    <div class="form-group">
                                        <label for="">Google Analytics Name</label>
                                        <input type="text" name="google_analytics_title" class="form-control " placeholder="Name"
                                        @if(isset($latestChat)) value="{{ $latestChat->google_analytics_title }}" @endif>
                                        @if ($errors->has('google_analytics_title'))
                                            <div class="text-red-900" style="color: red">{{ $errors->first('google_analytics_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="google_analytics_chat_script">Google Analytics Code</label>
                                        <textarea id="chat_script" cols="30" rows="10" type="text" name="google_analytics_chat_script" class="form-control"
                                            placeholder="code">@if(isset($latestChat))  {{ $latestChat->google_analytics_chat_script }} @endif </textarea>
                                        @if ($errors->has('google_analytics_chat_script'))
                                            <div class="text-red-900" style="color: red">{{ $errors->first('google_analytics_chat_script') }}</div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-right mb-1 ml-1">
                    <a href="/admin/pricing-property" class="btn btn-secondary">
                        <i class="fa fa-fw fa-chevron-left"></i> Back
                    </a>
                </div>
                <div class="text-right mb-1">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="fa fa-fw fa-save"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
