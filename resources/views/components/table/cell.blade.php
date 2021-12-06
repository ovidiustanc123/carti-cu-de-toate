<td {{ $attributes->except('id')->merge(['class' => 'px-5 py-4']) }}>
    <span class="flex flex-wrap gap-y-1" {{ $attributes->except('class') }}>{{ $slot }}</span>
</td>
