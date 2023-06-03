<form action="/actif/{{ $user->id }}" method="POST">
    @csrf
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <input type="hidden" name="desactif" value="1">
        <input onChange="this.form.submit()" name="actif" data-id="{{ $user->id }}" class="toggle-class"
            type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
            data-off="InActive" {{ $user->actif ? 'checked' : '' }}>
    </div>
</form>
