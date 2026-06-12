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

        @php
            // ViewServiceProvider se aane wale Google API data ko yahan extract kiya
            $live_reviews = $googleReviews['result']['reviews'] ?? [];
            $total_ratings = $googleReviews['result']['user_ratings_total'] ?? 0;
            $average_rating = $googleReviews['result']['rating'] ?? 0;
        @endphp

        {{-- Total Count aur Average Rating ka Box (Top Center) --}}
        @if($total_ratings > 0)
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="google-rating-summary d-inline-block px-4 py-2 bg-white rounded shadow-sm border">
                    <span class="font-weight-bold text-dark" style="font-size: 20px;">{{ $average_rating }}</span>
                    <div class="stars text-warning d-inline-block mx-2" style="font-size: 16px;">
                        @for($i=1; $i<=5; $i++)
                            @if($i <= floor($average_rating))
                                <i class="fas fa-star"></i>
                            @elseif($i == ceil($average_rating) && fmod($average_rating, 1) !== 0.0)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="text-muted" style="font-size: 14px;">Based on <strong>{{ $total_ratings }}</strong> Google Reviews</span>
                </div>
            </div>
        </div>
        @endif

        {{-- Condition: Agar Admin ne Google Widget Code dala hai to wo dikhao --}}
        @if($reviewSetting && $reviewSetting->google_widget_code)
            <div class="row">
                <div class="col-12 mb-5">
                    {!! $reviewSetting->google_widget_code !!}
                </div>
            </div>
        @else
            {{-- Warna Manual array ki jagah Live Google Reviews show honge --}}
            <div class="row">
                @forelse($live_reviews as $index => $review)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="static-review-card h-100 shadow-sm border-0" style="padding: 25px; background: #fff; border-radius: 8px; position: relative;">
                        
                        <div class="review-icon-float" style="position: absolute; top: -40px; left: 25px; background: var(--theme-blue, #0056b3); color: white; width: 35px; height: 35px; text-align: center; line-height: 35px; border-radius: 50%;">
                            <div class="bubble-shape">
                                <i class="fas fa-star" style="font-size: 14px;"></i>
                            </div>
                        </div>

                        {{-- Review Text with Read More/Less Logic --}}
                        <div class="review-content mt-3">
                            @php
                                $fullText = $review['text'];
                                $isLong = strlen($fullText) > 130;
                            @endphp
                            <p class="review-body text-muted italic mb-20" style="font-size: 14px; line-height: 1.6;">
                                @if($isLong)
                                    <span class="short-text-{{ $index }}">"{{ Str::limit($fullText, 130) }}"</span>
                                    <span class="full-text-{{ $index }}" style="display: none;">"{{ $fullText }}"</span>
                                    <a href="javascript:void(0);" onclick="toggleReviewText({{ $index }})" class="read-more-btn-{{ $index }}" style="color: var(--theme-blue, #0056b3); font-weight: bold; text-decoration: none; font-size: 13px;"> Read more</a>
                                @else
                                    "{{ $fullText }}"
                                @endif
                            </p>
                        </div>

                        {{-- Footer: Image, Name, Time & Stars --}}
                        <div class="review-footer-meta d-flex justify-content-between align-items-center mt-auto" style="border-top: 1px solid #eee; padding-top: 15px;">
                            <div class="d-flex align-items-center">
                                <img src="{{ $review['profile_photo_url'] }}" alt="{{ $review['author_name'] }}" style="width: 35px; height: 35px; border-radius: 50%; margin-right: 12px; object-fit: cover;">
                                <div>
                                    <p class="mb-0 font-weight-bold" style="color: #333; font-size: 14px; line-height: 1.2;">{{ $review['author_name'] }}</p>
                                    <span class="text-muted" style="font-size: 11px;">{{ $review['relative_time_description'] }}</span>
                                </div>
                            </div>
                            <div class="stars text-warning" style="font-size: 12px;">
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
            <div class="promise-text-wrap text-center">
                <span>
                    {!! $reviewSetting->promise_text ?? 'The Neighborly Done Right Promise® delivered by <br> <strong style="color: var(--theme-blue)">The Glass People®</strong>, a proud Neighborly company.' !!}
                </span>
            </div>
            
            <div class="text-center mt-3">
                <a href="{{ $reviewSetting->promise_link ?? '#' }}" class="btn-request-quote btn btn-primary">
                    <i class="far fa-calendar-alt"></i> Request A Free Quote
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Read More / Less ko handle karne ke liye script --}}
<script>
    function toggleReviewText(index) {
        var shortText = document.querySelector('.short-text-' + index);
        var fullText = document.querySelector('.full-text-' + index);
        var btn = document.querySelector('.read-more-btn-' + index);

        if (fullText.style.display === 'none') {
            shortText.style.display = 'none';
            fullText.style.display = 'inline';
            btn.innerHTML = ' Read less';
        } else {
            shortText.style.display = 'inline';
            fullText.style.display = 'none';
            btn.innerHTML = ' Read more';
        }
    }
</script>