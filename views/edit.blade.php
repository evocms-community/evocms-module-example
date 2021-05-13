@extends('example::layout')

@section('pagetitle')
    @lang('example::global.item_caption', [
        'name' => $item->name,
    ])
@endsection

@section('buttons')
    <div id="actions">
        <div class="btn-group">
            <a href="javascript:;" class="btn btn-success" onclick="document.forms.edit.submit();">
                <i class="fa fa-save"></i><span>@lang('global.save')</span>
            </a>

            <a class="btn btn-secondary" href="{{ route('example::index') }}">
                <i class="fa fa-times-circle"></i><span>@lang('global.paging_prev')</span>
            </a>
        </div>
    </div>
@endsection

@section('body')
    <div class="tab-page" id="tab_main">
        <h2 class="tab">
            @lang('example::global.item_edit')
        </h2>

        <script type="text/javascript">
            tpModule.addTabPage(document.getElementById('tab_main'));
        </script>

        <form name="edit" action="" method="post" onsubmit="documentDirty = false;">
            <div class="form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description', $item->description) }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">@lang('global.save')</button>
        </form>
    </div>
@endsection

@push('scripts')
    {!! $richtextinit !!}
@endpush
