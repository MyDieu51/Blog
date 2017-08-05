@extends('layouts.master')

@section('content')

    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-11 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new post</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('blog.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-1 control-label">Title</label>

                                <div class="col-md-11">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-1 control-label">Content</label>

                                <div class="col-md-11">
                                    <textarea class="form-control" id="content" name="content">
                                    </textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-1 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
			 CKEDITOR.replace( 'content');
		</script>
@endpush