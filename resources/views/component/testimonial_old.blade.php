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
                    // Google API se aane wale reviews ko extract karein
                    // Agar API fail ho jaye toh empty array return karega taa ke error na aaye
                    $live_reviews = $googleReviews['result']['reviews'] ?? [];
                @endphp

                {{-- Agar Google API se reviews aaye hain toh wo dikhao, warna message dikhao --}}
                @forelse($live_reviews as $review)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="static-review-card h-100 shadow-sm border-0">
                        <div class="review-icon-float">
                            <div class="bubble-shape"><i class="fas fa-star"></i></div>
                        </div>
                        <div class="review-content">
                            {{-- Google ke paas 'text' hi hota hai review body ke liye --}}
                            <p class="review-body text-muted italic mb-20">"{{ Str::limit($review['text'], 250) }}"</p>
                        </div>
                        <div class="review-footer-meta">
                            {{-- 'author_name' for User's name --}}
                            <p class="mb-0 text-muted d-flex align-items-center" style="color: #333;">
                                {{-- Ek chota sa extra touch: Google profile picture bhi add kar di hai --}}
                                <img src="{{ $review['profile_photo_url'] }}" alt="{{ $review['author_name'] }}" style="width: 25px; height: 25px; border-radius: 50%; margin-right: 8px;">
                                {{ $review['author_name'] }}
                            </p>
                            <div class="stars text-warning" style="font-size: 13px;">
                                {{-- 'rating' for Number of stars --}}
                                @for($i=0; $i<$review['rating']; $i++) 
                                    <i class="fas fa-star"></i> 
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No reviews found at the moment. Please check back later!</p>
                </div>
                @endforelse
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