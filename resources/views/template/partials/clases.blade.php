<style>
    @foreach($fonts as $font)
    {{ ".".$font->name }} {
        font-family: {{ $font->font_family }};
    }
    @endforeach
</style>