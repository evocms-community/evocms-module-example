@extends('example::layout')

@section('buttons')
    <div id="actions">
        <div class="btn-group">
            <a href="javascript:;" class="btn btn-success" onclick="location.reload();">
                <i class="fa fa-refresh"></i><span>@lang('example::global.refresh')</span>
            </a>
        </div>
    </div>
@endsection

@section('body')
    <div class="tab-page" id="tab_main">
        <h2 class="tab">
            @lang('example::global.items_list')
        </h2>

        <script type="text/javascript">
            tpModule.addTabPage(document.getElementById('tab_main'));
        </script>

        <form name="list" action="{{ route('example::index') }}">
            <div class="row">
                <table class="table data">
                    <thead>
                        <tr>
                            <td style="width: 1%;"></td>
                            <td>@lang('example::global.item_name')</td>
                            <td>@lang('example::global.created_at')</td>
                            <td>@lang('example::global.updated_at')</td>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <td colspan="4">
                                {{ $list->links('example::links') }}

                                @lang('example::global.shown_from', [
                                    'count' => $list->count(),
                                    'total' => $list->total(),
                                ])
                            </td>
                        </tr>
                    </tfoot>

                    <tbody class="example-list">
                        @forelse ($list as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('example::edit_item', $item->id) }}" class="fa fa-pencil" title="@lang('example::global.edit_item')"></a>
                                </td>
                                <td><a href="{{ route('example::edit_item', $item->id) }}">{{ $item->name }}</a></td>
                                <td>{{ $item->created_at ? $item->created_at->format('d.m.Y H:i:s') : '' }}</td>
                                <td>{{ $item->updated_at ? $item->updated_at->format('d.m.Y H:i:s') : '' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    @lang('example::global.no_items')
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection

