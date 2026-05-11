 <div class="service-area-wrapper section-space--ptb_100 bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h2 class="font-weight--bold mb-20">
                                    {{ $Pcontact->service_area_title ?? 'Proudly Serving the Greater Portland Area' }}
                                </h2>
                                <p class="text-muted container" style="max-width: 800px;">
                                    {{ $Pcontact->service_area_para ?? 'The Glass People provides expert glass repair, replacement, and installation services throughout the Portland metro area.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="service-locations-list p-4 bg-gray rounded shadow-sm">
                                <h5 class="mb-3 font-weight--bold"><i class="fas fa-map-marker-alt text-primary mr-2"></i> Our Service Areas:</h5>
                                <ul class="list-unstyled row">
                                    @forelse($PserviceArea as $city)
                                        <li class="col-6 mb-2">
                                            <i class="fas fa-check-circle text-success mr-2 small"></i> {{ $city->city_name }}
                                        </li>
                                    @empty
                                        <li class="col-6 mb-2"><i class="fas fa-check-circle text-success mr-2 small"></i> Portland</li>
                                        <li class="col-6 mb-2"><i class="fas fa-check-circle text-success mr-2 small"></i> Hillsboro</li>
                                    @endforelse
                                </ul>
                                <div class="mt-4 pt-3 border-top">
                                    <p class="small text-dark mb-0">
                                        <strong>{{ $Pcontact->service_area_footer_text ?? "Don't see your city?" }}</strong> 
                                        {{ !isset($Pcontact->service_area_footer_text) ? 'Give us a call, we likely cover your area too!' : '' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mt-30 mt-lg-0">
                            <div class="map-container rounded overflow-hidden border" style="height: 400px;">
                                <iframe 
                                    src="{{ $Pcontact->map_iframe }}" 
                                    width="100%" 
                                    height="100%" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .service-locations-list li {
                    font-weight: 500;
                    color: #333;
                }
                .bg-gray {
                    background-color: #f9f9f9;
                }
                .rounded {
                    border-radius: 15px !important;
                }
            </style>
