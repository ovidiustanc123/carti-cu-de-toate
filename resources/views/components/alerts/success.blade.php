<div x-data="{ open: false}" x-init="
    @this.on('{{ $saved }}', () => {
        if (open === false) setTimeout(() => { open = false }, 3500);
        open = true;
    })
    " x-show.transition.out.duration.1000ms="open" style="display: none;"
    class="text-green-500"><b>{{$message}}</b>
</div>
