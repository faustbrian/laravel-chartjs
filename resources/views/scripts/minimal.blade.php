<script>
$(function() {
    var ctx = document.getElementById("{{ $prefix }}{!! $element !!}").getContext("{!! $context !!}");

    new Chart(ctx).{{ $type }}({!! json_encode($datasets) !!}, {!! json_encode($options) !!});
});
</script>
