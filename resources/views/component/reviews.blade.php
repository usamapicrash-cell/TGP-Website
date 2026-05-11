<div class="testimonial-slider-area section-space--ptb_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h2 class="font-weight--bold mb-20">
                        {{ $reviewSetting->review_heading ?? 'What Our Customers Say' }}
                    </h2>
                    <p class="text-center container" style="max-width: 850px;">
                        {{ $reviewSetting->review_description ?? "Don't just take our word for it – hear from homeowners and business owners across Portland who've trusted The Glass People for their glass repair, replacement, and installation needs." }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Condition: Agar Admin ne Google Widget Code dala hai to wo dikhao --}}
        @if($reviewSetting && $reviewSetting->google_widget_code)
            <div class="row">
                <div class="col-12 mb-5">
                    {!! $reviewSetting->google_widget_code !!}
                </div>
            </div>
        @else
            {{-- Warna Manual Reviews show honge --}}
            <div class="row">
                @php
                    $manual_reviews = [
                        ['name' => 'Chris Spyker', 'stars' => 5, 'text' => 'Had a great experience with The Glass People. They replaced just the glass (not the whole frame) in our foggy breakfast nook window... The new glass is crystal clear!'],
                        ['name' => 'David L', 'stars' => 5, 'text' => 'My second time using The Glass People for replacement glass for failed double pane windows. Cordial, prompt, professional.'],
                        ['name' => 'Susy Wolfson', 'stars' => 5, 'text' => 'These folks are great. I had some custom glass panels made for kitchen cupboards. Price was great. Project took just a couple of days.'],
                        ['name' => 'Steve Adams', 'stars' => 5, 'text' => 'I bought replacement double pane glass for a bunch of windows. They did a great job. As a DIYer it was great to watch the pros do the install.'],
                        ['name' => 'Stacie Anderson', 'stars' => 5, 'text' => 'Great experience. They came out quickly to bid and efficiently replaced the glass in our sliding door. Super easy to work with.']
                    ];
                @endphp

                @foreach($manual_reviews as $review)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="static-review-card h-100 shadow-sm border-0">
                        <div class="review-icon-float">
                            <div class="bubble-shape">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>

                        <div class="review-content">
                            <p class="review-body text-muted italic mb-20">"{{ Str::limit($review['text'], 250) }}"</p>
                        </div>

                        <div class="review-footer-meta">
                            <p class="mb-0 text-muted" style="color: #333;">{{ $review['name'] }}</p>
                            <div class="stars text-warning" style="font-size: 13px;">
                                @for($i=0; $i<$review['stars']; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <div class="cta-promise-bar mt-5">
            <div class="promise-text-wrap">
                <span>
                    {!! $reviewSetting->promise_text ?? 'The Neighborly Done Right Promise® delivered by <br> <strong style="color: var(--theme-blue)">The Glass People®</strong>, a proud Neighborly company.' !!}
                </span>
            </div>
            
            <a href="{{ $reviewSetting->promise_link ?? '#' }}" class="btn-request-quote">
                <i class="far fa-calendar-alt"></i> Request A Free Quote
            </a>
        </div>
    </div>
</div>