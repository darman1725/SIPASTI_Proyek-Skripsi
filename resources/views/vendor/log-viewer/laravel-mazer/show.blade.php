<x-app-layout>
    @include('backend.layouts.log-viewer-style')
    <x-card.index>
        <x-slot name="header">
            <x-card.title :icon="'journal-text'" :title="'Log ' . $log->date"></x-card.title>
            <div>
                <x-button.back :href="url('admin/log-viewer/logs')"></x-button.back>
            </div>
        </x-slot>
        <div class="row">
            <div class="col-lg-2">
                {{-- Log Menu --}}
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        <i class="fa fa-fw fa-flag"></i> @lang('Levels')
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="list-group list-group-flush log-menu">
                            @foreach ($log->menu() as $levelKey => $item)
                                @if ($item['count'] === 0)
                                    <a
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled">
                                        <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                        <span class="badge empty">{{ $item['count'] }}</span>
                                    </a>
                                @else
                                    <a href="{{ $item['url'] }}"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center level-{{ $levelKey }}{{ $level === $levelKey ? ' active' : '' }}">
                                        <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                        <span class="badge badge-level-{{ $levelKey }}">{{ $item['count'] }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                {{-- Log Details --}}
                <div class="card mb-4 shadow">
                    <div class="card-header">
                        @lang('Log info') :
                        <div class="group-btns pull-right">
                            <a href="{{ route('log-viewer::logs.download', [$log->date]) }}"
                                class="btn btn-sm btn-success">
                                <i class="fa fa-download"></i> @lang('Download')
                            </a>
                            <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal">
                                <i class="fa fa-trash-o"></i> @lang('Delete')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-condensed mb-0">
                                <tbody>
                                    <tr>
                                        <td>@lang('File path') :</td>
                                        <td colspan="7">{{ $log->getPath() }}</td>
                                    </tr>
                                    <tr>
                                        <td>@lang('Log entries') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $entries->total() }}</span>
                                        </td>
                                        <td>@lang('Size') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->size() }}</span>
                                        </td>
                                        <td>@lang('Created at') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                                        </td>
                                        <td>@lang('Updated at') :</td>
                                        <td>
                                            <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- Search --}}
                        <form action="{{ route('log-viewer::logs.search', [$log->date, $level]) }}" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="query" name="query" class="form-control"
                                        value="{{ $query }}" placeholder="@lang('Type here to search')">
                                    <div class="input-group-append">
                                        @unless(is_null($query))
                                            <a href="{{ route('log-viewer::logs.show', [$log->date]) }}"
                                                class="btn btn-secondary">
                                                (@lang(':count results', ['count' => $entries->count()])) <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        @endunless
                                        <button id="search-btn" class="btn btn-primary">
                                            <span class="fa fa-fw fa-search"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Log Entries --}}
                <div class="card mb-4 shadow">
                    @if ($entries->hasPages())
                        <div class="card-header">
                            <span class="badge badge-info float-right">
                                {{ __('Page :current of :last', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()]) }}
                            </span>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="entries" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>@lang('ENV')</th>
                                        <th style="width: 120px;">@lang('Level')</th>
                                        <th style=" width: 65px;">@lang('Time')</th>
                                        <th>@lang('Header')</th>
                                        <th class="text-right">@lang('Actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($entries as $key => $entry)
                                        <tr>
                                            <td>
                                                <span class="badge badge-env">{{ $entry->env }}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-level-{{ $entry->level }}">
                                                    {!! $entry->level() !!}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $entry->datetime->format('H:i:s') }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $entry->header }}
                                            </td>
                                            <td class="text-right">
                                                @if ($entry->hasStack())
                                                    <a class="btn btn-sm btn-light" role="button"
                                                        data-toggle="collapse" href="#log-stack-{{ $key }}"
                                                        aria-expanded="false"
                                                        aria-controls="log-stack-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> @lang('Stack')
                                                    </a>
                                                @endif

                                                @if ($entry->hasContext())
                                                    <a class="btn btn-sm btn-light" role="button"
                                                        data-toggle="collapse" href="#log-context-{{ $key }}"
                                                        aria-expanded="false"
                                                        aria-controls="log-context-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> @lang('Context')
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($entry->hasStack() || $entry->hasContext())
                                            <tr>
                                                <td colspan="5" class="stack py-0">
                                                    @if ($entry->hasStack())
                                                        <div class="stack-content collapse"
                                                            id="log-stack-{{ $key }}">
                                                            {!! $entry->stack() !!}
                                                        </div>
                                                    @endif

                                                    @if ($entry->hasContext())
                                                        <div class="stack-content collapse"
                                                            id="log-context-{{ $key }}">
                                                            <pre>{{ $entry->context() }}</pre>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entries->appends(compact('query'))->render() !!}
            </div>
        </div>
    </x-card.index>
</x-app-layout>
