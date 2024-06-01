@extends('admin.admin')
@section('content')
            <div class="card card-primary">
                <div class="card-header">
                    <span>Import Data</span>
                </div>
                <form method="POST" action="{{ route('import-post') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @include('admin.partials.card.info')
                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="file">Upload json file</label>
                                        <div class="input-group">
                                            <input type="file" name="file" id="file">
                                            {!! form_error_message('file', $errors) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-6">
                                    <div class="form-group">
                                        <label for="file_type">Select upload type</label>
                                        <div class="input-group">
                                            <select name="file_type" id="file_type">
                                                <option value="grant">Grant Data</option>
                                                <option value="user">User Data</option>
                                            </select>
                                            {!! form_error_message('file_type', $errors) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    @include('admin.partials.form.form_footer')
                </form>
            </div>
@endsection
