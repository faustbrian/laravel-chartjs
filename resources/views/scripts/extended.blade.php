<script>
$(function() {
    var ctx = document.getElementById("{{ $prefix }}{!! $element !!}").getContext("{!! $context !!}");

    new Chart(ctx).{{ $type }}({
        @if(!empty($labels))
        labels: {!! json_encode($labels) !!},
        @endif
        datasets: {!! json_encode($datasets) !!}
    },  {!! json_encode($options) !!});
});
</script>
