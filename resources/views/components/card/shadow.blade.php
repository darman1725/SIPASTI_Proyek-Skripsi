<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                {{ $header ?? '' }}
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        }, false);
    </script>
@endpush
