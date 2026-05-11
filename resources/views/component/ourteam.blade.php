<div class="team-member-wrapper section-space--ptb_120 bg-gray">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="section-title wow move-up">
                    <h6 class="section-sub-title mb-20 theme-color-text">
                        {{ $about->team_subtitle ?? 'Expert Hands' }}
                    </h6>
                    <h2 class="font-weight--bold mb-20 text-dark">
                        {!! $about->team_title ?? 'Meet The <br>Glass Experts' !!}
                    </h2>
                    <p class="text-muted">
                        {{ $about->team_description ?? 'Our team consists of certified glaziers and dedicated project managers who bring decades of combined experience.' }}
                    </p>
                    
                    <div class="team-stats mt-40 d-none d-lg-block">
                        @if($about->team_stat_1_value)
                        <div class="stat-item mb-20 p-3 bg-white shadow-sm border-left-theme">
                            <h3 class="font-weight--bold mb-0 theme-color-text">{{ $about->team_stat_1_value }}</h3>
                            <p class="small text-uppercase text-muted mb-0">{{ $about->team_stat_1_label }}</p>
                        </div>
                        @endif

                        @if($about->team_stat_2_value)
                        <div class="stat-item p-3 bg-white shadow-sm border-left-theme">
                            <h3 class="font-weight--bold mb-0 theme-color-text">{{ $about->team_stat_2_value }}</h3>
                            <p class="small text-uppercase text-muted mb-0">{{ $about->team_stat_2_label }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8 mt-40 mt-lg-0">
                <div class="row">
                    @php 
                        $teamMembers = \App\Models\Team::where('status', 1)->get(); 
                    @endphp

                    @forelse($teamMembers as $member)
                        <div class="col-md-6 col-sm-6 wow move-up">
                            <div class="team-card mb-30">
                                <div class="team-card-inner">
                                    <div class="team-card-image">
                                        <img src="{{ asset($member->image) }}" class="img-fluid" alt="{{ $member->title }}">
                                    </div>
                                    <div class="team-card-content p-4 text-center">
                                        <h5 class="mb-1 text-white">{{ $member->title }}</h5>
                                        <p class="small text-light-blue mb-0">{{ $member->subtitle }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted text-center">No team members found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>