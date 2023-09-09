<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div
        aria-atomic="true"
        aria-live="assertive"
        class="toast align-items-center text-bg-{{ $color }} border-0"
        id="{{ $color }}Toast"
        role="alert"
    >
        <div class="d-flex justify-content-between">
            <div class="toast-body">
                {{ $message }}
            </div>
            <button
                aria-label="Close"
                class="d-block btn-close btn-close-white me-2 my-auto"
                data-bs-dismiss="toast"
                type="button"
            ></button>
        </div>
    </div>
</div>

<script>
    const toastTrigger = document.getElementById('{{ $color }}ToastBtn')
    const toastLiveExample = document.getElementById('{{ $color }}Toast')
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastBootstrap.show()
</script>
