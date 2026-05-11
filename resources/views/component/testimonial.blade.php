<div class="testimonial-slider-area section-space--ptb_100 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap text-center section-space--mb_60">
                    <h2 class="font-weight--bold mb-20">{{ $PReview->review_heading ?? 'What Our Customers Say' }}</h2>
                    <p class="text-center container" style="max-width: 850px;">
                        {{ $PReview->review_description ?? "Don't just take our word for it – hear from homeowners and business owners across Portland..." }}
                    </p>
                </div>
            </div>
        </div>

        @if($PReview && $PReview->google_widget_code)
            <div class="row">
                <div class="col-12 mb-5">
                    {!! $PReview->google_widget_code !!}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center view-all-container mb-40">
                    <a href="{{ url('/our-reviews') }}" class="btn-view-all">View All Reviews</a>
                </div>
            </div>

            <div class="row">
                @php
                    // Aap isko bhi database se fetch kar sakte hain, abhi static array logic hai
                    $manual_reviews = [
                        ['name' => 'Chris Spyker', 'stars' => 5, 'text' => 'Had a great experience with The Glass People...', 'tags' => 'Glass Installation'],
                        ['name' => 'David L', 'stars' => 5, 'text' => 'My second time using The Glass People...', 'tags' => 'Glass Installation'],
                        ['name' => 'Susy Wolfson', 'stars' => 5, 'text' => 'These folks are great. I had some custom glass panels...', 'tags' => 'Custom Glass'],
                    ];
                @endphp

                @foreach($manual_reviews as $review)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="static-review-card h-100 shadow-sm border-0">
                        <div class="review-icon-float">
                            <div class="bubble-shape"><i class="fas fa-star"></i></div>
                        </div>
                        <div class="review-content">
                            <p class="review-body text-muted italic mb-20">"{{ Str::limit($review['text'], 250) }}"</p>
                        </div>
                        <div class="review-footer-meta">
                            <p class="mb-0 text-muted" style="color: #333;">{{ $review['name'] }}</p>
                            <div class="stars text-warning" style="font-size: 13px;">
                                @for($i=0; $i<$review['stars']; $i++) <i class="fas fa-star"></i> @endfor
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
                    {!! $PReview->promise_text ?? 'The Neighborly Done Right Promise® delivered by <br> <strong style="color: var(--theme-blue)">The Glass People®</strong>' !!}
                </span>
            </div>
            
            <a href="{{ $PReview->promise_link ?? '#' }}" class="btn-request-quote">
                <i class="far fa-calendar-alt"></i> Request A Free Quote
            </a>
        </div>
    </div>
</div>