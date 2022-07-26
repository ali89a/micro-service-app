@php
    $actions = [
                    'edit'=>route('admin.permission.edit', $query->id),
                ];
@endphp

<div class="d-flex justify-content-center">
    <x-action-component :actions="$actions" status="{{ $query->status }}" />
</div>




