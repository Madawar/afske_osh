<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Information
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <p>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {!!session('message') !!}
                        </div>
                    @endif
                </p>
            </main>
            <footer class="modal__footer">
                <button class="inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded ripple hover:bg-red-100 focus:outline-none" data-micromodal-close aria-label="Close this dialog window">Close</button>
                <button wire:click="reload" class="mt-1 inline-block px-6 py-0 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none">New Report</button>
            </footer>
        </div>
    </div>
</div>
