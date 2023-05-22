<div class="order-service-wrap mt-5">
    <div class="play-btn-wrapper d-flex align-items-center justify-content-center">
        <div class="mr-5">{{ __('translations.callInWhats') }}</div>
        <div class="play-btn play-service-button ml-5 mr-5">
            <a href="https://api.whatsapp.com/send?phone={{ $settings->translations->whatsapp }}"
               target="_blank">
                <button tabindex="0">
                    <i class="fa-brands fa-whatsapp fa-beat-fade fa-2x" style="color: #ffffff;"></i>
                </button>
            </a>
        </div>
        <div class="ml-5">
            {{ __('translations.Or Call') }}<br/>
            <a href="tel:{{ $settings->translations->tel }}">{{ $settings->translations->tel }}</a>
        </div>
    </div>
</div>
