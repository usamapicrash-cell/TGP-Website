@extends('layouts.app')

@section('title', $term->meta_title ?? 'Privacy Policy | Glass Installation')
@section('meta_description', $term->meta_description)
@section('meta_keywords', $term->meta_keywords)

@section('content')
<style>
    .text-editor {
    line-height: 1.6;
    color: #333;
}

.text-editor h1, 
.text-editor h2, 
.text-editor h3, 
.text-editor h4, 
.text-editor h5, 
.text-editor h6 {
    color: #1a1a1a;
    font-weight: 700;
    margin-top: 1.5rem;
    margin-bottom: 1rem;
    line-height: 1.3;
}

/* Specific Sizes */
.text-editor h1 { font-size: 2.25rem; border-bottom: 2px solid #eee; padding-bottom: 10px; }
.text-editor h2 { font-size: 1.75rem; margin-top: 2.5rem; color: #2c3e50; }
.text-editor h3 { font-size: 1.4rem; color: #444; }

/* Spacing for Paragraphs and Lists */
.text-editor p {
    margin-bottom: 1.2rem;
}

.text-editor ul, .text-editor ol {
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
    list-style: auto;
}

.text-editor li {
    margin-bottom: 0.5rem;
}

/* Modern Touch: Section Divider */
.text-editor hr {
    margin: 3rem 0;
    border: 0;
    border-top: 1px solid #eee;
}

.mobile-pad-tp{
    padding-top: 200px;
}
/* Mobile Adjustments */
@media (max-width: 767px) {
    .text-editor h1 { font-size: 1.8rem; }
    .text-editor h2 { font-size: 1.5rem; }
    .text-editor h3 { font-size: 1.2rem; }
    
    .mobile-pad-tp{
        padding-top: 50px;
    }
}
</style>
<div class="site-wrapper-reveal">

            
            <div class="feature-icon-wrapper section-space--ptb_100 mobile-pad-tp">
                <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center section-space--mb_60">
                        <h6 class="section-sub-title mb-20 theme-color-text">{{ $term->heading_1 ?? 'Privacy Policy' }}</h6>
                        <h1 class="font-weight--bold">{{ $term->heading_2 ?? 'Privacy Policy' }}</h1>
                    </div>
                    <div class="col-lg-12 section-space--mb_60">
                        <div class="text-editor">
                            {!! $term->description !!}
                        </div>
                    </div>
                </div>

            

            

            
        </div>
    </div>

            @include('component.quote')

</div>

@endsection