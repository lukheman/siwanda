@if (session('success') || session('error'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-transition.opacity.duration.500ms
         x-init="setTimeout(() => show = false, 4000)" 
         class="toast-container position-fixed top-0 end-0 p-3" 
         style="z-index: 1100; margin-top: 60px;">
        <div class="toast show align-items-center text-white border-0 shadow-lg bg-{{ session('success') ? 'success' : 'danger' }}" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fw-medium">
                    <i class="fas {{ session('success') ? 'fa-check-circle' : 'fa-exclamation-triangle' }} me-2 fs-5 align-middle"></i>
                    <span class="align-middle">{{ session('success') ?? session('error') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-3 m-auto" @click="show = false" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
