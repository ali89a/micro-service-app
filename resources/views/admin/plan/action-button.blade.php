@php
    $actions = [
                    'edit'=>route('admin.plans.edit', $plan->id),
                ];
@endphp

<div class="d-flex justify-content-center">
    <x-action-component :actions="$actions" status="{{ $plan->status }}" />
</div>




