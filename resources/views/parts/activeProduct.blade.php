<form action="/active/{{ $card->id }}" method="POST">
    @csrf
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <input type="hidden" name="desactive" value="1">
        <input onChange="this.form.submit()" name="active" data-id="{{ $card->id }}" class="toggle-class"
            type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
            data-off="InActive" {{ $card->actif ? 'checked' : '' }}>
    </div>
</form>
