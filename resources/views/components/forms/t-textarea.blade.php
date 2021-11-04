<div class="form-control">
    @if ($label)
        <label class="label">
            <span class="label-text block text-xs font-semibold text-gray-600 uppercase">{{ $label }}</span>
        </label>
    @endif
    <textarea
        {{ $attributes->class(['textarea h-24 textarea-bordered', 'input-error' => $errors->has($name)])->merge(['class' => '']) }}
        placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}"></textarea>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
