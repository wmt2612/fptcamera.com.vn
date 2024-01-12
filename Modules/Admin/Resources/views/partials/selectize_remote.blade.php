@push('globals')
    <script>
        FleetCart.selectize.push({
            load: function (query, callback) {
                var url = this.$input.data('url');
                // $.get(url + '?query=' + query, callback, 'json');
                if (url === undefined || query.length === 0) {
                    // $.get(url + '?query=' + query, callback, 'json');
                    return callback();
                }

                $.get(url + '?query=' + query, callback, 'json');
            },
            // onChange: function(value, isOnInitialize) {
            //     console.log(value);
            // }
        });
    </script>
@endpush
