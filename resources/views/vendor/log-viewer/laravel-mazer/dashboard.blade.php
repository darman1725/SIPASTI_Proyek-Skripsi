<x-app-layout>
    @include('backend.layouts.log-viewer-style')
    <x-card.index>
        <x-slot name="header">
            <x-card.title :icon="'inboxes-fill'" :title="'Dashboard'"></x-card.title>
            <div>
                <x-button.view :href="url('admin/log-viewer/logs')"></x-button.view>
            </div>
        </x-slot>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <canvas id="stats-doughnut-chart" height="300" class="mb-3"></canvas>
            </div>

            <div class="col-md-6 col-lg-9">
                <div class="row">
                    @foreach ($percents as $level => $item)
                        <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
                            <div class="box level-{{ $level }} {{ $item['count'] === 0 ? 'empty' : '' }}">
                                <div class="box-icon">
                                    {!! log_styler()->icon($level) !!}
                                </div>

                                <div class="box-content">
                                    <span class="box-text">{{ $item['name'] }}</span>
                                    <span class="box-number">
                                        {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                                    </span>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-card.index>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="{{ Vite::asset('resources/js/Chart.min.js') }}"></script>
<script>
    $(function() {
        new Chart(document.getElementById("stats-doughnut-chart"), {
            type: 'doughnut',
            data: {!! $chartData !!},
            options: {
                legend: {
                    position: 'bottom'
                }
            }
        });
    });
</script>
