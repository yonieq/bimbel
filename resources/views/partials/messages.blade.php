@if(Session::has('success'))
    <div id="success-alert" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('error'))
    <div id="error-alert" class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

@pushonce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var successAlert = document.getElementById('success-alert');
                var errorAlert = document.getElementById('error-alert');

                if (successAlert) {
                    successAlert.style.display = 'none';
                }

                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }, 10000);
        });
    </script>
@endpushonce
