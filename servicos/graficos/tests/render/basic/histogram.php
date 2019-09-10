

        <!-- Test 4 -->
        <div id="test-4" class="test">
            <div class="epoch"></div>
            <p>
                <button data-range="0,100">Range [0, 100]</button>
                <button data-range="0,50">Range [0, 50]</button>
                <button data-range="25,75">Range [25, 75]</button> |
                <button class="cutOutliers">Cut Outliers</button>
                <button class="keepOutliers">Keep Outliers</button> |
                <button class="refresh">Refresh</button>
            </p>
        </div>
        <script>
        $(function() {
            var chart = $('#test-4 .epoch').epoch({
                type: 'histogram',
                buckets: 25,
                data: beta(2, 5)
            });

            $('#test-4 button[data-range]').click(function(e) {
                var range = $(e.target).attr('data-range').split(',').map(function(d) { return +d; });
                chart.option('bucketRange', range);
            });

            $('#test-4 .cutOutliers').click(function(e) {
                chart.option('cutOutliers', true);
            });

            $('#test-4 .keepOutliers').click(function(e) {
                chart.option('cutOutliers', false);
            });

            $('#test-4 button.refresh').click(function(e) {
                chart.update( beta(2, 5) );
            });
        });
        </script>
