<section class="advantages">
    <div class="container">
        <h2 class="h3 primary-text anim">
            {{ __('translations.SignagesAdvantage') }}?
        </h2>
        <div class="row g-0 anim mt-4">
            @foreach($whyDigital as $why)
                <div class="col-lg-6">
                    <div class="@if($loop->first) start-content @else end-content @endif content">
                        <h4>{{ $why->title }}</h4>
                        <p>{!! $why->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
